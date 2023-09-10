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
                    <button class="nav-link active " id="nav-crear-tab" data-bs-toggle="tab" data-bs-target="#nav-crear"
                        type="button" role="tab" aria-controls="nav-crear" aria-selected="false">Creación De
                        Documento</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-crear" role="tabpanel" aria-labelledby="nav-crear-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h4 class="card-title text-center"><b>Creación De Documento</b></h4>
                            <br>
                            <form class="row g-3 form-group bordeado"
                                action="../controladorEmpleado/solicitudes.crearDoc.create.php" method="POST"
                                enctype="multipart/form-data">
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5><b>Prioridad*</b></h5>
                                    <select class="form-control redondeado" id="prioridad" name="prioridad" required>
                                        <option disabled selected> - Seleccione Un Tipo De Documento -</option>
                                        <option value="IMPORTANTE - URGENTE"> IMPORTANTE - URGENTE</option>
                                        <option value="IMPORTANTE - NO URGENTE"> IMPORTANTE - NO URGENTE</option>
                                        <option value="NO IMPORTANTE - URGENTE"> NO IMPORTANTE - URGENTE</option>
                                        <option value="NO IMPORTANTE - NO URGENTE"> NO IMPORTANTE - NO URGENTE</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5><b>Tipo de Documento*</b></h5>
                                    <select class="form-control redondeado" id="tipoDocumento" name="tipoDocumento"
                                        required></select>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <h5><b>Descripción*</b></h5>
                                    <label class="text-muted"> Caracteres restantes:
                                                        <span></span></label>
                                    <textarea type="text" class="form-control redondeado" rows="4" id="solicitud"
                                        name="solicitud" maxlength="600" required></textarea>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <h5><b>Subir Documento*</b></h5>
                                    <input type="file" class="form-control redondeado" id="fileSolicitud"
                                        name="fileSolicitud" multiple>
                                    <span class="text-muted">Si se agrega más de un archivo, anexarlos en carpeta
                                        comprimida .zip</span>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <span class="text-muted">* Campo Obligatorio</span>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12 align-items-center">
                                    <button type="submit" class="btn btn-primary "><i class="fas fa-plus"></i> Crear
                                        Solicitud</button>
                                    <button type="reset" class="btn btn-secondary"><i class="fas fa-broom"></i>
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
    <script src="../js/empleado/solicitudes.js"></script>
</body>


</html>