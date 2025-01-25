<?php

namespace App\School\Services;

use App\Infrastructure\Persistence\StudentRepository;
use App\Infrastructure\Persistence\CourseRepository;
use App\Infrastructure\Persistence\EnrollmentRepository;
use App\Infrastructure\Persistence\UserRepository;

class EnrollStudentInCourseService{
    private StudentRepository $studentRepository;
    private CourseRepository $courseRepository;
    private EnrollmentRepository $enrollmentRepository;
    private UserRepository $userRepository;

    public function __construct(StudentRepository $studentRepository, CourseRepository $courseRepository, EnrollmentRepository $enrollmentRepository, UserRepository $userRepository) {
        $this->studentRepository = $studentRepository;
        $this->courseRepository = $courseRepository;
        $this->enrollmentRepository = $enrollmentRepository;
        $this->userRepository = $userRepository;
    }

    public function enrollStudentInCourse(int $studentId, int $courseId): void{
        if ($this->enrollmentRepository->exists($studentId, $courseId)) {
            throw new \Exception("Este alumno ya está matriculado en este curso.");
        }

        $student = $this->studentRepository->findById($studentId);
        if (!$student) {
            throw new \Exception("Estudiante no encontrado.");
        }

        $course = $this->courseRepository->findById($courseId);
        if (!$course) {
            throw new \Exception("Curso no encontrado.");
        }

        $this->enrollmentRepository->enrollStudent($studentId, $courseId);
    }

    public function deleteEnrollment(int $enrollmentId): void{
        $enrollment = $this->enrollmentRepository->findById($enrollmentId);
        if (!$enrollment) {
            throw new \Exception("Inscripción no encontrada.");
        }
        $this->enrollmentRepository->delete($enrollmentId);
    }

    public function createStudent(string $uuid, string $first_name, string $last_name, string $email, string $password,string $user_type,string $dni,DateTime $enrollment_year,int $user_id): void{
        if ($this->userRepository->existsByEmail($email)) {
            throw new \Exception("Un usuario ya usa este email, pruebe con otro.");
        }

        $userId = $this->userRepository->create($uuid, $first_name,$last_name, $email, $password, "student", $dni, $enrollment_year, $user_id);
        $this->studentRepository->create($user_id, $enrollment_year);
    }
}


?>
