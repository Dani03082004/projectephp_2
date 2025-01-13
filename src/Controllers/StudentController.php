<?php 

    namespace App\Controllers;

    use App\School\Entities\Student;
    use App\School\Entities\User;
    use App\School\Entities\Course;
    use App\Infrastructure\Persistence\StudentRepository;
    use App\Infrastructure\Persistence\UserRepository;
    use App\Infrastructure\Persistence\CourseRepository;
    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Services\StudentService;

    class StudentController{

        private StudentService $StudentService;

        public function __construct(){
            $db = DatabaseConnection::getConnection();
            $StudentRepo = new StudentRepository($db);
            $StudentService = new StudentService($StudentRepo);
            $this->StudentService = $StudentService;
        }
        function index(){
            $student = $this->StudentService->talktostudent();
            $db = DatabaseConnection::getConnection();
            //$CourseRepo = new CourseRepository($db);
            //$courses = $CourseRepo->allcourses();
            echo view('student', ['student' => $student, 'courses' => $courses]);
        }
        
        function addstudent(){
            $data = $_POST;
            $db = DatabaseConnection::getConnection();

            try {
                // Utilizo el servicio para agregar profesor
                $this->StudentService->addstudent($data, $db);
                header("Location: /"); 
                exit;
            } catch (\InvalidArgumentException $e) {
                echo "Error: " . $e->getMessage();
                exit;
            }
        }
    }