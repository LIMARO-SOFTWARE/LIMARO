<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Macroprocesos Y Procesos</title>
</head>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-macroprocesos" type="button" role="tab" aria-controls="nav-home"
                        aria-selected="true"> Macroproceso</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-macroprocesos" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h2 class="card-title text-center"><b>Macroprocesos</b></h2>
                            <button type="button" class="btn btn-primary mb-3" id="btnCrearMacro"><i
                                    class="fas fa-plus text-center"></i> Crear Macroproceso</button>
                            <button type="button" id="volverRegistroMacro" class="btn btn-primary mb-3" hidden><i
                                    class="fas fa-eye"></i>
                                Ver Macroprocesos Registrados</button>
                            <br>
                            <br>
                            <form class="row g-3 form-group bordeado " id="macroproceso" method="POST" hidden>
                                <h4 class="card-title text-center"><b>Crear Macroproceso</b></h4>
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h5><b>Nombre Macroproceso*</b></h5>
                                    <label class="text-muted"> <span></span></label>
                                    <input class="form-control inicialM" type="text" name="txtmacroproceso"
                                        id="txtmacroproceso" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        required>
                                </div>
                                <div class="col-md-9 col-xs-12 col-sm-12">
                                    <h5><b>Objetivo Principal del macroproceso*</b></h5>
                                    <label class="text-muted"> Caracteres restantes: <span></span></label>
                                    <textarea class="form-control inicialM" type="text" name="txtObjetivoMacroproceso"
                                        id="txtObjetivoMacroproceso" maxlength="600" required></textarea>

                                </div>
                                <span class="text-muted">* Campo Obligatorio</span>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary mb-3" id="btnRegistrarMacroroceso"><i
                                            class="fas fa-plus"></i> Crear Macroproceso</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 bordeado" id="macroRegistrados">
                            <h4 class="card-title text-center"><b>Macroproceso Registrados</b></h4>
                            <div class="">
                                <br>
                                <h5 id="macroprocesos"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones sobre macroprocesos-->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Actualizar el macroproceso</b>
                                        </h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="ModificarMacropro" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numMacroMod"
                                                    id="numMacroMod" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Nombre macroproceso</b></h5>
                                                    <input class="form-control inicialM" type="text"
                                                        name="txtMacroprocesoModAnt" id="txtMacroprocesoModAnt" hidden>
                                                    <input class="form-control inicialM" type="text"
                                                        name="txtMacroprocesoMod" id="txtMacroprocesoMod">
                                                    <br>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Objetivo macroproceso</b></h5>
                                                    <label class="text-muted"> Caracteres restantes:
                                                        <span></span></label>
                                                    <textarea class="form-control inicialM" type="text"
                                                        name="txtObjetivoMod" id="txtObjetivoMod" maxlength="600"
                                                        required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnModificarMacropro" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para actualziacion de estado macroprocesos-->
                        <div class="modal fade bd-example-modal-lg" id="eliminacionMacroProceso" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Cambiar el estado del
                                                macroproceso</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="EstadoMacroproce" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidMacroprocesosElim"
                                                    id="numidMacroprocesosElim" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Nombre del macroproceso</b></h5>
                                                    <input class="form-control " type="text" name="txtMacroprocesoElim"
                                                        id="txtMacroprocesoElim" readonly>
                                                    <br>
                                                </div>

                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Estado actual del macroproceso</b></h5>
                                                    <input class="form-control" type="text" name="txtEstadoActualMac"
                                                        id="txtEstadoActualMac" readonly>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Nuevo estado del proceso</b></h5>
                                                    <select class="form-group select1" id="estadoModMacroproceso"
                                                        name="estadoModMacroproceso">
                                                        <option>- Seleccione el nuevo estado -</option>
                                                        <option value="ACTIVO">Activo</option>
                                                        <option value="INACTIVO">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEstadoMacropro" class="btn btn-primary"><i
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