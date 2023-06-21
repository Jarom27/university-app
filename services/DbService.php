<?php 
    require_once "../models/User.php";
    require_once "../models/Maestro.php";
    require_once "../models/Alumno.php";
    require_once "../models/Clase.php";
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
            $user->setState($result["estado"]);
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
            $user->setState($result["estado"]);
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
        function getAllTeachers(){
            $statement = $this->connection->prepare("SELECT m.id_maestro,m.nombre,m.apellidos,m.birthday, m.direccion,c.nombre_curso,u.email FROM maestro m left join cursos c on m.id_clase = c.id_curso LEFT JOIN users u on u.id_user = m.id_user;");
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        }
        function getAllStudents(){
            $statement = $this->connection->prepare("SELECT a.DNI,a.nombre,a.apellidos,a.birthday, a.direccion,u.email FROM alumnos a  LEFT JOIN users u on u.id_user = a.id_user;");
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        }
        function getAllClases(){
            $statement = $this->connection->prepare("SELECT c.id_curso, c.nombre_curso, m.nombre,m.apellidos FROM cursos c LEFT JOIN maestro m ON c.id_curso = m.id_clase;");
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        }
        function getAllStudentsByClase(){
            $statement = $this->connection->prepare("SELECT COUNT(c.id_alumno) as total,c.id_curso from curso_alumno c GROUP BY c.id_curso;");
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        }
        function getIdRole($role){
            $statement = $this->connection->prepare("SELECT id_role from roles where name= :role LIMIT 1");
            $statement->execute([":role" => $role]);
            $result = $statement->fetch();
            return $result;
        }
        function getClaseAsignada($classname){
            $statement = $this->connection->prepare("SELECT id_curso from cursos where nombre_curso = :nombre LIMIT 1");
            $statement->execute([":nombre" => $classname]);
            $result = $statement->fetch();
            return $result;
        }
        //Añadir cosas
        function addUser(User $user){
            $role = $this->getIdRole($user->getRole());
            $statement = $this->connection->prepare("INSERT INTO users(email,password,estado,id_role) VALUES(:email,:password,:estado,:id_role)");
            $statement->execute([
                ":email"=> $user->getEmail(),
                ":password" => $user->getPassword(),
                ":estado" => $user->getState(),
                ":id_role" => $role["id_role"]
            ]);
        }
        function addTeacher(Maestro $maestro){
            $this->addUser($maestro);
            $result = $this->selectUserByEmail($maestro->getEmail());
            $id_clase = $this->getClaseAsignada($maestro->getClase());
            $statement = $this->connection->prepare("INSERT INTO maestro(nombre,apellidos,birthday,direccion,id_user,id_clase) VALUES(:nombre, :apellidos, :birthday,:direccion,:id_user,:id_clase)");
            $statement->execute([
                ":nombre" => $maestro->getNombre(),
                ":apellidos" => $maestro->getApellidos(),
                ":birthday" => $maestro->getBirthdate(),
                ":direccion" => $maestro->getAddress(),
                ":id_user" => $result->getId(),
                ":id_clase" => $id_clase["id_curso"]
            ]);   
        }
        function updateTeacher(Maestro $maestro){
            $statement= $this->connection->prepare("update maestro as m right JOIN users as u on m.id_user = u.id_user SET m.nombre = :nombre, m.apellidos = :apellidos, m.birthday = :birthday, m.direccion = :direccion WHERE u.email = :email  ");
            $statement->execute([
                ":nombre" => $maestro->getNombre(),
                ":apellidos" => $maestro->getApellidos(),
                ":birthday" => $maestro->getBirthdate(),
                ":direccion" => $maestro->getAddress(),
                ":email" => $maestro->getEmail()
            ]);
        }
        function deleteTeacher($email){
            $statement = $this->connection->prepare("delete users from users JOIN maestro on users.id_user = maestro.id_user where users.email = :email");
            $statement->execute([
                ":email" => $email
            ]);
        }
    }

?>