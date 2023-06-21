<?php
    require_once("DbService.php");
    require_once("../models/Maestro.php");
    require_once("UserService.php");
    class TeacherService 
    {
        private $db_service;
        private $user_service;
        function __construct()
        {
            $this->db_service = new DbService();
            $this->user_service = new UserService();
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
        function addTeacher(Maestro $maestro){
            $maestro->setPassword("Funval");
            $maestro->setRole("Maestro");
            $maestro->setState("Activo");
            $this->db_service->addTeacher($maestro);
        }
        function editTeacher(Maestro $maestro) {
            $this->db_service->updateTeacher($maestro);
        }
        function deleteTeacher($email){
            $this->db_service->deleteTeacher($email);
        }
    }
    

?>