<?php


namespace App\Service;


use App\Entity\Student;
use App\Repository\NoteRepository;

class AverageService
{
    private $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    /**
     * @return float
     */
    public function averageTotal(): float
    {
        $sumOfNotes = 0;
        $noteTotal = $this->noteRepository->findAll();
        foreach ($noteTotal as $note){
            $sumOfNotes += $note->getNote();
        }
        $arevage =(count($noteTotal))? round($sumOfNotes / count($noteTotal),1) : 0;

        return $arevage;
    }


    /**
     * @param Student $student
     * @return float
     */
    public function averageStudent(Student $student): float
    {
        $sumOfNotes = 0;
        foreach ($student->getNotes() as $note){
            $sumOfNotes += $note->getNote();
        }
        $arevage =(count($student->getNotes()))? round($sumOfNotes / count($student->getNotes()),1): 0;

        return $arevage;
    }

}