<?php
namespace App\Infrastructure\Persistence;

use App\School\Repositories\IExamsRepository;
use App\School\Entities\Exams;

class ExamsRepository implements IExamsRepository{
    private \PDO $db;

    function __construct($db){
        $this->db = $db;
    }

    function allexams(){
        $stmt = $this->db->prepare("SELECT exams.*, subjects.name as subject_name
                                    FROM exams
                                    JOIN subjects ON exams.subject_id = subjects.id");
        $stmt->execute([]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function save(Exams $exam){
        $stmt = $this->db->prepare("INSERT INTO exams(subject_id, exam_date, description) 
                                    VALUES(:subject_id, :exam_date, :description)");
        $stmt->execute([
            ':subject_id' => $exam->getSubjectId(),
            ':exam_date' => $exam->getExamDate()->format('Y-m-d'),
            ':description' => $exam->getDescription(),
        ]);

        return $this->db->lastInsertId();
    }

    function findById($id):?Exams{
        $stmt=$this->db->prepare("SELECT * FROM exams WHERE id=:id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetchObject(Exams::class);
        return $result ?: null;
    }
}
