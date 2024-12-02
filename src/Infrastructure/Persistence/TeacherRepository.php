<?php

namespace App\Infrastructure\Persistence;
use App\School\Entities\Teacher;
use App\School\Repositories\ITeacherRepository;

class TeacherRepository implements ITeacherRepository{
    private \PDO $db;

    function __construct($db){
        $this->db=$db;
    }

    function save(Teacher $teacher){
        
    }

    

}