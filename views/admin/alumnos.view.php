<h1>Lista de Alumnos</h1>
<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h3 class="card-title">Informacion de los Alumnos</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Fec. de Nacimiento</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $cont = 1;
                                        foreach($alumno_service->getAllStudents() as $alumno){

                                            echo "<tr>
                                                <td>$cont</td>
                                                <td>".$alumno->getDNI()."</td>
                                                <td>".$alumno->getNombre()." ".$alumno->getApellidos()."</td>
                                                <td>".$alumno->getEmail()."</td>
                                                <td>".$alumno->getAddress()."</td>
                                                <td>".$alumno->getBirthday()."</td>
                                                <td></td>
                                            </tr>";
                                            $cont++;
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
</div>
