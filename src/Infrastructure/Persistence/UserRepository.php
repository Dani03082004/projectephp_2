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

        public function save(User $user): string{
    
            // Dejo todos los datos tanto los automáticos como los que NO
            $stmt = $this->db->prepare(
                "INSERT INTO users(uuid, first_name, last_name, email, password, user_type) 
                 VALUES(:uuid, :first_name, :last_name, :email, :password, :user_type)"
            );
    
            $stmt->execute([
                ':uuid' => $user->getUuid(),
                ':first_name' => $user->getFirstName(),
                ':last_name' => $user->getLastName(),
                ':email' => $user->getEmail(),
                ':password' => $user->getPassword(),
                ':user_type' => $user->getUser_type(),
            ]);
    
            // Con el LastInsertId recojo lo que seria el ID del último User
            return $this->db->lastInsertId();
    
        }
        
        function findById($id):?User{
            $stmt=$this->db->prepare("SELECT * FROM users WHERE id=:id");
            $stmt->execute([':id'=>$id]);
            $result = $stmt->fetchObject(User::class);
            return $result ?: null;
        }

        // Generamos el UUID con el uniqid
        private function generateUuid(): string{
            return uniqid('', true); 
        }
    }