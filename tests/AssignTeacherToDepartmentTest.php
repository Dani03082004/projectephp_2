<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use App\School\Services\AssignTeacherToDepartmentService;
use App\Infrastructure\Persistence\TeacherRepository;
use App\Infrastructure\Persistence\DepartmentRepository;

class AssignTeacherToDepartmentTest extends TestCase{
    private $service;
    private $teacherRepository;
    private $departmentRepository;

    protected function setUp(): void{
        $this->teacherRepository = $this->createMock(TeacherRepository::class);
        $this->departmentRepository = $this->createMock(DepartmentRepository::class);

        $this->service = new AssignTeacherToDepartmentService(
            $this->teacherRepository,
            $this->departmentRepository
        );
    }

    public function testAssignTeacherSuccessfully(): void{
        $teacherId = 1;
        $departmentId = 1;

        $this->teacherRepository
            ->method('findById')
            ->with($teacherId)
            ->willReturn(['id' => $teacherId, 'name' => 'Teacher Test']);

        $this->departmentRepository
            ->method('findById')
            ->with($departmentId)
            ->willReturn(['id' => $departmentId, 'name' => 'Department Test']);

        $this->teacherRepository
            ->expects($this->once())
            ->method('save')
            ->with($this->callback(function($teacher) use ($departmentId) {
                return $teacher->getDepartment_id() === $departmentId;
            }));

        $this->service->execute($teacherId, $departmentId);
    }

    public function testAssignTeacherFailsWhenAlreadyAssigned(): void{
        $teacherId = 1;
        $departmentId = 1;

        $this->teacherRepository
            ->method('findById')
            ->with($teacherId)
            ->willReturn(['id' => $teacherId, 'name' => 'Teacher Test']);

        $this->departmentRepository
            ->method('findById')
            ->with($departmentId)
            ->willReturn(['id' => $departmentId, 'name' => 'Test Department']);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Este profesor ya está asignado a este departamento.");
        $this->service->execute($teacherId, $departmentId);
    }

    public function testAssignTeacherFailsWhenTeacherNotFound(): void{
        $teacherId = 1;
        $departmentId = 1;

        $this->teacherRepository
            ->method('findById')
            ->with($teacherId)
            ->willReturn(null);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Profesor no encontrado");
        $this->service->execute($teacherId, $departmentId);
    }

    public function testAssignTeacherFailsWhenDepartmentNotFound(): void{
        $teacherId = 1;
        $departmentId = 1;

        $this->teacherRepository
            ->method('findById')
            ->with($teacherId)
            ->willReturn(null);

        $this->departmentRepository
            ->method('findById')
            ->with($departmentId)
            ->willReturn(null);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Departamento no encontrado");
        $this->service->execute($teacherId, $departmentId);
    }
}
