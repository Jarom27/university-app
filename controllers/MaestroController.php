<?php
    session_start();
    $name = "Maestro";
    $role = "Maestro";
    $content = "";
    if(!isset($_SESSION["email"])){
        header("location: /login");
    }
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if($_SERVER["REQUEST_URI"] == "/maestro/home"){
            $content = "home.view.php";
        }
        if($_SERVER["REQUEST_URI"] == "/maestro/alumnos"){
            $content = "lista.php";
        }
    }
    require_once("../views/Maestro/layout.php");


?>