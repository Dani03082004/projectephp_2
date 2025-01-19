<?php

namespace App\Controllers;

use App\Infrastructure\Database\DatabaseConnection;
use App\Infrastructure\Persistence\ExamsRepository;
use App\Infrastructure\Persistence\SubjectRepository;
use App\School\Services\ExamsService;

class ExamsController {

    private ExamsService $examsService;

    public function __construct() {
        $db = DatabaseConnection::getConnection();
        $examsRepo = new ExamsRepository($db);
        $examsService = new ExamsService($examsRepo);
        $this->examsService = $examsService;
    }

    public function index() {
        $exams = $this->examsService->talktoexams();
        $db = DatabaseConnection::getConnection();
        $SubjectRepo = new SubjectRepository($db);
        $subject = $SubjectRepo->allsubjects();
        echo view('exam', ['exam' => $exams,'subject' => $subject]);
    }

    public function addexam() {
        $data = $_POST;
        $db = DatabaseConnection::getConnection();

        try {
            $this->examsService->addexam($data, $db);
            header("Location: /");
            exit;
        } catch (\InvalidArgumentException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }
}
