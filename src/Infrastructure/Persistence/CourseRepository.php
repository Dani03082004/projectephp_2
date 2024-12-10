<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Repositories\ICourseRepository;
    use App\School\Entities\Course;

    class CourseRepository implements ICourseRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }

        function all(){
            $stmt=$this->db->prepare("SELECT * FROM courses");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_CLASS);
        }

        function save(Course $course){
            $stmt=$this->db->prepare("INSERT INTO courses(degree_id,name) VALUES(:degree_id,:name)");
            $stmt->execute([
                ':degree_id'=>$course->getDegree_id(),
                ':name'=>$course->getName(),
            ]);

            // Obtener el ID con el LastInsertId
            $lastInsertId = $this->db->lastInsertId();

            // Recuperamos el ID
            $stmt = $this->db->prepare("SELECT * FROM courses WHERE id = :id");
            $stmt->execute([':id' => $lastInsertId]);
            return $stmt->fetchObject(Course::class);
        }
        
        function findById($id):?Course{
            $stmt=$this->db->prepare("SELECT * FROM courses WHERE id=:id");
            $stmt->execute([':id'=>$id]);
            $result = $stmt->fetchObject(Course::class);
            return $result ?: null;
        }
    }