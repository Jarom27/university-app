<?php 
    class User {
        private $id;
        private $email;
        private $password;
        private $role;
        private $state;

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function getPassword(){
            return $this->password;
        }
        public function setPassword($pass){
            $this->password = $pass;
        }
        public function getRole(){
            return $this->role;
        }
        public function setRole($role){
            $this->role = $role;
        }
        public function getState(){
            return $this->state;
        }
        public function setState($state){
            $this->state = $state;
        }
    }
?>