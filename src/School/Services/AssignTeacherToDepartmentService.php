<?php

namespace App\School\Services;

use App\Infrastructure\Persistence\TeacherRepository;
use App\Infrastructure\Persistence\DepartmentRepository;


class AssignTeacherToDepartmentService{
    private $teacherRepository;
    private $departmentRepository;

    public function __construct(TeacherRepository $teacherRepository, DepartmentRepository $departmentRepository) {
        $this->teacherRepository = $teacherRepository;
        $this->departmentRepository = $departmentRepository;
    }

    // Comprobamos si el Profesor existe
    public function execute(int $teacherId, int $departmentId): void{
        $teacher = $this->teacherRepository->findById($teacherId);
        if (!$teacher) {
            throw new \Exception("Profesor no encontrado");
        }

    // Comprobamos si el Departamento existe
        $department = $this->departmentRepository->findById($departmentId);
        if (!$department) {
            throw new \Exception("Departamento no encontrado");
        }

    // Vemos si el profesor está asignado al departamento
        if ($teacher->getDepartment_id() === $departmentId) {
            throw new \Exception("Este profesor ya está asignado a este departamento.");
        }

    // Asignamos el profesor al departamento
        $teacher->setDepartment_id($departmentId);
        $this->teacherRepository->save($teacher);
    }

    public function deleteAssignment(int $teacherId): void{
        // Obtenemos el profesor por ID
        $teacher = $this->teacherRepository->findById($teacherId);
        if (!$teacher) {
            throw new \Exception("Profesor no encontrado.");
        }

        $teacher->setDepartment_id(null);  
        $this->teacherRepository->save($teacher);
    }
}
