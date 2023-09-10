<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Inicio</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <br>
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-perfil"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Mi Perfil</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-perfil" role="tabpanel" aria-labelledby="nav-home-tab">
                    <br>
                    <div class="row ">
                        <div class="col-md-3 col-xs-12 col-sm-12">
                            <br>
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b>Foto de Perfil</b></h5>
                                    <img src="../documentos/usuarios/<?php $usuario= $_SESSION['usuario']; echo $usuario;?>/imagen/<?php $img_empleado= $_SESSION['img_empleado']; echo $img_empleado; ?>"
                                        class="card-img-top imgPerfil zoom2" alt="...">
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="" class="btn btn-primary text-center"
                                        data-bs-toggle="modal" data-bs-target="#modalImg">Modificar Imagen</button>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><b>Nombre Funcionario</b></h5>
                                    <p class="card-text"><?php $nombre= $_SESSION['nombre_completo']; echo $nombre; ?>
                                    </p>
                                    <h5 class="card-title"><b>Cargo</b></h5>
                                    <p class="card-text"><?php $cargo= $_SESSION['cargo']; echo $cargo; ?> </p>
                                    <h5 class="card-title"><b>Correo Electrónico</b></h5>
                                    <p class="card-text"><?php $correo= $_SESSION['correo_empleado']; echo $correo; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title"><b>Manual de Funciones</b></h5>
                                    <?php if ($_SESSION['manual_funciones'] != null): ?>
                                    <a class="btn btn-primary"
                                        href="../documentos/cargos/<?php $cargo= $_SESSION['cargo']; echo $cargo;?>/<?php $manual_funciones= $_SESSION['manual_funciones']; echo $manual_funciones;?>">Descargar
                                        Manual de Funciones <i class="fas fa-download"></i></a>
                                    <?php else: ?>
                                    <h5>No se ha cargado el manual de funciones</h5>
                                    <?php endif ?>
                                </div>
                                <br>
                            </div>
                        </div>
                        <!-- Modal para cambio de foto de perfil-->
                        <div class="modal fade bd-example-modal-lg" id="modalImg" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Cambiar Imagen de Perfil</b>
                                        </h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" action="../controladorEmpleado/imagen.update.php"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidTipDocElim"
                                                    id="numidTipDocElim" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Nueva Imagen</b></h5>
                                                    <input class="form-control file  redondeado" type="file"
                                                        name="fileImagenPerfilUs" id="fileImagenPerfilUs"
                                                        accept="image/*">
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i>
                                                Modificar</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
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

    <script src="../js/empleado/perfil.js"></script>
</body>

</html>