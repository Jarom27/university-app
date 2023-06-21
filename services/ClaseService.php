<?php
    require_once("../services/DbService.php");
    require_once("../models/Clase.php");
    class ClaseService 
    {
        private $db_service;
        public function __construct()
        {
            $this->db_service = new DbService();
        }
        public function getAllClases(){
            $result = $this->db_service->getAllClases();
            $conteo = $this->db_service->getAllStudentsByClase();
            $arrayClases = array();
            foreach ($result as $value) {
                # code...
                $curso = new Clase();
                $curso->setId($value["id_curso"]);
                $curso->setNombre($value["nombre_curso"]);
                $curso->setMaestro($value["nombre"]);
                $curso->setAlumnosInscritos($conteo["total"]);
                array_push($arrayClases,$curso);
            }
            return $arrayClases;
        }
        public function addClase(Clase $clase){
            $this->db_service->addClase($clase);
        }
    }
    


?>