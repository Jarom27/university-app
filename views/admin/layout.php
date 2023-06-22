<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "boostrap.php" ?>
</head>
<body>
    <div class="canva">
        <aside class="sidebar">
            <a class="sidebar-logo-link">
                <img class="sidebar-logo" src="../../public/assets/logo.jpg">
                <span>Universidad</span>
            </a>
            <hr>
            <div class="info">
                <h5><?=$name?></h5>
                <p><?=$role?></p>
            </div>
            <hr>
            <div class="tools">
                <p>Menu de Administración</p>
                <ul class="container d-flex flex-column gap-3">
                    <li><a href="/admin/permisos"><span class="options-icon"><img style="width: 25px;"  src = "../../public/assets/permisos.svg"></span>Permisos</a></li>
                    <li><a href="/admin/maestros"><span class="options-icon"><img style="width: 25px;"  src = "../../public/assets/teacher.svg"></span>Maestros</a></li>
                    <li><a href="/admin/alumnos"><span class="options-icon"><img style="width: 25px;"  src = "../../public/assets/student.svg"></span>Alumnos</a></li>
                    <li><a href="/admin/clases"><span class="options-icon"><img style="width: 25px;"  src = "../../public/assets/clases.svg"></span>Clases</a></li>

                </ul>
            </div>
        </aside>
        <div class="right-side">
            <nav class="navbar-expanded-lg main-header bg-white">
                <ul class="nav d-flex justify-content-between">
                    <li><a href="/admin/home">Home</a></li>
                    <li><div class="dropdown bg-white">
                            <a class="btn btn-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?=$name?>
                            </a>

                            <ul class="dropdown-menu bg-white">
                                <li><form action="/admin/logout" method="post"><button type="submit" class="dropdown-item" name="logout">Logout</button></form></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="content">
                <?php include_once($content) ?>
            </div>
        </div>
        
        
    </div>
</body>
</html>