<h1>Lista de permisos</h1>
<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h3 class="card-title">Informacion de los permisos</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Email/Usuario</th>
                                        <th scope="col">Permiso</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($user_service->userAllList() as $user){

                                            echo "<tr>
                                                <td>".$user->getId()."</td>
                                                <td>".$user->getEmail()."</td>
                                                <td><span class = 'badge role'>".$user->getRole()."</span></td>
                                                <td><span class = 'badge state'>".$user->getState()."</span></td>
                                                <td>".$user->getId()."</td>
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
