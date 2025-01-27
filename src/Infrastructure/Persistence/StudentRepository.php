<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Repositories\IStudentRepository;
    use App\School\Entities\Student;

    class StudentRepository implements IStudentRepository{
        private \PDO $db;

        function __construct($db){
            $this->db=$db;
        }

        function allStudents() {
            $stmt = $this->db->prepare("SELECT 
                    students.id AS student_id,
                    users.first_name,
                    users.last_name,
                    users.email,
                    users.password,
                    students.dni,
                    students.enrollment_year,
                    subjects.name AS subject_name      
                FROM students
                LEFT JOIN users ON students.user_id = users.id
                LEFT JOIN enrollments ON students.id = enrollments.student_id
                LEFT JOIN subjects ON enrollments.subject_id = subjects.id
                LEFT JOIN courses ON subjects.course_id = courses.id
                LEFT JOIN degrees ON courses.degree_id = degrees.id");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        

        function save(Student $student){
            $stmt=$this->db->prepare("INSERT INTO students(user_id,dni,enrollment_year) VALUES(:user_id,:dni,:enrollment_year)");
            $stmt->execute([
                ':user_id'=>$student->getUser_id(),
                ':dni'=>$student->getDni(),
                ':enrollment_year'=>$student->getEnrollment_year()->format('Y-m-d'),
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