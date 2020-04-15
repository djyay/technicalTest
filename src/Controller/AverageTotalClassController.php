<?php


namespace App\Controller;


use App\Entity\Student;
use App\Repository\NoteRepository;
use App\Service\AverageService;

class AverageTotalClassController
{
    private $averageService;

    public function __construct(AverageService $averageService)
    {
        $this->averageService = $averageService;
    }

    public function __invoke()
    {
       return $this->averageService->averageTotal();
    }

}