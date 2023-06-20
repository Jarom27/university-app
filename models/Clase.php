<?php
    class Clase 
    {
        private $id_clase;
        private $nombre_clase;
        private $maestro;
        private $alumnos_inscritos;
	
        public function getId(){
            return $this->id_clase;
        }
        public function setId($id){
            $this->id_clase = $id;
        }
        public function getNombre(){
            return $this->nombre_clase;
        }
        public function setNombre($nombre){
            $this->nombre_clase = $nombre;
        }
        public function getMaestro(){
            return $this->maestro;
        }
        public function setMaestro($Maestro){
            $this->maestro = $Maestro;
        }
        public function getAlumnosInscritos(){
            return $this->alumnos_inscritos;
        }
        public function setAlumnosInscritos($alumnos_inscritos){
            $this->alumnos_inscritos = $alumnos_inscritos;
        }
        
    }
    

?>