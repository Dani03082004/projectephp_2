<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Repositories\ISubjectRepository;
    use App\School\Entities\Subject;

    class SubjectRepository implements ISubjectRepository{
        private \PDO $db;

        function __construct($db){
            $this->db = $db;
        }

        function allSubjects(){
            $stmt = $this->db->prepare("SELECT subjects.*, courses.name as courses_name FROM subjects
                                        JOIN courses ON subjects.course_id = courses.id");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        }

        function save(Subject $subject){
            $stmt = $this->db->prepare("INSERT INTO subjects(name, course_id) VALUES(:name, :course_id)");
            $stmt->execute([
                ':name' => $subject->getName(),
                ':course_id' => $subject->getCourse_id(),
            ]);
            return $this->db->lastInsertId();
        }
        
        function findById($id): ?Subject{
            $stmt = $this->db->prepare("SELECT * FROM subjects WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $result = $stmt->fetchObject(Subject::class);
            return $result ?: null; 
        }
    }
