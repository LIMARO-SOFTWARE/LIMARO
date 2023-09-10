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
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-solicitudes-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-solicitudes" type="button" role="tab" aria-controls="nav-solicitudes"
                        aria-selected="false">Solicitudes Asignadas</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-solicitudes" role="tabpanel"
                    aria-labelledby="nav-solicitudes-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h2 class="card-title text-center"><b>Solicitudes Asignadas</b></h2>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <form action="" class="form-group bordeado" id="buscar">
                                    <br>
                                    <input type="number" name="numIdSolicitud" id="numIdSolicitud" hidden>
                                    <input type="number" name="numIdSolicitud3" id="numIdSolicitud3" hidden>
                                    <h5 id="solicitudesAsignadas"></h5>
                                </form>
                            </div>
                        </div>
                        <!-- Modal Asignar Funcionario-->
                        <!-- <div class="modal fade bd-example-modal-lg" id="asignarFuncionarioSol" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Asignar Funcionario Encargado
                                                de
                                                la Solicitud</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" class="form-group" id="buscar2">
                                        <div class="modal-body">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <input type="number" name="numIdSolicitud2" id="numIdSolicitud2" hidden>
                                                <h5><b>Funcionario Asignado</b></h5>
                                                <input class="form-control " id="funcionarioAsignado"
                                                    name="funcionarioAsignado" aria-label="E"
                                                    aria-describedby="basic-addon1" readonly>
                                                <br>
                                                <h5><b>Fecha de Asignación</b></h5>
                                                <input class="form-control " id="fecha" name="fecha" aria-label="E"
                                                    aria-describedby="basic-addon1" readonly>
                                                <br>
                                            </div>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5><b>Seleccione para asignar o modificar el funcionario</b></h5>
                                                <select class="form-control " id="empleado" name="empleado"
                                                    aria-label="E" aria-describedby="basic-addon1"></select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnAgregarFunc" name="btnAgregarFunc"
                                                class="btn btn-primary"><i class="fas fa-plus"></i>Asignar
                                                Funcionario</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i>Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                        <!-- Modal para ver comentarios-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Comentarios de la
                                                Solicitud</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" class="form-group" id="buscar1">
                                        <div class="modal-body">
                                            <input type="number" name="numIdSolicitud1" id="numIdSolicitud1" hidden>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5><b>Agregar Comentario</b></h5>
                                                <label class="text-muted"> Caracteres restantes: <span></span></label>
                                                <textarea type="text" class="form-control redondeado inicialM" rows="2"
                                                    id="comentrioEmpleado" name="comentrioEmpleado" maxlength="600" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="btnCrearcomentarioAsig"
                                                name="btnCrearcomentarioAsig" data-bs-toggle="modal"> <i
                                                    class="fas fa-plus"></i>Agregar Comentario</button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 id="comentarios"></h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i
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