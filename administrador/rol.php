<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Gestión de Usuarios</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav class="">
                <br>
                <div class="nav nav-pills " id="nav-tab" role="tablist">
                    <button class="nav-link  active" id="nav-rol-tab" data-bs-toggle="tab" data-bs-target="#nav-rol"
                        type="button" role="tab" aria-controls="nav-rol" aria-selected="false">Roles</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <!-- Modulo para el manejo de rol-->
                <div class="tab-pane fade show active" id="nav-rol" role="tabpanel" aria-labelledby="nav-rol-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h2 class="card-title text-center"><b>Roles</b></h2>
                            
                            <button type="button" class="btn btn-primary" id="btnFomularioRol"><i
                                    class="fas fa-plus"></i> Crear Rol</button>
                            <button type="button" id="volverRegistroRol" class="btn btn-primary" hidden><i
                                    class="fas fa-eye"></i>
                                Ver Roles Registrados</button>
                            <br>
                            <br>
                            <form class="form-group bordeado" id="rol" method="POST" hidden>
                                <h4 class="card-title text-center"><b>Crear Rol</b></h4>
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h5><b>Nombre Rol*</b></h5>
                                    <input class="form-control inicialM" type="text" name="txtRol" id="txtRol" required>
                                </div>
                                <span class="text-muted">* Campo Obligatorio</span>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary mb-3" id="btnRegistrarRol"><i
                                            class="fas fa-plus"></i> Crear Rol</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 bordeado" id="rolesRegistrados">
                            <h4 class="card-title text-center"><b>Roles Registrados</b></h4>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h5 id="roles"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones sobre roles-->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Actualizar rol</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="ModificarRol" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidRolMod"
                                                    id="numidRolMod" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Rol</b></h5>
                                                    <input class="form-control inicialM" type="text" name="txtRolMod"
                                                        id="txtRolMod">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnModificarRol" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para actualziacion de estado rol-->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Cambiar el estado del rol</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="activarVersion" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidRolElim"
                                                    id="numidRolElim" hidden>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Estado actual</b></h5>
                                                    <input class="form-control" type="text" name="txtRolElim"
                                                        id="txtRolElim" readonly>
                                                    <br>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Nuevo estado del rol</b></h5>
                                                    <select class="form-group select1" id="estadoModRol" name="estadoModRol">
                                                        <option >- Seleccione el nuevo estado -</option>
                                                        <option value="ACTIVO">Activo</option>
                                                        <option value="INACTIVO">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEliminarRol" class="btn btn-primary"><i
                                                    class="fas fa-times"></i> Cambiar Estado</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gin Modulo para el manejo de rol-->
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>
    <script src="../js/administrador/usuario.adm.js"></script>

</body>

</html>