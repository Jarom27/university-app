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
    if($_SERVER["REQUEST_URI"] == "/admin/logout"){
        session_destroy();
        header("location: /login");
    }
    require_once("../views/admin/layout.php");

?>