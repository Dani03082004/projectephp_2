<?php

    namespace App\School\Entities;

    use App\School\Trait\Timestampable;
    use App\School\Entities\User;
    use App\School\Entities\Department;

    class Teacher extends User{
        use Timestampable;

        protected int $user_id;
        protected int $department_id;

        function __construct(string $uuid, string $first_name, string $last_name, string $email, string $password,string $user_type,int $user_id, int $department_id){
            parent::__construct($uuid,$first_name,$last_name,$email,$password,$user_type);
            $this->user_id = $user_id;
            $this->department_id = $department_id;
            $this->updateTimestamps();
        }
        
        public function getUser_id(){
            return $this->user_id;
        }

        public function setUser_id(int $user_id){
            $this->user_id = $user_id;
            return $this;
        }

        public function getDepartment_id(){
            return $this->department_id;
        }

        public function setDepartment_id(int $department_id){
            $this->department_id = $department_id;
            return $this;
        }
    }