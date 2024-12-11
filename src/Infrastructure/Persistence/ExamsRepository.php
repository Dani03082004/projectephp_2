<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Repositories\IExamsRepository;
    use App\School\Entities\Exams;

    class ExamsRepository implements IExamsRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }

        function all(){
            $stmt=$this->db->prepare("SELECT * FROM exams");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_CLASS);
        }

        function save(Exams $exams){
            $stmt=$this->db->prepare("INSERT INTO exams(subject_id,exam_date,description,degree_id) VALUES(:subject_id,:exam_date,:description,:degree_id)");
            $stmt->execute([
                ':subject_id'=>$exams->getSubjectId(),
                ':exam_date'=>$exams->getExamDate(),
                ':description'=>$exams->getDescription(),
                ':degree_id'=>$exams->getDegree_id()
            ]);

            // Obtener el ID con el LastInsertId
            $lastInsertId = $this->db->lastInsertId();

            // Recuperamos el ID
            $stmt = $this->db->prepare("SELECT * FROM exams WHERE id = :id");
            $stmt->execute([':id' => $lastInsertId]);
            return $stmt->fetchObject(Exams::class);
        }
        
        function findById($id):?Exams{
            $stmt=$this->db->prepare("SELECT * FROM exams WHERE id=:id");
            $stmt->execute([':id'=>$id]);
            $result = $stmt->fetchObject(Exams::class);
            return $result ?: null;
        }
    }