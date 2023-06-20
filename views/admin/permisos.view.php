<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "boostrap.php" ?>
</head>
<body>
    <?php 
        foreach ($user_service->userAllList() as $key ) {
            # code...
            print_r($key);
        }
    ?>
</body>
</html>