<?php
    define('VIEWS',__DIR__.'/src/views');
    require __DIR__.'/vendor/autoload.php';
    $dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    use App\Controllers\HomeController;
    use App\Controllers\TeacherController;
    use App\Controllers\StudentController;
    use App\Controllers\DepartmentController;
    use App\Controllers\CourseController;
    use App\Infrastructure\Database\DatabaseConnection;
    use App\Infrastructure\Routing\Router;
    use App\School\Services\EnrollmentService;
    use App\Infrastructure\Persistence\EnrollmentRepository;
    
    use App\School\Services\Services;
    

    //carga de servicios siguiendo dependencias
    $db=DatabaseConnection::getConnection();
    $services=new Services();
    $services->addServices('db',fn()=>$db);
    $db=$services->getService('db');
    $services->addServices('enrollmentRepository',fn()=>new EnrollmentRepository($db));
   
    $router=new Router();
    $router->addRoute('GET','/',[new HomeController(),'index'])
            ->addRoute('GET','/teachers',[new TeacherController(),'viewteacher'])
            ->addRoute('GET','/students',[new StudentController(),'viewstudent'])
            ->addRoute('GET','/departments',[new DepartmentController(),'viewdepartment'])
            ->addRoute('GET','/courses',[new CourseController(),'viewcourse']);


            /*->addRoute('POST','/add-student',[new StudentController(),'addstudent'])
            ->addRoute('POST','/add-department',[new DepartmentController(),'addepartment'])
            ->addRoute('POST','/add-course',[new CourseController(),'addcourse'])
            ->addRoute('POST','/add-teacher',[new TeacherController(),'addteacher'])*/