<?php
    require_once("User.php");
    class Maestro extends User
    {
        private $idMaestro;
        private $nombre;
        private $apellidos;
        private $email;
        private $clase;
        private $birthdate;
        private $address;

        public function getIdMaestro(){
            return $this->idMaestro;
        }
        public function setIdMaestro($id){
            $this->idMaestro = $id;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getApellidos(){
            return $this->apellidos;
        }
        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function getClase(){
            return $this->clase;
        }
        public function setClase($clase){
            $this->clase = $clase;
        }
        public function getBirthdate(){
            return $this->birthdate;
        }
        public function setBirthdate($birthdate){
            $this->birthdate = $birthdate;
        }
        public function getAddress(){
            return $this->address;
        }
        public function setAddress($address){
            $this->address = $address;
        }
    }
    
    

?>