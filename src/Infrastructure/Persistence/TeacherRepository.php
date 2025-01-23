<?php

namespace App\Infrastructure\Persistence;
use App\School\Entities\Teacher;
use App\School\Repositories\ITeacherRepository;
use App\School\Services\TeacherService;

class TeacherRepository implements ITeacherRepository{
    private \PDO $db;

    function __construct($db){
        $this->db=$db;
    }

    public function allteachers(): array{
        $stmt = $this->db->prepare("SELECT teachers.id, users.first_name, users.last_name, users.email, 
                   users.password, teachers.department_id, departments.name AS department_name
            FROM teachers
            LEFT JOIN users ON teachers.user_id = users.id
            LEFT JOIN departments ON teachers.department_id = departments.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function save(Teacher $teacher){

        //Recoger el User ID antes de la sentencia con el LastInsertID
        $stmt=$this->db->prepare("INSERT INTO teachers(user_id,department_id) VALUES(:user_id,:department_id)");
        $stmt->execute([
            ':user_id'=>$teacher->getUser_id(),
            ':department_id'=>$teacher->getDepartment_id(),
        ]);
        // Obtener el ID con el LastInsertId
        return $this->db->lastInsertId();
    }

    function findById($id):?Teacher{
        $stmt = $this->db->prepare("SELECT * FROM teachers WHERE id = :id");
        $stmt->execute([':id' => $id]);
    
        $result = $stmt->fetchObject(Teacher::class);
    
        // Si no se encuentra, que retorne null
        return $result ?: null;
    }
}