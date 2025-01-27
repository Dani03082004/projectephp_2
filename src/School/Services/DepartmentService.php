<?php

namespace App\School\Services;
use App\School\Entities\Department;
use App\Infrastructure\Persistence\DepartmentRepository;
use App\School\Repositories\IDepartmentRepository;  


class DepartmentService{

    private IDepartmentRepository $DepartmentRepository;

    public function __construct(IDepartmentRepository $DepartmentRepository){
        $this->DepartmentRepository=$DepartmentRepository;
    }

    public function talktodepartment(){
        return $this->DepartmentRepository->alldepartments();
    }

    public function validateDepartment(){
        $data = $_POST;

        if(empty($data['name'])){
            throw new \InvalidArgumentException("Error al añadir un departamento");
        }
    }

    public function addepartment(array $data, $db){
        
        // Validaciones del Departamento
        $this->validateDepartment($data);

        $department = new Department(
            $data['name']
        );

        $departmentrepo = new DepartmentRepository($db);
        $departmentid = $departmentrepo->save($department);
    }

}
