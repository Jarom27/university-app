<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University app | Login</title>
    <?php
        include_once "boostrap.php";
    ?>
</head>
<style>
    .light-yellow{
        background-color: #fff5d2;
    }
</style>
<body>
    <div class="light-yellow vw-100 vh-100">
        <div class="container light-yellow d-flex flex-column justify-content-center  vh-100">
            <div class="mx-auto">
                <img src="../public/assets/logo.jpg" class="w-auto" style="width: 100px;height: 200px">
            </div> 
            <div class="mx-auto card w-50 d-flex flex-column align-items-center">
                <p>Bienvenido, Ingresa con tu cuenta</p>
                <form action="/login" method="post">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <input type="submit" class="btn btn-primary" value="Ingresar">
                </form>

            </div>
        </div>
    </div>
</body>
</html>