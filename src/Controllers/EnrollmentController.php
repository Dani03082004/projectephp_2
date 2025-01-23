<?php

namespace App\Controllers;

use App\Infrastructure\Database\DatabaseConnection;
use App\Infrastructure\Persistence\StudentRepository;
use App\Infrastructure\Persistence\SubjectRepository;
use App\Infrastructure\Persistence\EnrollmentRepository;
use App\School\Services\EnrollmentService;

class EnrollmentController {

    private EnrollmentService $enrollmentService;

    public function __construct() {
        $db = DatabaseConnection::getConnection();
        $enrollmentRepo = new EnrollmentRepository($db);
        $this->enrollmentService = new EnrollmentService($enrollmentRepo);
    }

    public function index() {
        $db = DatabaseConnection::getConnection();
        $enrollments = $this->enrollmentService->talktoEnrollment();
        $studentRepo = new StudentRepository($db);
        $students = $studentRepo->allStudents();
        $subjectRepo = new SubjectRepository($db);
        $subjects = $subjectRepo->allSubjects();
        echo view('enrollment', ['enrollment' => $enrollments,'students' => $students, 'subjects' => $subjects, 'users' => $users]);
    }

    public function addenrollment() {
        $data = $_POST;
        $db = DatabaseConnection::getConnection();

        try {
            $this->enrollmentService->addenrollment($data, $db);
            header("Location: /");
            exit;
        } catch (\InvalidArgumentException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }
}
