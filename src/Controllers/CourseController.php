<?php

namespace App\Controllers;

use App\School\Entities\Degrees;
use App\School\Entities\Course;
use App\Infrastructure\Database\DatabaseConnection;
use App\Infrastructure\Persistence\CourseRepository;
use App\Infrastructure\Persistence\DegreesRepository;
use App\School\Services\CourseService;

class CourseController {

    private CourseService $CourseService;

    public function __construct() {
        $db = DatabaseConnection::getConnection();
        $CourseRepo = new CourseRepository($db);
        $CourseService = new CourseService($CourseRepo);
        $this->CourseService = $CourseService;
    }

    public function index() {
        $courses = $this->CourseService->talktocourse();
        $db = DatabaseConnection::getConnection();
        $DegreesRepo = new DegreesRepository($db);
        $degrees = $DegreesRepo->alldegrees();
        echo view('course', ['course' => $courses, 'degrees' => $degrees]);
    }

    public function addcourse() {
        $data = $_POST;
        $db = DatabaseConnection::getConnection($db);

        try {
            $this->CourseService->addcourse($data,$db);
            header("Location: /");
            exit;
        } catch (\InvalidArgumentException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }
}