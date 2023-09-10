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
                    <button class="nav-link active" id="nav-actualizar-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-actualizar" type="button" role="tab" aria-controls="nav-actualizar"
                        aria-selected="false">Actualización De Documento</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-actualizar" role="tabpanel"
                    aria-labelledby="nav-actualizar-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h4 class="card-title text-center"><b>Actualización De Documento</b></h4>
                            <br>
                            <div class="bordeado">
                                <br>
                                <h5 id="actualizacion"></h5>
                            </div>
                        </div>
                        <!-- Modal para solicitar actualizaciones-->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Solicitar Actualización de
                                                Documento</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group"
                                        action="../controladorEmpleado/solicitudes.actualiDoc.create.php" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <h5><b>Código Documento*</b></h5>
                                            <input type="text" class="form-control redondeado" name="codigo" id="codigo"
                                                readonly>
                                            <h5><b>Tipo Documento*</b></h5>
                                            <input type="text" class="form-control redondeado" name="idTipoDoc1"
                                                id="idTipoDoc1" hidden>
                                            <input type="text" class="form-control redondeado" name="tipoDoc1"
                                                id="tipoDoc1" readonly>
                                            <h5><b>Prioridad*</b></h5>
                                            <select class="form-control redondeado" id="prioridad1" name="prioridad1"
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
                                            <h5><b>Descripción*</b></h5>
                                            <label class="text-muted"> Caracteres restantes:
                                                        <span></span></label>
                                            <textarea type="text" class="form-control redondeado" rows="5" 
                                                id="solicitud1" name="solicitud1" maxlength="600" required></textarea>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5><b>Subir Documento</b></h5>
                                                <input type="file" class="form-control redondeado"
                                                    id="fileActualizacion" name="fileActualizacion" multiple>
                                                <p class="text-muted">Si se agrega más de un archivo, anexarlos en
                                                    carpeta comprimida .zip</p>
                                            </div>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <span class="text-muted">* Campo Obligatorio</span>
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
    <script src="../js/empleado/solicitudes.js"></script>
</body>


</html>