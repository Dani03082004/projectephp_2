<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Repositories\IUserRepository;
    use App\School\Entities\User;

    class UserRepository implements IUserRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }

        function all(){
            $stmt=$this->db->prepare("SELECT * FROM users");
            $stmt->execute([]);
            return $stmt->fetchAll(\PDO::FETCH_CLASS);
        }

        function save(User $user){
            $stmt=$this->db->prepare("INSERT INTO users(uuid,first_name,last_name,email,password,dni) VALUES(:uuid,:first_name,:last_name,:email,:password,:dni)");
            $stmt->execute([
                ':uuid'=>$user->getUuid(),
                ':first_name'=>$user->getFirstName(),
                ':last_name'=>$user->getLastName(),
                ':email'=>$user->getEmail(),
                ':password'=>$user->getPassword(),
                ':dni'=>$user->getDni()
            ]);

            // Obtener el ID con el LastInsertId
            $lastInsertId = $this->db->lastInsertId();

            // Recuperamos el ID
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->execute([':id' => $lastInsertId]);
            return $stmt->fetchObject(User::class);
        }
        
        function findById($id):?User{
            $stmt=$this->db->prepare("SELECT * FROM users WHERE id=:id");
            $stmt->execute([':id'=>$id]);
            $result = $stmt->fetchObject(User::class);
            return $result ?: null;
        }
    }