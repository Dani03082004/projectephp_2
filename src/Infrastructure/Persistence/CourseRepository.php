<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Repositories\ICourseRepository;
    use App\School\Entities\Course;

    class CourseRepository implements ICourseRepository{
        private \PDO $db;

        function __construct($db){
            $this->db=$db;
        }

        function allcourse(){
            $stmt=$this->db->prepare("SELECT courses.*, degrees.name as degree_name FROM courses 
            JOIN degrees ON courses.degree_id = degrees.id");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        function save(Course $course){
            $stmt=$this->db->prepare("INSERT INTO courses(name,degree_id) VALUES(:name,:degree_id)");
            $stmt->execute([
                ':name'=>$course->getName(),
                ':degree_id'=>$course->getDegree_id()
            ]);

            // Obtener el ID con el LastInsertId
            return $this->db->lastInsertId();
        }
        
        function findById($id):?Course{
            $stmt=$this->db->prepare("SELECT * FROM courses WHERE id=:id");
            $stmt->execute([':id'=>$id]);
            $result = $stmt->fetchObject(Course::class);
            return $result ?: null;
        }
    }