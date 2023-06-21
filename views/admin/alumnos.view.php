<h1>Lista de Alumnos</h1>
<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h3 class="card-title col-6">Informacion de los Alumnos</h3>
                        <button class=" col-2 btn btn-sm btn-primary fs-5" data-bs-toggle="modal" data-bs-target="#addAlumnoModal">Añadir Alumno</button>
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
                                <tbody id="table-content">
                                    <?php
                                        $cont = 1;
                                        foreach($alumno_service->getAllStudents() as $alumno){

                                            echo "<tr id='$cont'>
                                                <td>$cont</td>
                                                <td>".$alumno->getDNI()."</td>
                                                <td><span class='nombre'>".$alumno->getNombre()."</span> <span class='apellido'>".$alumno->getApellidos()."</span></td>
                                                <td>".$alumno->getEmail()."</td>
                                                <td>".$alumno->getAddress()."</td>
                                                <td>".$alumno->getBirthday()."</td>
                                                <td><button type='button' class='edit btn btn-white' data-bs-toggle='modal' data-bs-target='#editAlumnoModal' id ='".$cont."'><img class='icon' src = '../../public/assets/edit.svg'></button> <button type='button' class='trash btn btn-white' data-bs-toggle='modal' data-bs-target='#deleteAlumnoModal' id ='".$cont."'><img class = 'icon' src = '../../public/assets/trash.svg'></button></td>
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
    <div class="modal fade" id="addAlumnoModal" aria-label="#agregarMaestroModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="agregarMaestroModalLabel">Agregar Alumno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addMaestro" class="modal-body" action="/admin/alumno/add" method="post">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" name="dni" id="dni" class="form-control" placeholder="DNI">
                    <label for="alumno_email" class="form-label">Correo Electronico</label>
                    <input type="email" name="alumno_email" id="alumno_email" class="form-control" placeholder="Ingrese Correo Electronico">
                    <label for="alumno_nombre" class="form-label">Nombre(s)</label>
                    <input type="text" name="alumno_nombre" id="alumno_nombre" class="form-control" placeholder="Ingrese Nombre(s)">
                    <label for="alumno_apellidos" class="form-label">Apellido(s)</label>
                    <input type="text" name="alumno_apellido" id="alumno_apellido" class="form-control" placeholder="Ingrese Apellido(s)">
                    <label for="alumno_direccion" class="form-label">Dirección</label>
                    <input type="text" name="alumno_direccion" id="alumno_direccion" class="form-control" placeholder="Ingrese la Dirección">
                    <label for="alumno_fecha" class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="alumno_fecha" id="alumno_fecha" class="form-control" placeholder="Ingrese la Fecha de Nacimiento">
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input form="addMaestro" type="submit" class="btn btn-primary" value="Crear">

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
                    <h2>Quieres eliminar al usuario?</h2>
                    <input type="email" class="form-control-plaintext" id="eliminar_email" name="delete_email">
                    
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input form="eliminarAlumno" type="submit" class="btn btn-primary" value="Borrar">
                </div>
            </div>
        </div>
    </div>
    <script src="../../public/scripts/alumno.js"></script>
</div>
