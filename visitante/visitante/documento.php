<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Documentos</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <br>
                <div class="nav  nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-matriz"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Listado Maestro de
                        Documentos Vigentes</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-matriz" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        <br>
                            <h2 class="card-title text-center"><b>Listado Maestro de Documentos Vigentes</b></h2>
                            <div class="bordeado">
                            <br>
                                <h5 id="consulta"></h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>
    <script src="../js/visitante/documento.js"></script>
</body>

</html>