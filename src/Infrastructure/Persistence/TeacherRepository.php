<?php

namespace App\Infrastructure\Persistence;
use App\School\Entities\Teacher;
use App\School\Repositories\ITeacherRepository;

class TeacherRepository implements ITeacherRepository{
    private \PDO $db;

    function __construct($db){
        $this->db=$db;
    }

    function all(){
        $stmt=$this->db->prepare("SELECT * FROM teachers");
        $stmt->execute([]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    function save(Teacher $teacher){
        $stmt=$this->db->prepare("INSERT INTO teachers(user_id,department_id,email,username,dni,password) VALUES(:user_id,:department_id,:email,:username,:dni,:password)");
        $stmt->execute([
            ':user_id'=>$teacher->getUser_id(),
            ':department_id'=>$teacher->getDepartment_id(),
            ':email'=>$teacher->getEmail(),
            ':username'=>$teacher->getUsername(),
            ':dni'=>$teacher->getDni(),
            ':password'=>$teacher->getPassword(),
        ]);
        // Obtener el ID con el LastInsertId
        $lastInsertId = $this->db->lastInsertId();

        // Recuperamos el ID
        $stmt = $this->db->prepare("SELECT * FROM teachers WHERE id = :id");
        $stmt->execute([':id' => $lastInsertId]);
        return $stmt->fetchObject(Teacher::class);
    }

    function findById($id):?Teacher{
        $stmt = $this->db->prepare("SELECT * FROM teachers WHERE id = :id");
        $stmt->execute([':id' => $id]);
    
        $result = $stmt->fetchObject(Teacher::class);
    
        // Si no se encuentra, que retorne null
        return $result ?: null;
    }
}