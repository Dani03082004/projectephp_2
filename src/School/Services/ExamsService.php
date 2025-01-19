<?php

namespace App\School\Services;

use App\School\Entities\Exams;
use App\Infrastructure\Persistence\ExamsRepository;

class ExamsService {

    private ExamsRepository $examsRepository;

    public function __construct(ExamsRepository $examsRepository) {
        $this->examsRepository = $examsRepository;
    }

    public function talktoexams() {
        return $this->examsRepository->allexams();
    }

    public function validateExam(array $data) {
        $data = $_POST;

        if (empty($data['exam_date']) || empty($data['description']) || empty($data['subject_name'])) {
            throw new \InvalidArgumentException("Para añadir un nuevo examen, todos los campos deben estar completos.");
        }
    }

    public function addexam(array $data, $db) {
        $this->validateExam($data);

        $exam_date = new \DateTime($data['exam_date']); 

        $exam = new Exams(
            $data['subject_name'],
            $exam_date,
            $data['description']
        );

        $examsRepo = new ExamsRepository($db);
        $examId = $examsRepo->save($exam);
    }
}
