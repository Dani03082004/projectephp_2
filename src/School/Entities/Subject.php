<?php

    namespace App\School\Entities;

    use App\School\Entities\Course;

    class Subject{
        protected int $id;
        protected string $name;
        protected int $course_id;

        function __construct(string $name, int $course_id){
            $this->name = $name;
            $this->course_id = $course_id;
        }

        public function getName(){
            return $this->name;
        }

        public function getId(){
            return $this->id;
        }

        public function getCourse_id(){
            return $this->course_id;
        }

        public function setCourse_id(int $course_id) {
            $this->course_id = $course_id;
            return $this;
        }
        
        public function setId($id){
            $this->id = $id;
            return $this;
        }
}