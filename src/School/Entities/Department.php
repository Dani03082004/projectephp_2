<?php 

    namespace App\School\Entities;

    class Department{
        protected $id;
        protected $name;
        protected $teachers = []; // Para relacionar los profesores con su departamento

        public function __construct(int $id, string $name){
            $this->id=$id;
            $this->name=$name;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
                $this->name = $name;
                return $this;
        }

        public function getId(){
            return $this->id;
        }

        public function getTeachers(){
            return $this->teachers;
        }

        function addTeacher(Teacher $teachers){
            $this->teachers[]=$teachers;
            return $this;
        }
}