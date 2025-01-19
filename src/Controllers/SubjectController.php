<?php

namespace App\Controllers;

use App\School\Entities\Subject;
use App\School\Entities\Course;
use App\Infrastructure\Database\DatabaseConnection;
use App\Infrastructure\Persistence\CourseRepository;
use App\Infrastructure\Persistence\SubjectRepository;
use App\School\Services\SubjectService;

class SubjectController{

    private SubjectService $SubjectService;

    public function __construct(){
        $db = DatabaseConnection::getConnection();
        $SubjectRepo = new SubjectRepository($db);
        $SubjectService = new SubjectService($SubjectRepo);
        $this->SubjectService = $SubjectService;
    }

    public function index(){
        $subject = $this->SubjectService->talktosubject();
        $db = DatabaseConnection::getConnection();
        $CourseRepo = new CourseRepository($db);
        $courses = $CourseRepo->allcourse();
        echo view('subject', ['subject' => $subject, 'courses' => $courses]);
    }

    public function addsubject() {
        $data = $_POST;
        $db = DatabaseConnection::getConnection();

        try {
            $this->SubjectService->addsubject($data, $db);
            header("Location: /"); 
            exit;
        } catch (\InvalidArgumentException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }
}
?>