<?php

    namespace App\School\Entities;

    use App\School\Entities\Course;

    class Subject{
        protected int $id;
        protected string $name;
        protected Course $course_id;

        function __construct(int $id, string $name, Course $course_id){
            $this->id = $id;
            $this->name = $name;
            $this->course = $course;
        }

        public function getName(){
            return $this->name;
        }

        public function getId(){
            return $this->id;
        }

        public function getCourse_id(): Course{
            return $this->course_id;
        }

        public function setCourse_id(Course $course_id): self {
            $this->course_id = $course_id;
            return $this;
        }
        
}