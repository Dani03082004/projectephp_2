<?php

namespace App\Controllers;

use App\School\Entities\Teacher;
use App\School\Entities\Department;
use App\Infrastructure\Database\DatabaseConnection;
use App\Infrastructure\Persistence\DepartmentRepository;
use App\Infrastructure\Persistence\TeacherRepository;
use App\School\Services\TeacherService;

class TeacherController {

    private TeacherService $TeacherService;

    public function __construct() {
        $db = DatabaseConnection::getConnection();
        $teacherRepo = new TeacherRepository($db);
        $teacherService = new TeacherService($teacherRepo);
        $this->TeacherService = $teacherService;  
    }

    public function index() {
        $teachers = $this->TeacherService->talktorepo();
        $db = DatabaseConnection::getConnection();
        $DepartmentRepo = new DepartmentRepository($db);
        $departments = $DepartmentRepo->alldepartments();
        echo view('teacher', ['teacher' => $teachers, 'departments' => $departments]);
    }

    public function addteacher() {
        $data = $_POST;
        $db = DatabaseConnection::getConnection();

        try {
            $this->TeacherService->addTeacher($data, $db);

            header("Location: /");
            exit;
        } catch (\InvalidArgumentException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }
}
