<?php 
    session_start();
    echo "hola";
    if(isset($_SESSION["email"])){
        echo "esta establecida";
    }
    else{
        header("location: /login");
    }
    require_once("../services/UserService.php");
    $user_service = new UserService();
    if($user_service->findRole($_SESSION["email"]) == "Administrador"){
        header("location: /admin/home");
    }
    else if($user_service->findRole($_SESSION["email"]) == "Maestro"){
        header("location: /maestro/home");
    }
    
?>