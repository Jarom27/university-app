<h1>Lista de Clases</h1>
<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h3 class="card-title col-6">Informacion de los Clases</h3>
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
    <div class="modal fade" id="addClaseModal" aria-label="#agregarClaseLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="agregarClaseLabel">Agregar Clase</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addClase" class="modal-body" action="/admin/clase/add" method="post">
                    <label for="clase_nombre" class="form-label">Nombre de la clase</label>
                    <input type="text" name="clase_nombre" id="clase_nombre" class="form-control" placeholder="Ingrese Nombre(s)">
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input form="addClase" type="submit" class="btn btn-primary" value="Crear">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editAlumnoModal" aria-label="#editarMaestroModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarMaestroModalLabel">Editar Alumno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editAlumno" class="modal-body" action="/admin/alumno/edit" method="post">
                    <label for="editar_dni" class="form-label">DNI</label>
                    <input type="text" name="dni" id="editar_dni" class="form-control" placeholder="DNI">
                    <label for="editar_email" class="form-label">Correo Electronico</label>
                    <input type="email" name="editar_email" id="editar_email" class="form-control-plaintext" placeholder="Ingrese Correo Electronico">
                    <label for="editar_nombre" class="form-label">Nombre(s)</label>
                    <input type="text" name="editar_nombre" id="editar_nombre" class="form-control" placeholder="Ingrese Nombre(s)">
                    <label for="editar_apellido" class="form-label">Apellido(s)</label>
                    <input type="text" name="editar_apellido" id="editar_apellido" class="form-control" placeholder="Ingrese Apellido(s)">
                    <label for="editar_direccion" class="form-label">Dirección</label>
                    <input type="text" name="editar_direccion" id="editar_direccion" class="form-control" placeholder="Ingrese la Dirección">
                    <label for="editar_fecha" class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="editar_fecha" id="editar_fecha" class="form-control" placeholder="Ingrese la Fecha de Nacimiento">
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input form="editAlumno" type="submit" class="btn btn-primary" value="Editar">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteAlumnoModal" aria-label="#deleteAlumnoModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarMaestroModalLabel">Eliminar Alumno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="eliminarAlumno" class="modal-body" action="/admin/alumno/delete" method="post">
                    <input type="hidden" id="eliminar_email" name="delete_email">
                    <h2>Quieres eliminar al usuario?</h2>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input form="eliminarAlumno" type="submit" class="btn btn-primary" value="Borrar">
                </div>
            </div>
        </div>
    </div>
    <script src="../../public/scripts/permisos.js"></script>
</div>
