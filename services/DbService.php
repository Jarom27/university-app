<?php 
    require_once "../models/User.php";
    class DbService{
        private $msn;
        private $host;
        private $user;
        private $pass;
        private $connection;
        private $db_name;
        function __construct()
        {
            $this->msn = getenv("DB_CONECTION");
            $this->db_name = getenv("DB_NAME");
            $this->host = getenv("DDBB_HOST");
            $this->user = getenv("DB_USER");
            $this->pass = getenv("DB_PASSWORD");
            $this->connection = new PDO("$this->msn:dbname=$this->db_name;host=$this->host",$this->user,$this->pass);
        }
        function selectUserByEmail($email){
            $statement = $this->connection->prepare("SELECT * from users WHERE email = :email LIMIT 1");
            $statement->execute([":email" => $email]);
            $result = $statement->fetch();
            if($result == false){
                return null;
            }

            $user = new User();
            $user->setId($result["id_user"]);
            $user->setEmail($result["email"]);
            $user->setPassword($result["password"]);
            $user->setRole($result["id_role"]);

            return $user;
        }
        function getRoleByEmail($email){
            $statement = $this->connection->prepare("SELECT * from users WHERE email = :email LIMIT 1");
            $statement->execute([":email" => $email]);
            $result = $statement->fetch();
            if($result == false){
                return null;
            }

            $user = new User();
            $user->setId($result["id_user"]);
            $user->setEmail($result["email"]);
            $user->setPassword($result["password"]);
            $user->setRole($result["id_role"]);

            $statement = $this->connection->prepare("SELECT name from roles where id_role =:id LIMIT 1");
            $statement->execute([":id" => $user->getRole()]);
            $result = $statement->fetch();
            $user->setRole($result["name"]);

            return $user->getRole();
        }
        function getAllUsers(){
            $statement = $this->connection->prepare("SELECT * from users");
            $statement->execute();
            $result = $statement->fetchAll();

            return $result;
        }
    }

?>