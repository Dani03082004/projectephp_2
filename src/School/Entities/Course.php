<?php 

    namespace App\School\Entities;
    use App\School\Entities\Subject;

    class Course{
        protected $id;
        protected Degrees $degree_id;
        protected $name;
        protected $subjects=[]; // Para relacionar los asignaturas con su curso

        public function __construct(int $id, Degrees $degree_id, string $name){
            $this->id=$id;
            $this->degree_id=$degree_id;
            $this->name=$name;
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

        public function getDegree_id(): Degrees{
            return $this->degree_id;
        }

        public function setDegree_id(Degrees $degree_id): self{
                $this->degree_id = $degree_id;
                return $this;
        }
    }