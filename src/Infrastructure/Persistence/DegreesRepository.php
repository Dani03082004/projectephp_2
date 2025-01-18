<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Repositories\IDegreesRepository;
    use App\School\Entities\Degrees;

    class DegreesRepository implements IDegreesRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }

        function alldegrees(){
            $stmt=$this->db->prepare("SELECT * FROM degrees");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        function save(Degrees $degrees){
            $stmt=$this->db->prepare("INSERT INTO degrees(name,duration_years) VALUES(:name,:duration_years)");
            $stmt->execute([
                ':name'=>$degrees->getName(),
                ':duration_years'=>$degrees->getDuration_years(),
            ]);

            // Obtener el ID con el LastInsertId
            return $this->db->lastInsertId();
        }
        
        function findById($id):?Degrees{
            $stmt=$this->db->prepare("SELECT * FROM degrees WHERE id=:id");
            $stmt->execute([':id'=>$id]);
            $result = $stmt->fetchObject(Degrees::class);
            return $result ?: null;
        }
    }