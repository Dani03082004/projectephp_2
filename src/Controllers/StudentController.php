<?php 

namespace App\Controllers;

use App\School\Services\StudentService;
use App\Infrastructure\Persistence\StudentRepository;
use App\Infrastructure\Persistence\SubjectRepository;
use App\Infrastructure\Database\DatabaseConnection;

class StudentController {

    private StudentService $StudentService;

    public function __construct() {
        $db = DatabaseConnection::getConnection();
        $StudentRepo = new StudentRepository($db);
        $SubjectRepo = new SubjectRepository($db);
        $StudentService = new StudentService($StudentRepo, $SubjectRepo);
        $this->StudentService = $StudentService;
    }

    public function index() {
        $student = $this->StudentService->talktostudent();
        $db = DatabaseConnection::getConnection();
        $SubjectRepo = new SubjectRepository($db);
        $subjects = $SubjectRepo->allSubjects();
        echo view('student', ['student' => $student, 'subjects' => $subjects]);
    }

    public function addstudent() {
        $data = $_POST;
        $db = DatabaseConnection::getConnection();

        try {
            $this->StudentService->addStudent($data, $db);
            header("Location: /"); 
            exit;
        } catch (\InvalidArgumentException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }
}
