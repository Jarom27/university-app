<?php 
    require_once "../models/User.php";
    require_once "DbService.php";
    class UserService{
        private $db_service;
        function __construct()
        {
            $this->db_service = new DbService();
        }
        function validateUser($email,$password){
            $user = $this->db_service->selectUserByEmail($email);
            if(!$user){
                throw new Exception("El usuario no existe");
            }
            
            if($user->getPassword() != $password){
                throw new Exception("Contraseña incorrecta");
            }
            return true;
        }
        function findRole($email){
            $role = $this->db_service->getRoleByEmail($email);
            return $role;
        }
        function userAllList(){
            $result = $this->db_service->getAllUsers();
            $arrayUser = array();
            foreach ($result as $item) {
                $user = new User();
                $user->setId($item["id_user"]);
                $user->setEmail($item["email"]);
                $user->setPassword($item["password"]);
                $user->setState($item["estado"]);
                $user->setRole($this->findRole($item["email"]));
                array_push($arrayUser,$user);
                # code...
            }
            return $arrayUser;
        }
    }

?>