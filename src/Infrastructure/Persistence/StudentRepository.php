<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Repositories\IStudentRepository;
    use App\School\Entities\Student;

    class StudentRepository implements IStudentRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }

        function allstudents(){
            $stmt=$this->db->prepare("SELECT * FROM students");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        function save(Student $student){
            $stmt=$this->db->prepare("INSERT INTO students(user_id,enrollment_year) VALUES(:user_id,:enrollment_year)");
            $stmt->execute([
                ':user_id'=>$student->getUser_id(),
                ':enrollment_year'=>$student->getEnrollment_year(),
            ]);

            // Obtener el ID con el LastInsertId
            return $this->db->lastInsertId();
        }
        
        function findById($id):?Student{
            $stmt=$this->db->prepare("SELECT * FROM students WHERE id=:id");
            $stmt->execute([':id'=>$id]);
            $result = $stmt->fetchObject(Student::class);
            return $result ?: null;
        }
    }