<?php 

    namespace App\Controllers;
    use App\School\Entities\Department;
    use App\Infrastructure\Persistence\DepartmentRepository;
    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Services\DepartmentService;


    class DepartmentController{

        private DepartmentService $DepartmentService;

        public function __construct(){
            $db = DatabaseConnection::getConnection();
            $DepartmentRepo = new DepartmentRepository($db);
            $DepartmentService = new DepartmentService($DepartmentRepo);
            $this->DepartmentService = $DepartmentService;
        }

        function index(){
            $departments = $this->DepartmentService->talktodepartment();
            echo view('department',['department' => $departments]);
        }
        
        function addepartment(){
            $data = $_POST;
            $db = DatabaseConnection::getConnection($db);

            try {
                $this->DepartmentService->addepartment($data,$db);
                header("Location: /"); 
                exit;
            } catch (\InvalidArgumentException $e) {
                echo "Error: " . $e->getMessage();
                exit;
            }
        }
    }