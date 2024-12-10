<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Repositories\ISubjectRepository;
    use App\School\Entities\Subject;

    class SubjectRepository implements ISubjectRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }

        function all(){
            $stmt=$this->db->prepare("SELECT * FROM subjects");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_CLASS);
        }

        function save(Subject $subject){
            $stmt=$this->db->prepare("INSERT INTO subjects(name,course_id) VALUES(:name,:course_id)");
            $stmt->execute([
                ':name'=>$subject->getName(),
                ':course_id'=>$subject->getCourse_id(),
            ]);

            // Obtener el ID con el LastInsertId
            $lastInsertId = $this->db->lastInsertId();

            // Recuperamos el ID
            $stmt = $this->db->prepare("SELECT * FROM subjects WHERE id = :id");
            $stmt->execute([':id' => $lastInsertId]);
            return $stmt->fetchObject(Subject::class);
        }
        
        function findById($id):?Subject{
            $stmt=$this->db->prepare("SELECT * FROM subjects WHERE id=:id");
            $stmt->execute([':id'=>$id]);
            $result = $stmt->fetchObject(Subject::class);
            return $result ?: null;
        }
    }