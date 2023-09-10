<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Solicitudes</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <br>
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-eliminar-tab" data-bs-toggle="tab" data-bs-target="#nav-eliminar"
                        type="button" role="tab" aria-controls="nav-eliminar" aria-selected="false"> Eliminación de
                        Documento</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-eliminar" role="tabpanel" aria-labelledby="nav-eliminar-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h4 class="card-title text-center"><b>Eliminación De Documentos</b></h4>
                            <br>
                            <div class="bordeado">
                                <br>
                                <h5 id="eliminacion"></h5>
                            </div>
                        </div>
                        <!-- Modal para solicitar eliminacion-->
                        <div class="modal fade bd-example-modal-lg " id="exampleModal2" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Solicitar Eliminación de
                                            Documento</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group"
                                        action="../controladorAdministrador/solicitud/solicitudes.elimDoc.create.php" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <h5>Código Documento</h5>
                                            <input type="text" class="form-control redondeado" name="codigo2" id="codigo2" readonly>
                                            <h5>Tipo Documento</h5>
                                            <input type="text" class="form-control redondeado" name="idTipoDoc2"
                                                id="idTipoDoc2" hidden>
                                            <input type="text" class="form-control redondeado" name="tipoDoc2"
                                                id="tipoDoc2" readonly>
                                            <h5>Prioridad</h5>
                                            <select class="form-control redondeado" id="prioridad2" name="prioridad2"
                                                required>
                                                <option disabled selected> - Seleccione Un Tipo De Documento -</option>
                                                <option value="IMPORTANTE - URGENTE"> IMPORTANTE - URGENTE</option>
                                                <option value="IMPORTANTE - NO URGENTE"> IMPORTANTE - NO URGENTE
                                                </option>
                                                <option value="NO IMPORTANTE - URGENTE"> NO IMPORTANTE - URGENTE
                                                </option>
                                                <option value="NO IMPORTANTE - NO URGENTE"> NO IMPORTANTE - NO URGENTE
                                                </option>

                                            </select>
                                            <h5>Descripción</h5>
                                            <label class="text-muted"> Caracteres restantes:
                                                        <span></span></label>
                                            <textarea type="text" class="form-control redondeado" rows="8" cols="55"
                                                id="solicitud2" name="solicitud2" maxlength="600" required></textarea>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5>Subir Documento</h5>
                                                <input type="file" class="form-control redondeado" id="fileEliminacion"
                                                    name="fileEliminacion" multiple>
                                                <p class="text-muted">Si se agrega más de un archivo, anexarlos en
                                                    carpeta comprimida .zip</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>
                                                Crear Solicitud</button>
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
    <script src="../js/administrador/solicitudes.adm.js"></script>
</body>


</html>