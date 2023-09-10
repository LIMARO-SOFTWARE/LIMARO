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
                <br>
                <div class="nav  nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-inicio-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-inicio" type="button" role="tab" aria-controls="nav-inicio"
                        aria-selected="false">Misión y Visión</button>
                    <button class="nav-link " id="nav-politica-tab" data-bs-toggle="tab" data-bs-target="#nav-politica"
                        type="button" role="tab" aria-controls="nav-politica" aria-selected="true">Política y Objetivos
                        de Calidad</button>
                    <button class="nav-link " id="nav-organigrama-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-organigrama" type="button" role="tab" aria-controls="nav-organigrama"
                        aria-selected="false">Organigrama</button>
                    <button class="nav-link " id="nav-mapaProcesos-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-mapaProcesos" type="button" role="tab" aria-controls="nav-mapaProcesos"
                        aria-selected="false">Mapa de Procesos</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-inicio" role="tabpanel"
                    aria-labelledby="nav-inicio-tab">
                    <br>
                    <div class="row  ">
                        <br>
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
                                    <img id="organigrama" class="rounded mx-auto d-block zoom" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-mapaProcesos" role="tabpanel" aria-labelledby="nav-mapaProcesos-tab">
                    <br>
                    <div class="row  ">
                        <div class="col-md-3 col-xs-12 col-sm-12">
                        </div>
                        <div div class="col-md-6 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b>Mapa de Procesos</b></h5>
                                    <img id="mapaProcesos" class="rounded mx-auto d-block zoom" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>
    <script src="../js/visitante/inicio.js"></script>
</body>

</html>