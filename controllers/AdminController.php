<?php
    require_once "../services/UserService.php";
    require_once("../views/admin/home.view.php");
    if($_SERVER["REQUEST_URI"] == "/admin/home"){
        
    }
    if($_SERVER["REQUEST_URI"] == "/admin/maestros"){
        require_once("../views/admin/maestros.view.php");
    }
    if($_SERVER["REQUEST_URI"] == "/admin/alumnos"){
        require_once("../views/admin/alumnos.view.php");
    }
    if($_SERVER["REQUEST_URI"] == "/admin/clases"){
        require_once("../views/admin/clases.view.php");
    }
    if($_SERVER["REQUEST_URI"] == "/admin/permisos"){
        $user_service = new UserService();
        require_once("../views/admin/permisos.view.php");
    }


?>