<?php
    require_once("User.php");
    class Alumno extends User
    {
        private $DNI;
        private $nombre;
        private $apellidos;
        private $address;
        private $birthday;

        public function getDNI(){
            return $this->DNI;
        }
        public function setDNI($dni){
            $this->DNI = $dni;
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
        public function getAddress(){
            return $this->address;
        }
        public function setAddress($address){
            $this->address = $address;
        }
        public function getBirthday(){
            return $this->birthday;
        }
        public function setBirthday($birthday){
            $this->birthday = $birthday;
        }
    }
    


?>