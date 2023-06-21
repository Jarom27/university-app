<?php
    session_start();
    require_once "../services/UserService.php";
    $name = "admin";
    $role = "Administrador";
    $user_service = new UserService();
    $content = "";
    if(!isset($_SESSION["email"])){
        header("location: /login");
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if($_SERVER["REQUEST_URI"] == "/admin/home"){
            $content = "home.view.php";
        }
        if($_SERVER["REQUEST_URI"] == "/admin/maestros"){
            require_once("../services/TeacherService.php");
            $teacher_service = new TeacherService();
            $content = "maestros.view.php";
        }
        if($_SERVER["REQUEST_URI"] == "/admin/alumnos"){
            require_once("../services/AlumnoService.php");
            $alumno_service = new AlumnoService();
            $content = "alumnos.view.php";
        }
        if($_SERVER["REQUEST_URI"] == "/admin/clases"){
            require_once("../services/ClaseService.php");
            $clase_service = new ClaseService();
            $content = "clases.view.php";
        }
        if($_SERVER["REQUEST_URI"] == "/admin/permisos"){
            $user_service = new UserService();
            $content = "permisos.view.php";
        }
        
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_SERVER["REQUEST_URI"] == "/admin/maestro/add"){
            require_once("../models/Maestro.php");
            require_once("../services/TeacherService.php");
            $teacher = new Maestro();
            $teacher->setEmail($_POST["maestro_email"]);
            $teacher->setNombre($_POST["maestro_nombre"]);
            $teacher->setApellidos($_POST["maestro_apellido"]);
            $teacher->setClase($_POST["maestro_clase"]);
            $teacher->setBirthdate($_POST["maestro_fecha"]);
            $teacher->setAddress($_POST["maestro_direccion"]);

            $teacher_service = new TeacherService();
            $teacher_service->addTeacher($teacher);
            header("location: /admin/maestros");
        }
        if($_SERVER["REQUEST_URI"] == "/admin/maestro/edit"){
            require_once("../models/Maestro.php");
            require_once("../services/TeacherService.php");
            $teacher = new Maestro();
            $teacher->setEmail($_POST["editar_email"]);
            $teacher->setNombre($_POST["editar_nombre"]);
            $teacher->setApellidos($_POST["editar_apellido"]);
            $teacher->setClase($_POST["editar_clase"]);
            $teacher->setBirthdate($_POST["editar_fecha"]);
            $teacher->setAddress($_POST["editar_direccion"]);

            $teacher_service = new TeacherService();
            $teacher_service->editTeacher($teacher);
            header("location: /admin/maestros");
        }
        if($_SERVER["REQUEST_URI"] == "/admin/maestro/delete"){
            require_once("../services/TeacherService.php");
            $teacher_service = new TeacherService();
            $teacher_service->deleteTeacher($_POST["delete_email"]);
            header("location: /admin/maestros");
        }
        if($_SERVER["REQUEST_URI"] == "/admin/alumno/add"){
            require_once("../models/Alumno.php");
            require_once("../services/AlumnoService.php");
            $alumno = new Alumno();
            $alumno->setDNI($_POST["dni"]);
            $alumno->setEmail($_POST["alumno_email"]);
            $alumno->setNombre($_POST["alumno_nombre"]);
            $alumno->setApellidos($_POST["alumno_apellido"]);
            $alumno->setBirthday($_POST["alumno_fecha"]);
            $alumno->setAddress($_POST["alumno_direccion"]);

            $alumno_service = new AlumnoService();
            $alumno_service->addAlumno($alumno);
            header("location: /admin/alumnos");
        }
        if($_SERVER["REQUEST_URI"] == "/admin/alumno/edit"){
            require_once("../models/Alumno.php");
            require_once("../services/AlumnoService.php");
            $alumno = new Alumno();
            $alumno->setDNI($_POST["dni"]);
            $alumno->setEmail($_POST["editar_email"]);
            $alumno->setNombre($_POST["editar_nombre"]);
            $alumno->setApellidos($_POST["editar_apellido"]);
            $alumno->setBirthday($_POST["editar_fecha"]);
            $alumno->setAddress($_POST["editar_direccion"]);

            $alumno_service = new AlumnoService();
            $alumno_service->editAlumno($alumno);
            header("location: /admin/alumnos");
        }
        if($_SERVER["REQUEST_URI"] == "/admin/clase/add"){
            require_once("../models/Clase.php");
            require_once("../services/ClaseService.php");
            $clase = new Clase();
            $clase->setNombre($_POST["clase_nombre"]);
            $clase_service = new ClaseService();
            $clase_service->addClase($clase);
            header("location: /admin/clases");
        }
        if($_SERVER["REQUEST_URI"] == "/admin/logout"){
            session_destroy();
            header("location: /login");
        }
        
    }
    
    require_once("../views/admin/layout.php");

?>