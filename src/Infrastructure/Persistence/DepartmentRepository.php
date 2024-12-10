<?php

    namespace App\Infrastructure\Persistence;

    use App\School\Entities\Department;
    use App\School\Repositories\IDepartmentRepository;

    class DepartmentRepository implements IDepartmentRepository{
        private \PDO $db;
        
        function __construct(\PDO $db){
            $this->db=$db;
        }

        function all(){
            $stmt=$this->db->prepare("SELECT * FROM departments");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_CLASS);
        }

        function save(Department $department){
            $stmt = $this->db->prepare("INSERT INTO departments(name) VALUES(:name)");
            $stmt->execute([
                ':name' => $department->getName(),
            ]);

            // Obtener el ID con el LastInsertId
            $lastInsertId = $this->db->lastInsertId();

            // Recuperamos el ID
            $stmt = $this->db->prepare("SELECT * FROM departments WHERE id = :id");
            $stmt->execute([':id' => $lastInsertId]);

            // Devolvemos el objeto 
            return $stmt->fetchObject(Department::class);
        }

        function findById($id):?Department{
            $stmt = $this->db->prepare("SELECT * FROM departments WHERE id = :id");
            $stmt->execute([':id' => $id]);
        
            $result = $stmt->fetchObject(Department::class);
        
            // Si no se encuentra, que retorne null
            return $result ?: null;
        }
    }