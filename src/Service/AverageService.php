<?php

declare(strict_types=1);

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

    public function averageTotal(): float
    {
        $sumOfNotes = 0;
        $noteTotal = $this->noteRepository->findAll();
        foreach ($noteTotal as $note) {
            $sumOfNotes += $note->getNote();
        }

        return count($noteTotal) ? round($sumOfNotes / count($noteTotal), 1) : 0.;
    }

    public function averageStudent(Student $student): float
    {
        $sumOfNotes = 0;
        foreach ($student->getNotes() as $note) {
            $sumOfNotes += $note->getNote();
        }

        return count($student->getNotes()) ? round($sumOfNotes / count($student->getNotes()), 1) : 0.;
    }
}
