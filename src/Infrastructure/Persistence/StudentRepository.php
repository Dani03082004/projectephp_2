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

        function all(){
            $stmt=$this->db->prepare("SELECT * FROM students");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_CLASS);
        }

        function save(Student $student){
            $stmt=$this->db->prepare("INSERT INTO students(user_id,dni,enrollment_year,username,email,password) VALUES(:user_id,:dni,:enrollment_year,:username,:email,:password)");
            $stmt->execute([
                ':user_id'=>$student->getUser_id(),
                ':dni'=>$student->getDni(),
                ':enrollment_year'=>$student->getEnrollment_year(),
                ':username'=>$student->getUsername(),
                ':email'=>$student->getEmail(),
                ':password'=>$student->getPassword()
            ]);

            // Obtener el ID con el LastInsertId
            $lastInsertId = $this->db->lastInsertId();

            // Recuperamos el ID
            $stmt = $this->db->prepare("SELECT * FROM students WHERE id = :id");
            $stmt->execute([':id' => $lastInsertId]);
            return $stmt->fetchObject(Student::class);
        }
        
        function findById($id):?Student{
            $stmt=$this->db->prepare("SELECT * FROM students WHERE id=:id");
            $stmt->execute([':id'=>$id]);
            $result = $stmt->fetchObject(Student::class);
            return $result ?: null;
        }
    }