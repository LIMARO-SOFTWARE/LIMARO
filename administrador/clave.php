<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Perfil</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-perfil"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Contraseña</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-perfil" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row  justify-content-center">
                        <div class="col-md-6 col-xs-12 col-sm-12 ">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title text-center"><b>Actualizar Contraseña</b></h2>
                                    <form class="row g-3 form-group" id="modifClaveUsu" method="POST">
                                        <div class="modal-body">
                                            <div class="">
                                                <input class="form-control" type="number" name="numIdUsurioMoClave"
                                                    id="numIdUsurioMoClave" hidden>
                                                <div class="">
                                                    <h5><b>Nueva Contraseña</b></h5>
                                                    <input class="bg-light login" type="password"
                                                        name="txtNuevaClaveEmplA" id="txtNuevaClaveEmplA"
                                                        autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1"> 
                                                    <button id="show_password" class="btn btn-primary" type="button"
                                                        onclick="mostrarPassword2()"> <span
                                                            class="fa fa-eye-slash icons"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnModClavEmpl" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
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
<script src="../js/administrador/perfil.js"></script>
</body>


</html>