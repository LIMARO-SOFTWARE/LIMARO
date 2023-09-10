<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Listado Maestro de Documentos Obsoletos</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-obsoletos"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Listado Maestro de
                        Documentos Obsoletos</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-obsoletos" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h2 class="card-title text-center"><b> Documentos Obsoletos </b></h2>
                            <br>
                            <form class="row g-3 form-group bordeado" id="frmObsoletos" method="POST">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <input class="form-control" type="text" name="idDocumento2" id="idDocumento2"
                                        hidden>
                                    <h5 for="data"><b>Seleccionar Documento a Inactivar*</b></h5>
                                    <input class="form-control" type="text" name="documentoAuto2" id="documentoAuto2">
                                    <input class="form-control" type="text" name="estadoObs" id="estadoObs"
                                        value="OBSOLETO" hidden>
                                </div>
                                <span class="text-muted">* Campo Obligatorio</span>
                                <br>
                                <div class="col-md-4 col-xs-12 col-sm-12" id="btnObsoletos" hidden>
                                    <button class="btn btn-danger" id="btnObsoleto" namne="btnobsoleto"><i
                                            class="fas fa-times"></i> Inactivar
                                        Documento</button>
                                    <button type="reset" id="limpiar1" name="limpiar1" class="btn btn-secondary"><i
                                            class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 bordeado" id="obsoletos">
                            <br>
                            <h4 class="card-title text-center">Listado Maestro de Documentos Obsoletos</h4>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h5 id="documentosObs"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones sobre la version-->
                        <div class="modal fade bd-example-modal-lg" id="activarVersion" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Activar la Version</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="activarVersion1" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="idDocumentoAct"
                                                    id="idDocumentoAct" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Se activara el documento y la version:</b></h5>
                                                    <input class="form-control inicialM" type="text"
                                                        name="txtNombreDocum" id="txtNombreDocum" readonly required>
                                                        <input class="form-control" type="text" name="estadoObs1" id="estadoObs1"
                                        value="VIGENTE" hidden>
                                        <input class="form-control" type="text" name="versionObs" id="versionObs"
                                        value="VIGENTE" hidden>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="bntActivarVersion" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Activar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "footer.php" ?>
    <script src="../js/administrador/versionamiento.js"></script>
</body>

</html>