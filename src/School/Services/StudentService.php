<?php

namespace App\School\Services;
use App\School\Entities\Student;
use App\Infrastructure\Persistence\StudentRepository;
use App\School\Entities\User;  
use App\Infrastructure\Persistence\UserRepository;  
use DateTime;

class StudentService{

    private StudentRepository $StudentRepository;

    public function __construct(StudentRepository $StudentRepository){
        $this->StudentRepository=$StudentRepository;
    }

    public function talktostudent(){
        return $this->StudentRepository->allstudents();
    }

    public function validateStudent(){
        $data = $_POST;

        if (empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || empty($data['password']) || empty($data['dni']) || empty($data['enrollment_year']) || empty($data['course']) || empty($data['degree'])) {
                throw new \InvalidArgumentException("Para añadir un nuevo estudiante, usted tiene que completar todos los campos.");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("El correo electrónico que has puesto, es inválido, por favor diposite uno nuevo.");
        }
    }

    public function addStudent(array $data,$db){

        // Validaciones Student
        $this->validateStudent($data);

        $uuid = uniqid('', true); 
        $user = new User (
            $uuid,
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['password'],
            'student'
        );

        $userepository = new UserRepository($db);
        $userid = $userepository->save($user);

        // Enrollment Year a Fecha
        $enrollment_year = new \DateTime($data['enrollment_year']); 

        $student = new Student(
            $uuid,
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['password'],
            'student',
            $data['dni'],
            $enrollment_year,
            $userid,
            $data['course'],
            $data['degree']
        );

        $studentRepo = new StudentRepository($db);
        $studentRepo->save($student);
    }
}