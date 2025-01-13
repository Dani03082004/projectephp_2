<?php

namespace App\School\Entities;

use App\School\Entities\User;
use App\School\Trait\Timestampable;
use DateTime;

class Student extends User {
    use Timestampable;

    protected int $id;
    protected int $user_id;  
    protected DateTime $enrollment_year;
    protected string $dni;
    protected $enrollments = [];  // Para relacionar los estudiantes con sus inscripciones

    public function showSchool() {
        echo parent::MYSCHOOL;
    }

    function __construct(DateTime $enrollment_year, string $dni,string $uuid, string $first_name, string $last_name, string $email, string $password,string $user_type) {
        parent::__construct($uuid,$first_name,$last_name,$email,$password,$user_type);
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

    public function getUser_id(){
        return $this->user_id;
    }

    public function setUser_id(int $user_id){
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

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getDni(){
        return $this->dni;
    }

    public function setDni($dni){
        $this->dni = $dni;
        return $this;
    }
}
