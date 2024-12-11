<?php

namespace App\School\Entities;

use App\School\Entities\User;
use App\School\Trait\Timestampable;
use DateTime;

class Student extends User {
    use Timestampable;

    protected int $id;
    protected User $user_id;  
    protected DateTime $enrollment_year;
    protected $enrollments = [];  // Para relacionar los estudiantes con sus inscripciones

    public function showSchool() {
        echo parent::MYSCHOOL;
    }

    function __construct(int $id, User $user_id, DateTime $enrollment_year, string $uuid, string $first_name, string $last_name, string $email, string $password,string $dni) {
        parent::__construct($uuid,$first_name,$last_name,$email,$password,$dni);
        $this->id=$id;
        $this->user_id = $user_id;
        $this->enrollment_year = $enrollment_year;
        $this->updateTimestamps();
    }

    public function getEnrollments() {
        return $this->enrollments;
    }

    public function addEnrollment(Enrollment $enrollment) {
        $this->enrollments[] = $enrollment;
        return $this;
    }

    public function getUser_id(): User{
        return $this->user_id;
    }

    public function setUser_id(User $user_id): self{
        $this->user_id = $user_id;
        return $this;
    }

    public function getEnrollment_year(){
        return $this->enrollment_year;
    }

    public function setEnrollment_year($enrollment_year){
        $this->enrollment_year = $enrollment_year;
        return $this;
    }
}
