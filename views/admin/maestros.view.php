<h1>Lista de Maestros</h1>
<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h3 class="card-title">Informacion de los Maestros</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Fec. de Nacimiento</th>
                                        <th scope="col">Clase Asignada</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($teacher_service->getAllTeachers() as $teacher){

                                            echo "<tr>
                                                <td>".$teacher->getId()."</td>
                                                <td>".$teacher->getNombre()." ".$teacher->getApellidos()."</td>
                                                <td>".$teacher->getEmail()."</td>
                                                <td>".$teacher->getAddress()."</td>
                                                <td>".$teacher->getBirthdate()."</td>
                                                <td>".$teacher->getClase()."</td>
                                                <td></td>
                                            </tr>";
                                        }  
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../public/scripts/permisos.js"></script>
</div>
