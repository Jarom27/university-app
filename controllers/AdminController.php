<?php
    require_once "../services/UserService.php";
    $name = "admin";
    $role = "Administrador";
    $user_service = new UserService();
    $content = "";
    
    if($_SERVER["REQUEST_URI"] == "/admin/home"){
        $content = "home.view.php";
    }
    if($_SERVER["REQUEST_URI"] == "/admin/maestros"){
        $content = "maestros.view.php";
    }
    if($_SERVER["REQUEST_URI"] == "/admin/alumnos"){
        $content = "alumnos.view.php";
    }
    if($_SERVER["REQUEST_URI"] == "/admin/clases"){
        $content = "clases.view.php";
    }
    if($_SERVER["REQUEST_URI"] == "/admin/permisos"){
        $user_service = new UserService();
        $content = "permisos.view.php";
    }
    require_once("../views/admin/layout.php");

?>