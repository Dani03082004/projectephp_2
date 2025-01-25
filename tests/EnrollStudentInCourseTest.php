<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\School\Services\EnrollStudentInCourseService;
use App\Infrastructure\Persistence\StudentRepository;
use App\Infrastructure\Persistence\CourseRepository;
use App\Infrastructure\Persistence\EnrollmentRepository;
use App\School\Entities\Student;

class EnrollStudentInCourseTest extends TestCase{
    private $service;
    private $studentRepository;
    private $courseRepository;
    private $enrollmentRepository;

    protected function setUp(): void{
        $this->studentRepository = $this->createMock(StudentRepository::class);
        $this->courseRepository = $this->createMock(CourseRepository::class);
        $this->enrollmentRepository = $this->createMock(EnrollmentRepository::class);

        $this->service = new EnrollStudentInCourseService(
            $this->studentRepository,
            $this->courseRepository,
            $this->enrollmentRepository
        );
    }

    public function testEnrollStudentSuccessfully(): void{
        $studentId = 1;
        $courseId = 1;

        $this->enrollmentRepository
            ->method('exists')
            ->with($studentId, $courseId)
            ->willReturn(false);

        $this->studentRepository
            ->method('findById')
            ->with($studentId)
            ->willReturn(new Student('uuid', 'John', 'Doe', 'john.doe@example.com', 'password', 'student', '12345678', new \DateTime(), 1));

        $this->courseRepository
            ->method('findById')
            ->with($courseId)
            ->willReturn(['id' => $courseId, 'name' => 'Test Course']);

        $this->enrollmentRepository
            ->expects($this->once())
            ->method('enrollStudent')
            ->with($studentId, $courseId);

        $this->service->execute($studentId, $courseId);
    }

    public function testEnrollStudentFailsWhenAlreadyEnrolled(): void{
        $studentId = 1;
        $courseId = 1;

        $this->enrollmentRepository
            ->method('exists')
            ->with($studentId, $courseId)
            ->willReturn(true);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Este alumno ya está matriculado en este curso.");

        $this->service->execute($studentId, $courseId);
    }

    public function testEnrollStudentFailsWhenStudentNotFound(): void{
        $studentId = 1;
        $courseId = 1;

        $this->studentRepository
            ->method('findById')
            ->with($studentId)
            ->willReturn(null);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Estudiante no encontrado.");
        $this->service->execute($studentId, $courseId);
    }

    public function testEnrollStudentFailsWhenCourseNotFound(): void{
        $studentId = 1;
        $courseId = 1;

        $this->enrollmentRepository
            ->method('exists')
            ->with($studentId, $courseId)
            ->willReturn(false);

        $this->studentRepository
            ->method('findById')
            ->with($studentId)
            ->willReturn(new Student('uuid', 'John', 'Doe', 'john.doe@example.com', 'password', 'student', '12345678', new \DateTime(), 1));

        $this->courseRepository
            ->method('findById')
            ->with($courseId)
            ->willReturn(null);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Curso no encontrado.");
        $this->service->execute($studentId, $courseId);
    }
}
