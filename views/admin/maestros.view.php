<h1>Lista de Maestros</h1>
<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h3 class="card-title col-6">Informacion de los Maestros</h3>
                        <button class=" col-2 btn btn-sm btn-primary fs-5" data-bs-toggle="modal" data-bs-target="#addMaestroModal">Añadir Maestro</button>
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
                                <tbody id="table-content">
                                    <?php
                                        $count = 1;
                                        foreach($teacher_service->getAllTeachers() as $teacher){
                                            echo "<tr id=".$count.">
                                                <td>".$count."</td>
                                                <td><span class='nombre'>".$teacher->getNombre()."</span> <span class='apellido'>".$teacher->getApellidos()."</span></td>
                                                <td>".$teacher->getEmail()."</td>
                                                <td>".$teacher->getAddress()."</td>
                                                <td>".$teacher->getBirthdate()."</td>
                                                <td>".$teacher->getClase()."</td>
                                                <td><button type='button' class='edit btn btn-white' data-bs-toggle='modal' data-bs-target='#editMaestroModal' id ='".$count."'><img class='icon' src = '../../public/assets/edit.svg'></button> <button type='button' class='trash btn btn-white' data-bs-toggle='modal' data-bs-target='#deleteMaestroModal' id ='".$count."'><img class = 'icon' src = '../../public/assets/trash.svg'></button></td>
                                            </tr>";
                                            $count++;
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
    <div class="modal fade" id="addMaestroModal" aria-label="#agregarMaestroModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="agregarMaestroModalLabel">Agregar Maestro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addMaestro" class="modal-body" action="/admin/maestro/add" method="post">
                    <label for="maestro_email" class="form-label">Correo Electronico</label>
                    <input type="email" name="maestro_email" id="maestro_email" class="form-control" placeholder="Ingrese Correo Electronico">
                    <label for="maestro_nombre" class="form-label">Nombre(s)</label>
                    <input type="text" name="maestro_nombre" id="maestro_nombre" class="form-control" placeholder="Ingrese Nombre(s)">
                    <label for="maestro_apellidos" class="form-label">Apellido(s)</label>
                    <input type="text" name="maestro_apellido" id="maestro_apellido" class="form-control" placeholder="Ingrese Apellido(s)">
                    <label for="maestro_direccion" class="form-label">Dirección</label>
                    <input type="text" name="maestro_direccion" id="maestro_direccion" class="form-control" placeholder="Ingrese la Dirección">
                    <label for="maestro_fecha" class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="maestro_fecha" id="maestro_fecha" class="form-control" placeholder="Ingrese la Fecha de Nacimiento">
                    <select name="maestro_clase" id="maestro_clase">
                        <option value="Sin Asignar">Sin Asignar</option>
                    </select>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input form="addMaestro" type="submit" class="btn btn-primary" value="Crear">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editMaestroModal" aria-label="#editarMaestroModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarMaestroModalLabel">Editar Maestro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editMaestro" class="modal-body" action="/admin/maestro/edit" method="post">
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
                    <select name="editar_clase" id="editar_clase">
                        <option value="Sin Asignar">Sin Asignar</option>
                    </select>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input form="editMaestro" type="submit" class="btn btn-primary" value="Editar">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteMaestroModal" aria-label="#deleteMaestroModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarMaestroModalLabel">Eliminar Maestro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="eliminarMaestro" class="modal-body" action="/admin/maestro/delete" method="post">
                    <h2>Quieres eliminar al usuario?</h2>
                    <input type="email" class="form-control-plaintext" id="eliminar_email" name="delete_email">
                    
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input form="eliminarMaestro" type="submit" class="btn btn-primary" value="Borrar">
                </div>
            </div>
        </div>
    </div>
    <script src="../../public/scripts/maestro.js"></script>
</div>
