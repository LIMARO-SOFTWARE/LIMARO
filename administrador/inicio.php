<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Inicio</title>
</head>
<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-empresa-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-empresa" type="button" role="tab" aria-controls="nav-empresa"
                        aria-selected="false">Empresa</button>
                    <button class="nav-link " id="nav-inicio-tab" data-bs-toggle="tab" data-bs-target="#nav-inicio"
                        type="button" role="tab" aria-controls="nav-inicio" aria-selected="true">Misión - Visión</button>
                    <button class="nav-link " id="nav-politica-tab" data-bs-toggle="tab" data-bs-target="#nav-politica"
                        type="button" role="tab" aria-controls="nav-politica" aria-selected="true">Política de Calidad</button>
                    <button class="nav-link " id="nav-organigrama-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-organigrama" type="button" role="tab" aria-controls="nav-organigrama"
                        aria-selected="false">Organigrama</button>
                    <button class="nav-link " id="nav-mapa-tab" data-bs-toggle="tab" data-bs-target="#nav-mapa"
                        type="button" role="tab" aria-controls="nav-mapa" aria-selected="false">Mapa de
                        Procesos</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-empresa" role="tabpanel"
                    aria-labelledby="nav-empresa-tab">
                    <br>
                    <div class="row  ">
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b>Nombre de la Empresa</b></h5>
                                    <h5 class="card-text" id="empresa"></h5>
                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b>Logo de la Empresa</b></h5>

                                </div>
                                <h5 class="card-title text-center" id="btnModificarLogo"></h5>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar Informacion Empresa-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>Modificar Nombre de la Empresa</b>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" id="ModificarEmpre" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaMod" name="numEmpresaMod"
                                            hidden>
                                        <h5 class="card-title"><b>Nombre Empresa</b></h5>
                                        <input type="text" class="card-text" id="txtempresaMod" name="txtempresaMod">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnModificarNomEmp" class="btn btn-primary"><i
                                                class="far fa-edit"></i> Modificar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar logo Empresa-->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>Modificar Logo de la Empresa</b>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" action="../controladorAdministrador/inicio/logo.update.php"
                                    method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaMod1" name="numEmpresaMod1"
                                            hidden>
                                        <h5 class="card-title "><b>Logo Empresa</b></h5>
                                        <input type="file" class="card-text" id="fileLogo" name="fileLogo"
                                            accept="image/png">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i>
                                            Modificar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-inicio" role="tabpanel" aria-labelledby="nav-inicio-tab">
                    <br>
                    <div class="row ">
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b>Misión</b></h5>
                                    <h5 class="card-text" id="mision"></h5>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b>Visión</b></h5>
                                    <h5 class="card-text" id="vision"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar Mision Empresa-->
                    <div class="modal fade" id="exampleModalmis" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>Modificar Misión de la Empresa</b>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" id="ModificarMision" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaModMis"
                                            name="numEmpresaModMis" hidden>
                                        <h5 class="card-title"><b>Misión de la Empresa</b></h5>
                                        <div class="text-wrap">
                                            <label  class="text-muted"> Caracteres restantes: <span></span></label>
                                            <textarea class="card-text form-group" id="txtMisionMod" name="txtMisionMod" maxlength="600"
                                                style="width:450px; height:100px; "></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnModificarMisionEmp" class="btn btn-primary"><i
                                                class="far fa-edit"></i> Modificar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar Vision Empresa-->
                    <div class="modal fade" id="exampleModalVis" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>Modificar Visión de la Empresa</b>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" id="ModificarVision" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaModvis"
                                            name="numEmpresaModvis" hidden>
                                        <h5 class="card-title"><b>Visión de la Empresa</b></h5>
                                        <label  class="text-muted"> Caracteres restantes: <span></span></label>
                                        <textarea class="card-text form-group" id="txtVisiomMod" name="txtVisiomMod" maxlength="600"
                                            style="width:450px; height:100px; "></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnModificarvisionEmp" class="btn btn-primary"><i
                                                class="far fa-edit"></i> Modificar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-politica" role="tabpanel" aria-labelledby="nav-politica-tab">
                    <br>
                    <div class="row  ">
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b>Política de Calidad</b></h5>
                                    <h5 class="card-text" id="politica"></h5>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b>Objetivo de Calidad</b></h5>
                                    <h5 class="card-text" id="objetivo"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar Politca calidad Empresa-->
                    <div class="modal fade" id="exampleModalPol" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>Modificar Política de Calidad de
                                            la Empresa</b></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" id="ModificarPolitica" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaModPol"
                                            name="numEmpresaModPol" hidden>
                                        <h5 class="card-title"><b>Política Calidad de la Empresa</b></h5>
                                        <div class="text-wrap">
                                            <label  class="text-muted"> Caracteres restantes: <span></span></label>
                                            <textarea class="card-text form-group" id="txtPoliMod" name="txtPoliMod"  maxlength="800"
                                                style="width:450px; height:100px; "></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnModificarPoliEmp" class="btn btn-primary"><i
                                                class="far fa-edit"></i> Modificar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar objetivos calidad Empresa-->
                    <div class="modal fade" id="exampleModalObj" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>Modificar Objetivo de Calidad de la
                                        Empresa</b></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" id="ModificarObjetivo" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaModObj"
                                            name="numEmpresaModObj" hidden>
                                        <h5 class="card-title"><b>Objetivo de Calidad</b></h5>
                                        <label  class="text-muted"> Caracteres restantes: <span></span></label>
                                        <textarea class="card-text form-group" id="txtObjMod" name="txtObjMod"  maxlength="800"
                                            style="width:450px; height:100px; "></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnModificarObjetivoEmp" class="btn btn-primary"><i
                                                class="far fa-edit"></i> Modificar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-organigrama" role="tabpanel" aria-labelledby="nav-organigrama-tab">
                    <br>
                    <div class="row  ">
                        <div class="col-md-3 col-xs-12 col-sm-12">
                        </div>
                        <div div class="col-md-6 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b>Organigrama</b></h5>
                                </div>
                                <h5 class="card-title text-center" id="btnModificarOrganigrama"></h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                        </div>
                    </div>
                    <!-- Modal Modificar organigrama Empresa-->
                    <div class="modal fade" id="exampleModalorganigrama" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>Modificar Organigrama de la Empresa</b></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group"
                                    action="../controladorAdministrador/inicio/organigrama.update.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaOrganigrama"
                                            name="numEmpresaOrganigrama" hidden>
                                        <h5 class="card-title"><b>Organigrama Empresa</b></h5>
                                        <input type="file" class="card-text" id="fileOrg" name="fileOrg"
                                            accept="image/*">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i>
                                            Modificar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-mapa" role="tabpanel" aria-labelledby="nav-mapa-tab">
                    <br>
                    <div class="row  ">
                        <div class="col-md-3 col-xs-12 col-sm-12">
                        </div>
                        <div div class="col-md-6 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b>Mapa de Procesos</b></h5>
                                </div>
                                <h5 class="card-title text-center" id="btnModificarMapa"></h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                        </div>
                    </div>
                    <!-- Modal Modificar organigrama Empresa-->
                    <div class="modal fade" id="exampleModalmapaprocesos" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>Modificar Mapa de Procesos de la
                                        Empresa</b>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" action="../controladorAdministrador/inicio/mapa.update.php"
                                    method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaMapa"
                                            name="numEmpresaMapa" hidden>
                                        <h5 class="card-title"><b>Mapa de Procesos de la Empresa</b></h5>
                                        <input type="file" class="card-text" id="fileMap" name="fileMap"
                                            accept="image/*">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i>
                                            Modificar</button>
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
    </main>
    <?php include_once "footer.php" ?>
    <script src="../js/administrador/inicio.adm.js"></script>
</body>

</html>