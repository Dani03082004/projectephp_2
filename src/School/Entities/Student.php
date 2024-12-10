<?php

namespace App\School\Entities;

use App\School\Entities\User;
use App\School\Trait\Timestampable;
use DateTime;

class Student extends User {
    use Timestampable;

    protected User $user_id;  
    protected int $id;
    protected DateTime $enrollment_year;
    protected $enrollments = [];  // Para relacionar los estudiantes con sus inscripciones

    public function showSchool() {
        echo parent::MYSCHOOL;
    }

    function __construct(User $user_id, string $dni, DateTime $enrollment_year,string $email, string $name, string $password) {
        parent::__construct($username,$email,$password,$dni);
        $this->user_id = $user_id;
        $this->dni = $dni;
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
