<?php


namespace App\Tests\Service;


use App\Entity\Note;
use App\Entity\Student;
use App\Repository\NoteRepository;
use App\Service\AverageService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AverageServiceTest extends WebTestCase
{

    public function testAverageTotal()
    {
        $student1 = (new Student())
            ->setFirstName('John')
            ->setLastName('doe')
            ->setDateOfBirth(new \DateTime('1991-02-12'));
        $student2 = (new Student())
            ->setFirstName('Mike')
            ->setLastName('mauve')
            ->setDateOfBirth(new \DateTime('1995-03-11'));

        $note = (new Note())
            ->setNote(15.6)
            ->setSubject('MATH')
            ->setStudent($student1);
        $note2 = (new Note())
            ->setNote(11)
            ->setSubject('SVT')
            ->setStudent($student1);
        $note3= (new Note())
            ->setNote(8)
            ->setSubject('ANGLAIS')
            ->setStudent($student2);

        $noteList = [$note,$note2,$note3];

        $noteRepository = $this->createMock(NoteRepository::class);
        $noteRepository->expects($this->exactly(1))->method('findAll')->willReturn($noteList);

        $averageTotal = $this->getMockBuilder(AverageService::class)
            ->setConstructorArgs([$noteRepository])
            ->setMethodsExcept(['averageTotal'])
            ->getMock();

        $average = $averageTotal->averageTotal();

        $this->assertEquals(11.5,$average);

    }


    public function testAverageStudent(){
        $note = (new Note())
            ->setNote(15.6)
            ->setSubject('MATH');
        $note2 = (new Note())
            ->setNote(11)
            ->setSubject('SVT');
        $student = (new Student())
            ->setFirstName('John')
            ->setLastName('doe')
            ->setDateOfBirth(new \DateTime('1991-02-12'));
        $student->addNote($note);
        $student->addNote($note2);

        $averageTotal = $this->getMockBuilder(AverageService::class)
            ->disableOriginalConstructor()
            ->setMethodsExcept(['averageStudent'])
            ->getMock();
        $average = $averageTotal->averageStudent($student);
        $this->assertEquals(13.3,$average);
    }


}