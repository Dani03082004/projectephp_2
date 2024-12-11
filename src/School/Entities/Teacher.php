<?php

    namespace App\School\Entities;

    use App\School\Trait\Timestampable;
    use App\School\Entities\User;
    use App\School\Entities\Department;


    class Teacher extends User{
        use Timestampable;

        protected $department=[]; // Para asignar cada profe con su departamento
        protected User $user_id;
        protected Department $department_id;

        function __construct(User $user_id, Department $department_id, string $uuid, string $first_name, string $last_name, string $email, string $password,string $dni){
            parent::__construct($uuid,$first_name,$last_name,$email,$password,$dni);
            $this->user_id = $user_id;
            $this->department_id = $department_id;
            $this->updateTimestamps();
        }

        public function addToDepartment(Department $dept){
            $this->department=$dept;
        }

        public function getDepartment(){
            return $this->department;
        }
        
        public function getUser_id(): User{
            return $this->user_id;
        }

        public function setUser_id(User $user_id): self{
            $this->user_id = $user_id;
            return $this;
        }

        public function getDepartment_id(): Department{
            return $this->department_id;
        }

        public function setDepartment_id(Department $department_id): self{
            $this->department_id = $department_id;
            return $this;
        }
    }