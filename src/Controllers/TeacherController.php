<?php 

namespace App\Controllers;

use App\School\Entities\Teacher;
use App\School\Entities\User;
use App\School\Entities\Department;
use App\Infrastructure\Persistence\TeacherRepository;
use App\Infrastructure\Persistence\UserRepository;
use App\Infrastructure\Persistence\DepartmentRepository;
use App\Infrastructure\Database\DatabaseConnection;
use App\School\Services\TeacherService;

class TeacherController {

    private TeacherService $TeacherService;

    public function __construct(){
        $db = DatabaseConnection::getConnection();
        $TeacherRepo = new TeacherRepository($db);
        $TeacherService = new TeacherService($TeacherRepo);
        $this->TeacherService = $TeacherService;
    }

    // Función para mostrar todos los profesores y departamentos
    function index(){
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
            // Utilizo el servicio para agregar profesor
            $this->TeacherService->addTeacher($data, $db);
            header("Location: /"); 
            exit;
        } catch (\InvalidArgumentException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }
}
