<?php

    namespace App\Infrastructure\Persistence;


    use App\School\Entities\Enrollment;
    use App\School\Repositories\IEnrollmentRepository;

    class EnrollmentRepository implements IEnrollmentRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }

        function all(){
            $stmt=$this->db->prepare("SELECT * FROM enrollments");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_CLASS);
        }

        function save(Enrollment $enrollment){
            $stmt=$this->db->prepare("INSERT INTO enrollments(student_id,subject_id,enrollment_date,course_id) VALUES(:student_id,:subject_id,:enrollment_date,:course_id)");
            $stmt->execute([
                ':student_id'=>$enrollment->getStudent_id(),
                ':subject_id'=>$enrollment->getSubject_id(),
                ':enrollment_date'=>$enrollment->getEnrollment_Date(),
                ':course_id'=>$enrollment->getCourse_id()
            ]);
            // Obtener el ID con el LastInsertId
            $lastInsertId = $this->db->lastInsertId();

            // Recuperamos el ID
            $stmt = $this->db->prepare("SELECT * FROM enrollments WHERE id = :id");
            $stmt->execute([':id' => $lastInsertId]);
            return $stmt->fetchObject(Enrollment::class);
        }
        
        function findById($id):?Enrollment{
            $stmt = $this->db->prepare("SELECT * FROM enrollments WHERE id = :id");
            $stmt->execute([':id' => $id]);
        
            $result = $stmt->fetchObject(Enrollment::class);
        
            // Si no se encuentra, que retorne null
            return $result ?: null;
        }
    }