<?php

    namespace App\Infrastructure\Persistence;


    use App\School\Entities\Enrollment;
    use App\School\Repositories\IEnrollmentRepository;

    class EnrollmentRepository implements IEnrollmentRepository{
        private \PDO $db;

        function __construct($db){
            $this->db=$db;
        }

        function allenrollment() {
            try {
                $stmt = $this->db->prepare("
                    SELECT enrollments.id, enrollments.enrollment_date, users.name AS student_name, subjects.name AS subject_name
                    FROM enrollments
                    JOIN students ON enrollments.student_id = students.id
                    LEFT JOIN users ON students.user_id = users.id
                    JOIN subjects ON enrollments.subject_id = subjects.id
                ");
                $stmt->execute([]);
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        }
        
        function save(Enrollment $enrollment){
            $stmt=$this->db->prepare("INSERT INTO enrollments(student_id,subject_id,enrollment_date) VALUES(:student_id,:subject_id,:enrollment_date)");
            $stmt->execute([
                ':student_id'=>$enrollment->getStudent_id(),
                ':subject_id'=>$enrollment->getSubject_id(),
                ':enrollment_date'=>$enrollment->getEnrollment_Date(),
            ]);

            // Obtener el ID con el LastInsertId
            return $this->db->lastInsertId();
        }
        
        function findById($id):?Enrollment{
            $stmt = $this->db->prepare("SELECT * FROM enrollments WHERE id = :id");
            $stmt->execute([':id' => $id]);
        
            $result = $stmt->fetchObject(Enrollment::class);
            return $result ?: null;
        }
    }