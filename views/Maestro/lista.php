<h1>Lista de Clases</h1>
<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h3 class="card-title col-6">Lista de Alumnos</h3>
                        <button class=" col-2 btn btn-sm btn-primary fs-5" data-bs-toggle="modal" data-bs-target="#addClaseModal">Añadir Clase</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Clase</th>
                                        <th scope="col">Maestro</th>
                                        <th scope="col">Alumnos Inscritos</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($clase_service->getAllClases() as $clase){

                                            echo "<tr>
                                                <td>".$clase->getId()."</td>
                                                <td>".$clase->getNombre()."</td>
                                                <td>".$clase->getMaestro()."</td>
                                                <td>".$clase->getAlumnosInscritos()."</td>
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
</div>
