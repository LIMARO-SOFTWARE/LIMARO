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
                <div class="nav nav-pills " id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-cargo-tab" data-bs-toggle="tab" data-bs-target="#nav-cargo"
                        type="button" role="tab" aria-controls="nav-cargo" aria-selected="true">Cargos</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <!-- Modulo para el manejo de cargos-->
                <div class="tab-pane fade show active" id="nav-cargo" role="tabpanel" aria-labelledby="nav-cargo-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h2 class="card-title text-center"><b>Cargos</b></h2>
                            <button type="button" class="btn btn-primary mb-3" id="btnFomularioCargo"><i
                                    class="fas fa-plus"></i> Crear Cargo</button>
                            <button type="button" id="volverRegistroCargo" class="btn btn-primary mb-3" hidden><i
                                    class="fas fa-eye"></i>
                                Ver Cargos Registrados</button>
                            <br>
                            <br>
                            <form class="row g-3 form-group bordeado"
                                action="../controladorAdministrador/cargo/cargo.create.php" method="POST"
                                enctype="multipart/form-data" hidden id="formCArgo">
                                <h4 class="card-title text-center"><b>Crear Cargo</b></h4>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5><b>Nombre Cargo*</b></h5>
                                    <input class="form-control inicialM " type="text" name="txtCargo" id="txtCargo"
                                        required>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12 ">
                                    <h5><b>Manual de Funciones*</b></h5>
                                    <input class="form-control" type="file" id="fileCargo" name="fileCargo" multiple>
                                </div>
                                <span class="text-muted">* Campo Obligatorio</span>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Crear
                                        Cargo</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 bordeado" id="cargosRegistradoss">
                            <h4 class="card-title text-center"><b>Cargos Registrados</b></h4>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <br>
                                <h5 id="cargos"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones sobre cargo-->
                        <div class="modal fade bd-example-modal-lg" id="modCargo" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Actualizar Cargo</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group"
                                        action="../controladorAdministrador/cargo/cargo.update.php" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidCargoMod"
                                                    id="numidCargoMod" hidden>
                                                <input class="form-control" type="text" name="txtCargoModAnt"
                                                    id="txtCargoModAnt" hidden>
                                                <input class="form-control" type="text" name="txtManualModAnt"
                                                    id="txtManualModAnt" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Cargo</b></h5>
                                                    <input class="form-control inicialM" type="text" name="txtCargoMod"
                                                        id="txtCargoMod">
                                                    <br>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Manual de Funciones</b></h5>
                                                    <input class="form-control" type="file" id="fileCargoMod"
                                                        name="fileCargoMod" multiple>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i>
                                                Modificar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para actualziacion de estado Cargo-->
                        <div class="modal fade bd-example-modal-lg" id="estadoCargo" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Cambiar estado del cargo</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="inactivarCargo" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidCargoElim"
                                                    id="numidCargoElim" hidden>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Estado Actual</b></h5>
                                                    <input class="form-control" type="text" name="txtCargoElim"
                                                        id="txtCargoElim" readonly>
                                                    <br>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Nuevo estado del cargo</b></h5>
                                                    <select class="form-group select1" id="estadoModCargo"
                                                        name="estadoModCargo">
                                                        <option >- Seleccione el nuevo estado -</option>
                                                        <option value="ACTIVO">Activo</option>
                                                        <option value="INACTIVO">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEliminarCargo" class="btn btn-primary"><i
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
                <!-- Fin Modulo para el manejo de cargo-->
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>
    <script src="../js/administrador/usuario.adm.js"></script>

</body>

</html>