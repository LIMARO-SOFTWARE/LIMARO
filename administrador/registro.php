<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Registro de Documentos</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-crear"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Creación de
                        Documentos
                    </button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-crear" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h2 class="card-title text-center"><b>Documentos</b></h2>
                            <button type="button" class="btn btn-primary mb-3" id="btnCrearDoc"><i
                                    class="fas fa-plus text-center"></i> Crear Documento</button>
                            <button type="button" id="volverRegistroDoc" class="btn btn-primary mb-3" hidden><i
                                    class="fas fa-eye"></i>
                                Ver Documetos Registrados</button>
                            <br>
                            <br>
                            <form class="row g-3 form-group bordeado" id="crearDoc" name="crearDoc" method="POST"
                                hidden>
                                <h4 class="card-title text-center"><b>Crear Documento</b></h4>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5><b>Macroproceso*</b></h5>
                                    <select class="form-control redondeado" id="macroprocesoNuevo"
                                        onchange='macroDoc(this);' name="macroprocesoNuevo" required></select>
                                    <input type="text" aria-label="E" id="macroNombre" name="macroNombre"
                                        class="form-control codigo" hidden>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5><b>Proceso*</b></h5>
                                    <select class="form-control redondeado" id="procesoNuevo" name="procesoNuevo"
                                        onchange='procesoDoc(this);' required></select>
                                    <input type="text" aria-label="E" id="procesoNom" name="procesoNom"
                                        class="form-control codigo" hidden>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5><b>Tipo de Documento*</b></h5>
                                    <select class="form-control redondeado" id="tipoDocumento" name="tipoDocumento"
                                        onchange='tipoDoc(this);' required></select>
                                    <input type="text" aria-label="E" id="tipoDocNom" name="tipoDocNom"
                                        class="form-control codigo" hidden>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12 d-flex  align-items-end" id="botonesAsig" style="align-self: end;">
                                    <button type="button" id="btnAsignarCod" name="btnAsignarCod"
                                        class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Asignar Número</button>
                                    <div class="" id="codigoAsi" hidden>
                                        <h5><b>Código del Documento*</b></h5>
                                        <div class="input-group">
                                            <input type="text" aria-label="E" id="siglasProcDoc" name="siglasProcDoc"
                                                class="form-control codigo" readonly required>
                                            <input type="text" aria-label="E" id="idProc12" name="idProc12"
                                                class="form-control codigo" hidden>
                                            <label class="input-group-text" id="inputGroup-sizing-lg">-</label>
                                            <input type="text" aria-label="E" class="form-control codigo"
                                                id="siglasTipDoc12" name="siglasTipDoc12" readonly required>

                                            <input type="text" aria-label="E" id="idTipoDoc12" name="idTipoDoc12"
                                                class="form-control codigo" hidden>

                                            <label class="input-group-text" id="inputGroup-sizing-lg">-</label>
                                            <input type="number" aria-label="E" class="form-control codigo"
                                                id="txtcodigo" name="txtcodigo" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" id="nombreAsig" hidden>
                                    <h5><b>Nombren Del Documento*</b></h5>
                                    <input type="text" class="form-control redondeado inicialM" id="nombreDoc"
                                        name="nombreDoc" required>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" id="objetivoDoc" hidden>
                                    <h5><b>Objetivo principal del Documento*</b></h5>
                                    <label class="text-muted"> Caracteres restantes: <span></span></label>
                                    <textarea class="form-control inicialM" type="text" name="txtObjetivoproceso"
                                        id="txtObjetivoproceso" maxlength="600" required></textarea>
                                </div>
                                <span class="text-muted">* Campo Obligatorio</span>
                                <div class="col-md-12  col-xs-12 col-sm-12" style="align-self: end;">
                                    <br>
                                    <button type="submit" id="btncrearDoc" name="btncrearDoc"
                                        class="btn btn-primary mb-3" hidden><i class="fas fa-plus"></i> Crear
                                        Documento</button>
                                    <button type="reset" class="btn btn-secondary mb-3" id="btncrearResDoc"
                                        name="btncrearResDoc" hidden><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <br>
                        <div class="col-md-12 col-xs-12 col-sm-12 bordeado" id="DocResgitrados">
                            <br>
                            <h4 class="card-title text-center"><b>Documentos Registrados</b></h4>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h5 id="documentosRg"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualziacion informacion de  documento-->
                        <div class="modal fade bd-example-modal-lg" id="modifiDoc" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cambiar Información Del Documento
                                        </h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="cambiarNomDoc" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="idDocumentoNod"
                                                    id="idDocumentoNod" hidden >
                                                <div class="col-md-12 col-xs-12 col-sm-12" id="nombreAsig">
                                                    <h5><b>Nombren Del Documento*</b></h5>
                                                    <input type="text" aria-label="E"
                                                        class="form-control redondeado inicialM" id="nombreModif"
                                                        name="nombreModif" required>
                                                    <br>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12" id="objetivoDoc">
                                                    <h5><b>Objetivo principal del Documento*</b></h5>
                                                    <label class="text-muted"> Caracteres restantes:
                                                        <span></span></label>
                                                    <textarea class="form-control inicialM" type="text"
                                                        name="objetivoModif" id="objetivoModif" rows="4"
                                                        maxlength="600" required></textarea>
                                                </div>
                                                <span class="text-muted">* Campo Obligatorio</span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnCambiarNomDoc" name="btnCambiarNomDoc"
                                                class="btn btn-primary"><i class="fas fa-edit"></i> Cambiar Información
                                                Del
                                                Documento</button>
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
    };


    </script>

</body>

</html>