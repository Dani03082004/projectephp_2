<?php

namespace App\School\Services;
use App\School\Entities\Degrees;
use App\Infrastructure\Persistence\DegreesRepository;
use App\School\Entities\Course;  
use App\Infrastructure\Persistence\CourseRepository; 

class CourseService{

    private CourseRepository $CourseRepository;

    public function __construct(CourseRepository $CourseRepository){
        $this->CourseRepository=$CourseRepository;
    }

    public function talktocourse(){
        return $this->CourseRepository->allcourse();
    }

    public function validateCourse(){
        $data = $_POST;

        if(empty($data['name']) || empty($data['curso'])){
            throw new \InvalidArgumentException("Para añadir un nuevo curso, usted tiene que completar todos los campos.");
        }
    }

    public function addcourse(array $data, $db){
        
        // Validación Curso
        $this->validateCourse($data);
        
        $course = new Course(
            $data['name'],
            $data['curso']
        );

        $cursoRepo = new CourseRepository($db);
        $courseid = $cursoRepo->save($course);
    }
 

}
?>