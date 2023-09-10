<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Tipo de Documentos</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-documentos-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-documentos" type="button" role="tab" aria-controls="nav-documentos"
                        aria-selected="true">Tipo de Documentos</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-documentos" role="tabpanel"
                    aria-labelledby="nav-documentos-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h2 class="card-title text-center"><b>Tipo Documento</b></h2>
                            <button type="button" class="btn btn-primary mb-3" id="btnCrearTipoDoc"><i
                                    class="fas fa-plus text-center"></i> Crear Tipo de Documento</button>
                            <button type="button" id="volverRegistroTipoDoc" class="btn btn-primary mb-3" hidden><i
                                    class="fas fa-eye"></i>
                                Ver Tipos de Documetos Registrados</button>
                            <br>
                            <br>
                            <form class="row g-3 form-group bordeado" hidden id="TipoDocumentos" method="POST">
                                <h4 class="card-title text-center"><b>Crear Tipo Documento</b></h4>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5><b>Nombre Tipo Documento*</b></h5>
                                    <input class="form-control inicialM" type="text" name="txtTipoDocumento"
                                        id="txtTipoDocumento" required
                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h5><b>Siglas Tipo Documento*</b></h5>
                                    <input class="form-control" type="text" name="txtSiglaTipoDocumento"
                                        id="txtSiglaTipoDocumento" maxlength="2" required
                                        onkeyup="javascript:this.value=this.value.toUpperCase(); ">
                                </div>
                                <span class="text-muted">* Campo Obligatorio</span>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary mb-3" id="btnRegistrarTipoDocumento"><i
                                            class="fas fa-plus"></i> Crear Tipo Documento</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 bordeado" id="tipoDocumentosRes">
                            <h4 class="card-title text-center"><b>Tipo Documento Registrados</b></h4>
                            <div class="">
                                <br>
                                <h5 id="tipoDocumentos"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones sobre Tipo Documento-->
                        <div class="modal fade bd-example-modal-lg" id="actualizarTipoDocuento" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Actualizar el tipo de
                                                documento</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="ModificarTipoDoc" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidTipoDocumentoMod"
                                                    id="numidTipoDocumentoMod" hidden>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Nombre Tipo Documento*</b></h5>
                                                    <input class="form-control inicialM" type="text"
                                                        name="txtTipoDocumentoMod" id="txtTipoDocumentoMod" required>
                                                </div>

                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Sigla Tipo Documento*</b></h5>
                                                    <input class="form-control" type="text"
                                                        name="txtSiglaTipoDocumentoMod" id="txtSiglaTipoDocumentoMod"
                                                        maxlength="2" required
                                                        onkeyup="javascript:this.value=this.value.toUpperCase(); ">
                                                </div>
                                            </div>
                                            <span class="text-muted">* Campo Obligatorio</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnModificarTipoDoc" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para cambio de estado sobre Tipo Documento-->
                        <div class="modal fade bd-example-modal-lg" id="cambiarEstadoTipoDoc" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Cambiar el estado al tipo
                                                documento</b>
                                        </h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="inactivarTipoDoc" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidTipDocElim"
                                                    id="numidTipDocElim" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Nombre Tipo Documento</b></h5>
                                                    <input class="form-control" type="text" name="txtTipoDocElim"
                                                        id="txtTipoDocElim" readonly>
                                                    <br>
                                                </div>

                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Estado actual del tipo documento</b></h5>
                                                    <input class="form-control" type="text" name="txtSiglaTipDocElim"
                                                        id="txtSiglaTipDocElim" readonly>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Nuevo Estado del Proceso</b></h5>
                                                    <select class="form-group select1" id="estadoModTipdoc"
                                                        name="estadoModTipdoc">
                                                        <option>- Seleccione el nuevo estado -</option>
                                                        <option value="ACTIVO">Activo</option>
                                                        <option value="INACTIVO">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEliminarTipDoc" class="btn btn-primary"><i
                                                    class="fas fa-times"></i> Cambiar Estado</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>< 
                                                        
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
    <script src="../js/administrador/documento.js"></script>


    <script>
    function macroDoc(inputSelect) {
        var indice1 = inputSelect.selectedIndex;
        var selectedOption1 = inputSelect.options[indice1]
        document.getElementById("macroNombre").value = selectedOption1.text;
    };

    function procesoDoc(inputSelect) {
        var indice = inputSelect.selectedIndex;
        var selectedOption = inputSelect.options[indice]
        var uno = selectedOption.text[0];
        var dos = selectedOption.text[1];
        var s2 = uno + dos;
        document.getElementById("siglasProcDoc").value = s2;

        var indice1 = inputSelect.selectedIndex;
        var selectedOption1 = inputSelect.options[indice1]
        document.getElementById("procesoNom").value = selectedOption1.text;

        var x = document.getElementById("procesoNuevo").value;
        document.getElementById("idProc12").value = x;
    };

    function tipoDoc(inputSelect) {
        var indice = inputSelect.selectedIndex;
        var selectedOption = inputSelect.options[indice]
        var uno = selectedOption.text[0];
        var dos = selectedOption.text[1];
        var s2 = uno + dos;
        document.getElementById("siglasTipDoc12").value = s2;

        var indice1 = inputSelect.selectedIndex;
        var selectedOption1 = inputSelect.options[indice1]
        document.getElementById("tipoDocNom").value = selectedOption1.text;

        var x = document.getElementById("tipoDocumento").value;
        document.getElementById("idTipoDoc12").value = x;
    }
    </script>

</body>

</html>