<?php
    require_once("DbService.php");
    require_once("../models/Maestro.php");
    class TeacherService 
    {
        private $db_service;

        function __construct()
        {
            $this->db_service = new DbService();
        }
        function getAllTeachers(){
            $result = $this->db_service->getAllTeachers();
            $arrayteachers = array();

            foreach ($result as $value) {
                $teacher = new Maestro();
                $teacher->setId($value["id_maestro"]);
                $teacher->setNombre($value["nombre"]);
                $teacher->setApellidos($value["apellidos"]);
                $teacher->setBirthdate($value["birthday"]);
                $teacher->setClase($value["nombre_curso"]);
                $teacher->setAddress($value["direccion"]);
                $teacher->setEmail($value["email"]);
                array_push($arrayteachers,$teacher);
            }
            return $arrayteachers;
        }
        
    }
    

?>