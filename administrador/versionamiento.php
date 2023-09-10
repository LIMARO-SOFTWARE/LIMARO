<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Versionamiento</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-creacion1-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-creacion1" type="button" role="tab" aria-controls="nav-creacion1"
                        aria-selected="true">Versionamiento</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-creacion1" role="tabpanel" aria-labelledby="nav-creacion-tab">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h2 class="card-title text-center"><b>Versionamiento de Documentos </b></h2>
                            <br>
                            <form class="row g-3 form-group" id="frmVersionamiento"
                                action="../controladorAdministrador/documento/versionamiento.create.php" method="POST"
                                enctype="multipart/form-data">
                                <div class="col-md-10 col-xs-12 col-sm-12">
                                    <input class="form-control" type="text" name="idDocumento1" id="idDocumento1"
                                        hidden>
                                    <h5 for="data"><b>Seleccionar Documento a Actualizar*</b></h5>
                                    <input class="form-control" type="text" name="documentoAuto1" id="documentoAuto1">
                                    <input class="form-control" type="text" name="documentoNam" id="documentoNam"
                                        hidden>
                                        <input class="form-control" type="text" name="macroproceso" id="macroproceso"
                                        hidden>
                                    <input class="form-control" type="text" name="proceso1" id="proceso1" hidden >
                                    <input class="form-control" type="text" name="tipo" id="tipo"hidden >
                                    <input class="form-control" type="text" name="codigo1" id="codigo1" hidden>
                                    <input class="form-control" type="text" name="documento" id="documento" hidden >

                                </div>
                                <div class="col-md-2 col-xs-12 col-sm-12">
                                    <h5><b>Versión Siguiente*</b></h5>
                                    <input class="form-control" type="text" name="versionAnt" id="versionAnt" hidden>
                                    <input class="form-control" type="text" name="versionSig1" id="versionSig1"
                                        readonly>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <h5><b>Descripción del Cambio*</b></h5>
                                    <textarea type="text" class="form-control redondeado" rows="2" id="descriCambio1"
                                        name="descriCambio1" required></textarea>
                                </div>
                                <div class="col-md-8 col-xs-12 col-sm-12">
                                    <h5><b>Elaborado por*</b></h5>
                                    <select class="form-control" id="usuarioCreacion" name="usuarioCreacion"
                                        aria-label="E" aria-describedby="basic-addon1" required></select>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5><b>Fecha Elaboración*</b></h5>
                                    <input class="form-control" type="date" name="fechaCreacion" id="fechaCreacion"
                                        onkeydown="return false"
                                        max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."- 1 day"));?>" required>
                                </div>
                                <div class="col-md-8 col-xs-12 col-sm-12">
                                    <h5><b>Revisado por*</b></h5>
                                    <select class="form-control" id="usuarioRevision" name="usuarioRevision"
                                        aria-label="E" aria-describedby="basic-addon1" required></select>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5><b>Fecha Revisión*</b></h5>
                                    <input class="form-control" type="date" name="fechaRevision" id="fechaRevision"
                                        onkeydown="return false"
                                        max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."- 1 day"));?>" required>
                                </div>
                                <div class="col-md-8 col-xs-12 col-sm-12">
                                    <h5><b>Aprobado por*</b></h5>
                                    <select class="form-control" id="usuarioAprobacion" name="usuarioAprobacion"
                                        aria-label="E" aria-describedby="basic-addon1" required></select>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5><b>Fecha Aprobación</b></h5>
                                    <input class="form-control" type="date" name="fechaAprobacion" id="fechaAprobacion"
                                        onkeydown="return false"
                                        max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."- 1 day"));?>" required>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <h5><b>Agregar Documento*</b></h5>
                                    <input class="form-control" type="file" name="fileDocumento" id="fileDocumento"
                                        required>
                                </div>
                                <span class="text-muted">* Campo Obligatorio</span>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <button class="btn btn-primary" id="btnVersionamiento" type="submit"><i class="fas fa-check"></i>Actualizar
                                        Versión</button>
                                    <button type="reset" id="limpiar" name="limpiar" class="btn btn-secondary"><i
                                            class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "footer.php" ?>
    <script src="../js/administrador/versionamiento.js"></script>
</body>

</html>