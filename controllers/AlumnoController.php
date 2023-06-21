<?php
    session_start();
    $name = "Alumno";
    $role = "Alumno";
    $content = "";
    if(!isset($_SESSION["email"])){
        header("location: /login");
    }
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if($_SERVER["REQUEST_URI"] == "/alumno/home"){
            $content = "home.view.php";
        }
    }
    require_once("../views/Alumno/layout.php");


?>