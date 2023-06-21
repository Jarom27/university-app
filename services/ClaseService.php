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
            $count = 0;
            foreach ($result as $value) {
                # code...
                $curso = new Clase();
                $curso->setId($value["id_curso"]);
                $curso->setNombre($value["nombre_curso"]);
                $curso->setMaestro($value["nombre"]." ".$value["apellidos"]);
                if($count < count($conteo)){
                    $curso->setAlumnosInscritos($conteo[$count]["total"]);
                }
                else{
                    $curso->setAlumnosInscritos(0);
                }
                
                
                array_push($arrayClases,$curso);
                $count++;
            }
            return $arrayClases;
        }
        public function addClase(Clase $clase){
            $this->db_service->addClase($clase);
        }
    }
    


?>