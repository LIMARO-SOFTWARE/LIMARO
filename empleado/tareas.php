<!-- Se agrega Head -->
<?php include_once "head.frm.php" ?>
<title>Solicitudes</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.frm.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-solicitudes-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-solicitudes" type="button" role="tab" aria-controls="nav-solicitudes"
                        aria-selected="false">Revisión</button>
                    <button class="nav-link " id="nav-aprobacion-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-aprobacion" type="button" role="tab" aria-controls="nav-aprobacion"
                        aria-selected="true">Aprobación</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-solicitudes" role="tabpanel"
                    aria-labelledby="nav-solicitudes-tab">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        <br>
                            <h3 class="card-title text-center">Revisión Documento</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <form action="" class="form-group" id="buscarTareaComentario12">
                                    <input type="number" name="numIdTarea1" id="numIdTarea1" hidden>
                                    <input type="number" name="numIdTidTareaCom1Act" id="numIdTidTareaCom1Act" hidden>
                                    <br>
                                    <h5 id="tareasAct"></h5>
                                </form>
                            </div>
                        </div>
                        <!-- Modal para administrar tarea-->
                        <div class="modal fade" id="modaltareaAct" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ADMINISTRAR TAREA</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" method="POST" id="tareaRevision">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="number" name="numIdTarea11" id="numIdTarea11" hidden>
                                                <div class="col-md-10 col-xs-12 col-sm-12">
                                                    <input class="form-control" type="text" name="id_tareaAct"
                                                        id="id_tareaAct" hidden >
                                                        <input class="form-control" type="text" name="numIdSolT1"
                                                        id="numIdSolT1" hidden>
                                                    <input class="form-co ntrol" type="text" name="idDocumento1"
                                                        id="idDocumento1" hidden>
                                                    <label for="data">Documento</label>
                                                    <input class="form-control" type="text" name="documendocumentoTarea"
                                                        id="documendocumentoTarea" readonly>

                                                </div>
                                                <div class="col-md-2 col-xs-12 col-sm-12">
                                                    <h5>Versión </h5>
                                                    <input class="form-control" type="text" name="versionDoc1"
                                                        id="versionDoc1" readonly>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Descripción de la Versión</h5>
                                                    <textarea type="text" class="form-control redondeado" rows="1"
                                                        id="descriVersion" name="descriVersion" readonly></textarea>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Descripción de la Revisión</h5>
                                                    <textarea type="text" class="form-control redondeado" rows="2"
                                                        id="descriCambioRev" name="descriCambioRev" required></textarea>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <br>
                                                    <a type="button" class="btn btn-primary form-control" href=""
                                                        target="_blank" name="fileDocumentoDes" id="fileDocumentoDes"><i
                                                            class="fas fa-download"></i>Descargar Documento</a>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5>Seleccionar Usuario para Aprobación</h5>
                                                    <select class="form-control" id="empleado1" name="empleado1"
                                                        aria-label="E" aria-describedby="basic-addon1"
                                                        required></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="btnRevisionTarea"
                                                name="btnRevisionTarea" data-bs-dismiss="modal"> <i
                                                    class="fas fa-plus"></i>Iniciar Aprobación</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i
                                                    class="fas fa-undo"></i> Volver</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                                                data-bs-dismiss="modal"><i class="fas fa-times-circle"></i>Devolver
                                                Tarea</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para devolver tarea-->
                        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Devolver Tarea</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" method="POST" id="tareaDevolucion" >
                                        <div class="modal-body">
                                            <input type="number" name="numIdVerDevol" id="numIdVerDevol" hidden>
                                            <input type="number" name="idTareDEvl" id="idTareDEvl" hidden >
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5>Descripción de la Devolución</h5>
                                                <textarea type="text" class="form-control redondeado" rows="1"
                                                    id="descriDevolu" name="descriDevolu"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-dismiss="modal" id="btnDevolverTarea" name="btnDevolverTarea"><i
                                                class="fas fa-times-circle"></i>Devolver Tarea</button>
                                        <button type="button" class="btn btn-primary" data-bs-target="#modaltareaAct"
                                            data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fas fa-undo"></i>
                                            Volver</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-aprobacion" role="tabpanel" aria-labelledby="nav-aprobacion-tab">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        <br>
                            <h3 class="card-title text-center">Aprobación de Documento</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <form action="" class="form-group" id="buscarTareaComentario12">
                                    <input type="number" name="numIdTarea1" id="numIdTarea1" hidden>
                                    <input type="number" name="numIdTidTareaCom1Act" id="numIdTidTareaCom1Act" hidden>
                                    <br>
                                    <h5 id="tareasApr"></h5>
                                </form>
                            </div>
                        </div>
                        <!-- Modal para administrar tarea-->
                        <div class="modal fade" id="modaltareaApr" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ADMINISTRAR TAREA</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" method="POST" id="aprobacion">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="number" name="numIdTareaApro" id="numIdTareaApro" hidden>
                                                <input type="number" name="id_documentoVersion" id="id_documentoVersion" hidden>
                                                <input type="number" name="versionAnterior" id="versionAnterior" hidden>
                                                <input class="form-control" type="text" name="id_tareaApr"
                                                        id="id_tareaApr" hidden >
                                                <div class="col-md-10 col-xs-12 col-sm-12">
                                                    <input class="form-control" type="text" name="numIdSolApr"
                                                        id="numIdSolApr" hidden>
                                                    <input class="form-co ntrol" type="text" name="idDocumentoApr"
                                                        id="idDocumentoApr" hidden>
                                                    <label for="data">Documento</label>
                                                    <input class="form-control" type="text" name="documendocumentoApr"
                                                        id="documendocumentoApr" readonly>

                                                </div>
                                                <div class="col-md-2 col-xs-12 col-sm-12">
                                                    <h5>Versión </h5>
                                                    <input class="form-control" type="text" name="versionDocAp"
                                                        id="versionDocAp" readonly>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Descripción de la Versión</h5>
                                                    <textarea type="text" class="form-control redondeado" rows="1"
                                                        id="descriVersionAp" name="descriVersionAp" readonly></textarea>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Descripción de la Aprobación</h5>
                                                    <textarea type="text" class="form-control redondeado" rows="2"
                                                        id="descriCambioApr" name="descriCambioApr" required></textarea>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <br>
                                                    <a type="button" class="btn btn-primary form-control" href=""
                                                        target="_blank" name="fileDocumentoDesAp" id="fileDocumentoDesAp"><i
                                                            class="fas fa-download"></i>Descargar Documento</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="btnAprobacionTarea"
                                                name="btnAprobacionTarea" data-bs-dismiss="modal"> <i
                                                    class="fas fa-plus"></i>Aprobar Documento</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"> <i
                                                    class="fas fa-undo"></i> Volver</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-target="#modall" data-bs-toggle="modal"
                                                data-bs-dismiss="modal"><i class="fas fa-times-circle"></i>Devolver
                                                Tarea</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para devolver tarea-->
                        <div class="modal fade" id="modall" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Devolver Tarea</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" method="POST" id="tareaDevolucionApr">
                                        <div class="modal-body">
                                        <input type="number" name="id_tareaDEvAp" id="id_tareaDEvAp" hidden >
                                            <input type="number" name="numIdVerDevolApr" id="numIdVerDevolApr" hidden>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5>Descripción de la Devolución</h5>
                                                <textarea type="text" class="form-control redondeado" rows="1"
                                                    id="descriDevoluApro" name="descriDevoluApro"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-dismiss="modal" id="btnDevolverTareaApr" name="btnDevolverTareaApr"><i
                                                class="fas fa-times-circle"></i>Devolver Tarea</button>
                                        <button type="button" class="btn btn-secondary" data-bs-target="#modaltareaApr"
                                            data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fas fa-undo"></i>
                                            Volver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "footer.frm.php" ?>

    <script src="../js/empleado/tareas.js"></script>

</body>

</html>