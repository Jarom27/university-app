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
                header("Location: /middleware");
            }
        }
        catch(Exception $err){
            echo $err->getMessage();
        }
        
    }

?>