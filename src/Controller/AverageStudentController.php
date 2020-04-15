<?php


namespace App\Controller;


use App\Entity\Student;
use App\Service\AverageService;

class AverageStudentController
{
    private $averageService;

    public function __construct(AverageService $averageService)
    {
        $this->averageService = $averageService;
    }

    public function __invoke(Student $data)
    {
       return $this->averageService->averageStudent($data);
    }

}