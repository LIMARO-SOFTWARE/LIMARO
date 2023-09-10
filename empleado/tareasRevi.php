<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Tareas</title>

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
                        aria-selected="false">Tareas Por Revisar</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-solicitudes" role="tabpanel"
                    aria-labelledby="nav-solicitudes-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h2 class="card-title text-center"><b>Tareas Por Revisar</b></h2>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <form action="" class="form-group" id="iniciarTarea">
                                    <input type="number" name="numIdSolicitud" id="numIdSolicitud" hidden>
                                    <input type="number" name="numIdSolicitud3" id="numIdSolicitud3" hidden>
                                    <br>
                                    <h5 id="tareasArevisar"></h5>
                                </form>
                            </div>

                        </div>
                        <!-- Modal para ver comentarios-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Comentarios de la Tarea</b>
                                        </h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" class="form-group" id="buscar1">
                                        <div class="modal-body">
                                            <input type="number" name="numIdSolicitud2" id="numIdSolicitud2" hidden>
                                            <input type="number" name="numIdSolicitud1" id="numIdSolicitud1" hidden>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5><b>Agregar Comentario</b></h5>
                                                <label class="text-muted"> Caracteres restantes: <span></span></label>
                                                <textarea type="text" class="form-control inicialM" rows="2"
                                                    id="comentrioEmpleado" name="comentrioEmpleado" maxlength="600"
                                                    required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="btnCrearcomentario"
                                                name="btnCrearcomentario" data-bs-dismiss="modal"> <i
                                                    class="fas fa-plus"></i>Agregar
                                                Comentario</button>
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
                        <!-- Modal para procesar tares-->
                        <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Procesar Tarea</b>
                                        </h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="form-group" id="buscar2"
                                        action="../controladorAdministrador/tarea/procesarTareaReve.update.php"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="number" name="idTarea2" id="idTarea2" hidden>
                                            <input type="number" name="idTarea23" id="idTarea23" hidden>
                                            <input type="number" name="numIdSolicitudCom" id="numIdSolicitudCom" hidden>
                                            <input type="text" name="ruta" id="ruta" hidden>
                                            <input type="text" name="documento1" id="documento1" hidden>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5><b>Agregar Comentario</b></h5>
                                                <label class="text-muted"> Caracteres restantes: <span></span></label>
                                                <textarea type="text" class="form-control inicialM" rows="2"
                                                    id="comentarioTarea" name="comentarioTarea" maxlength="600"
                                                    required></textarea>
                                                <br>
                                            </div>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5><b>Seleccione el funcionario para Aprobación</b></h5>
                                                <select class="form-control " id="empleado" name="empleado"
                                                    aria-label="E" aria-describedby="basic-addon1" required></select>
                                            </div>
                                            <input type="text" class="form-control " id="empleadoCorreo"
                                                name="empleadoCorreo" hidden>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-file-import"></i> Procesar Tarea</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para devolver tares-->
                        <div class="modal fade" id="exampleModalDevol" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Devolver Tarea</b>
                                        </h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="form-group" id="buscar12"
                                        action="../controladorAdministrador/tarea/procesarTareaDeve.update.php"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="number" name="idTarea2Dev" id="idTarea2Dev" hidden>
                                            <input type="number" name="idTarea23Dev" id="idTarea23Dev" hidden>
                                            <input type="number" name="numIdSolicitudComDev" id="numIdSolicitudComDev"
                                                hidden>
                                            <input type="text" name="rutaDev" id="rutaDev" hidden>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5><b>Agregar Comentario</b></h5>
                                                <label class="text-muted"> Caracteres restantes: <span></span></label>
                                                <textarea type="text" class="form-control inicialM" rows="2"
                                                    id="comentarioTarea" name="comentarioTarea" maxlength="600"
                                                    required></textarea>
                                                <br>
                                            </div>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5><b>Seleccione el funcionario para Devolución</b></h5>
                                                <select class="form-control " id="empleadoDev" name="empleadoDev"
                                                    aria-label="E" aria-describedby="basic-addon1" required></select>
                                                <br>
                                            </div>
                                            <input type="text" class="form-control " id="empleadoCorreoDev"
                                                name="empleadoCorreoDev" hidden>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5><b>Subir Documento*</b></h5>
                                                <input type="file" class="form-control redondeado" id="fileTarea"
                                                    name="fileTarea" multiple required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-reply-all"></i> Devolver Tarea </button>
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
    <script src="../js/administrador/tareas.adm.js"></script>
</body>

</html>