<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Procesos</title>
</head>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link  active " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-procesos"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true"> Proceso</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-procesos" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h2 class="card-title text-center"><b>Procesos</b></h2>
                            <button type="button" class="btn btn-primary mb-3" id="btnCrearProce"><i
                                    class="fas fa-plus text-center"></i> Crear Procesos</button>
                            <button type="button" id="volverRegistroProce" class="btn btn-primary mb-3" hidden><i
                                    class="fas fa-eye"></i>
                                Ver Procesos Registrados</button>
                            <br>
                            <br>
                            <form class="row g-3 form-group bordeado" id="proceso" method="POST" hidden>
                                <h4 class="card-title text-center"><b>Crear Proceso</b></h4>
                                <div class="col-md-5 col-xs-12 col-sm-12">
                                    <h5><b>Nombre macroproceso*</b></h5>
                                    <select class="form-control redondeado inicialM" id="tipoMacroProceso"
                                        name="tipoMacroProceso" onchange='estafuncion(this);' required></select>
                                    <input type="text" id="idInput" name="idInput" class="input" hidden>
                                </div>
                                <div class="col-md-5 col-xs-12 col-sm-12">
                                    <h5><b>Nombre proceso*</b></h5>
                                    <input class="form-control inicialM" type="text" name="txtProceso" id="txtProceso"
                                        onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                </div>
                                <div class="col-md-2 col-xs-12 col-sm-12">
                                    <h5><b>Siglas proceso*</b></h5>
                                    <input class="form-control" type="text" name="txtSiglaProceso" id="txtSiglaProceso"
                                        maxlength="2" required
                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <h5><b>Objetivo principal del proceso*</b></h5>
                                    <label class="text-muted"> Caracteres restantes: <span></span></label>
                                    <textarea class="form-control inicialM" type="text" name="txtObjetivoproceso"
                                        id="txtObjetivoproceso" maxlength="600" required></textarea>

                                </div>
                                <span class="text-muted">* Campo Obligatorio</span>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary mb-3" id="btnRegistrarProceso"><i
                                            class="fas fa-plus"></i> Crear Proceso</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 bordeado" id="procesoRgis">
                            <h4 class="card-title text-center"><b>Procesos Registrados</b></h4>
                            <div>
                                <br>
                                <h5 id="procesos"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones sobre procesos-->
                        <div class="modal fade bd-example-modal-lg" id="exampleModale" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Actualizar Proceso</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="ModificarPro" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidProcesosMod"
                                                    id="numidProcesosMod" hidden>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Macroproceso Actual*</b></h5>
                                                    <input type="text" id="idMacroAnt" name="idMacroAnt" class="input"
                                                        hidden>
                                                    <input class="form-control inicialM" type="text"
                                                        name="txtMacroActual" id="txtMacroActual" readonly>
                                                    <br>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Nuevo Macroproceso*</b></h5>
                                                    <select class="form-control redondeado inicialM"
                                                        id="macroproActuPro" name="macroproActuPro"
                                                        onchange='estafuncion1(this);' required></select>
                                                    <input type="text" id="idInput1" name="idInput1" class="input"
                                                        hidden>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Nombre Proceso*</b></h5>
                                                    <input class="form-control" type="text" name="txtProcesoAnt"
                                                        id="txtProcesoAnt" hidden>
                                                    <input class="form-control inicialM" type="text"
                                                        name="txtProcesoMod" id="txtProcesoMod">
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Sigla Proceso*</b></h5>
                                                    <input class="form-control" type="text" name="txtSiglaProcesoMod"
                                                        id="txtSiglaProcesoMod" maxlength="2"
                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                    <br>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Objetivo del Proceso*</b></h5>
                                                    <label class="text-muted"> Caracteres restantes:
                                                        <span></span></label>
                                                    <textarea class="form-control inicialM" type="text"
                                                        name="txtObjetiProMod" id="txtObjetiProMod" maxlength="600"
                                                        rows="4" required></textarea>
                                                </div>
                                            </div>
                                            <span class="text-muted">* Campo Obligatorio</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnModificarPro" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para actualziacion de estado procesos-->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Cambiar estado al proceso</b>
                                        </h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="inactivarProce" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidProcesosElim"
                                                    id="numidProcesosElim" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Nombre del proceso</b></h5>
                                                    <input class="form-control " type="text" name="txtProcesoElim"
                                                        id="txtProcesoElim" readonly>
                                                    <br>
                                                </div>

                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Estado actual del proceso</b></h5>
                                                    <input class="form-control" type="text" name="txtEstadoActualPro"
                                                        id="txtEstadoActualPro" readonly>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Nuevo Estado del Proceso</b></h5>
                                                    <select class="form-group  select1" id="estadoModProceso"
                                                        name="estadoModProceso">
                                                        <option>- Seleccione el nuevo estado -</option>
                                                        <option value="ACTIVO">Activo</option>
                                                        <option value="INACTIVO">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEliminarPro" class="btn btn-primary"><i
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
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>
    <script src="../js/administrador/procesos.Adm.js"></script>
    <script>
    function estafuncion(inputSelect) {
        var indice = inputSelect.selectedIndex;
        var selectedOption = inputSelect.options[indice]
        document.getElementById("idInput").value = selectedOption.text;
    }

    function estafuncion1(inputSelect) {
        var indice = inputSelect.selectedIndex;
        var selectedOption = inputSelect.options[indice]
        document.getElementById("idInput1").value = selectedOption.text;
    }
    </script>
</body>

</html>