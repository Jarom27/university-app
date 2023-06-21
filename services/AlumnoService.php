<?php
    require_once("../models/Alumno.php");
    require_once("../models/User.php");
    class AlumnoService 
    {
        private $db_service;

        function __construct()
        {
            $this->db_service = new DbService();
        }
        function getAllStudents(){
            $students = $this->db_service->getAllStudents();
            $array_students = array();
            foreach ($students as $value) {
                $alumno = new Alumno();
                $alumno->setDNI($value["DNI"]);
                $alumno->setNombre($value["nombre"]);
                $alumno->setApellidos($value["apellidos"]);
                $alumno->setAddress($value["direccion"]);
                $alumno->setBirthday($value["birthday"]);
                $alumno->setEmail($value["email"]);

                array_push($array_students,$alumno);
            }
            return $array_students;
        }
        function addAlumno(Alumno $alumno){
            $alumno->setPassword("Funval");
            $alumno->setRole("Estudiante");
            $alumno->setState("Activo");
            $this->db_service->addAlumno($alumno);
        }
        function editAlumno(Alumno $alumno){
            $this->db_service->updateAlumno($alumno);
        }
    }
    
?>