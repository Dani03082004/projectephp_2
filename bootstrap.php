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
    use App\Controllers\DegreeController;
    use App\Infrastructure\Database\DatabaseConnection;
    use App\Infrastructure\Routing\Router;
    use App\School\Services\EnrollmentService;
    use App\Infrastructure\Persistence\EnrollmentRepository;
    use App\Infrastructure\Persistence\TeacherRepository;
    
    use App\School\Services\Services;
    

    //carga de servicios siguiendo dependencias
    $db=DatabaseConnection::getConnection();
    $services=new Services();
    $services->addServices('db',fn()=>$db);
    $services->addServices('enrollmentRepository',fn()=>new EnrollmentRepository($db));

    // Obtener la carga del servicio de la BD
    $db=$services->getService('db');
   

    $router=new Router();
    $router->addRoute('GET','/',[new HomeController(),'index'])
            ->addRoute('GET','/teachers',[new TeacherController(),'index'])
            ->addRoute('POST','/add-teacher',[new TeacherController(),'addteacher'])
            ->addRoute('GET','/departments',[new DepartmentController(),'index'])
            ->addRoute('POST','/add-department',[new DepartmentController(),'addepartment'])
            ->addRoute('GET','/degrees',[new DegreeController(),'index'])
            ->addRoute('POST','/add-degree',[new DegreeController(),'addegree'])
            ->addRoute('GET','/courses',[new CourseController(),'index'])
            ->addRoute('POST','/add-course',[new CourseController(),'addcourse'])
            ->addRoute('GET','/students',[new StudentController(),'index'])
            ->addRoute('POST','/add-student',[new StudentController(),'addstudent']);