<?php 

    namespace App\School\Entities;
    use App\School\Entities\Subject;

    class Course{
        protected $id;
        protected $name;
        protected int $degree_id;
        protected $subjects=[]; // Para relacionar los asignaturas con su curso

        public function __construct(string $name, int $degree_id){
            $this->name=$name;
            $this->degree_id=$degree_id;
        }

        function addSubject(Subject $subject){
            $this->subjects[]=$subject;
            return $this;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
                $this->name = $name;
                return $this;
        }

        public function getSubjects() {
            return $this->subjects;
        }

        public function getId(){
            return $this->id;
        }

        public function getDegree_id(){
            return $this->degree_id;
        }

        public function setDegree_id(int $degree_id){
                $this->degree_id = $degree_id;
                return $this;
        }
    }