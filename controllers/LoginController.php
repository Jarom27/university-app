<?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        require_once("../views/login.view.php");
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        echo $_POST["email"];
        require_once("../services/UserService.php");
        try{
            $user_service = new UserService();
            if($user_service->validateUser($_POST["email"],$_POST["password"])){
                $_SESSION["email"] = $_POST["email"];
                header("location: /validate");
            }
        }
        catch(Exception $err){
            echo $err->getMessage();
        }
        
    }

?>