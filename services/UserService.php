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
    }

?>