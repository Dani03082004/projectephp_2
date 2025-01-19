<?php 

namespace App\Controllers;

use App\School\Services\StudentService;
use App\Infrastructure\Persistence\StudentRepository;
use App\Infrastructure\Persistence\CourseRepository;
use App\Infrastructure\Persistence\DegreesRepository;
use App\Infrastructure\Database\DatabaseConnection;

class StudentController {

    private StudentService $StudentService;

    public function __construct() {
        $db = DatabaseConnection::getConnection();
        $StudentRepo = new StudentRepository($db);
        $CourseRepo = new CourseRepository($db);
        $DegreesRepo = new DegreesRepository($db);
        $StudentService = new StudentService($StudentRepo, $CourseRepo, $DegreesRepo);
        $this->StudentService = $StudentService;
    }

    public function index() {
        $student = $this->StudentService->talktostudent();
        $db = DatabaseConnection::getConnection();
        $CourseRepo = new CourseRepository($db);
        $courses = $CourseRepo->allcourse();
        $DegreesRepo = new DegreesRepository($db);
        $degrees = $DegreesRepo->alldegrees();
        echo view('student', ['student' => $student, 'courses' => $courses, 'degrees' => $degrees]);
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
