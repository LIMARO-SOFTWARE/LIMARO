<!-- Se agrega Head -->
<?php include_once "head.php" ?>
<title>Gestión de Usuarios</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav class="">
                <div class="nav nav-pills " id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-usuarios-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-usuarios" type="button" role="tab" aria-controls="nav-usuarios"
                        aria-selected="false">Usuarios</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <!-- Modulo para el manejo de usuarios-->
                <div class="tab-pane fade show active " id="nav-usuarios" role="tabpanel"
                    aria-labelledby="nav-usuarios-tab">
                    <div class="row ">
                        <!-- Formulario para la creacion de usuarios-->
                        <div class="col-md-12 col-xs-12 col-sm-12 ">
                            <h2 class="card-title text-center"><b>Usuarios</b></h2>
                            <button type="button" class="btn btn-primary " id="btnFomularioCrear"><i
                                    class="fas fa-plus"></i> Crear Usuario</button>
                            <button type="button" id="volverRegistro" class="btn btn-primary " hidden><i
                                    class="fas fa-eye"></i>
                                Ver usuarios Registrados</button>
                            <br>
                            <br>
                            <form class="row g-3 form-group needs-validation bordeado" id="usuario" method="POST"
                                hidden>
                                <h4 class="card-title text-center"><b>Crear Empleado</b></h4>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5><b>Nombre Completo Empleado*</b></h5>
                                    <input class="form-control inicialM" type="text" name="txtNombreEmpleado"
                                        id="txtNombreEmpleado" aria-label="E" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5><b>Correo Electrónico* </b></h5>
                                    <input type="email" class="form-control" name="txtCorreoEmpleado"
                                        id="txtCorreoEmpleado" placeholder="name@example.com"
                                        pattern="^[a-zA-Z0-9_.-]*$" title="Introduzca una direccion de correo valido"
                                        aria-label="E" aria-describedby="emailHelp" style="text-transform:lowercase;"
                                        required>
                                    <span id="emailOK"></span>
                                </div>
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h5><b>Cargo*</b></h5>
                                    <select class="form-control " id="cargosUsuario" name="cargosUsuario" aria-label="E"
                                        aria-describedby="basic-addon1" required></select>
                                </div>
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h5><b>Rol*</b></h5>
                                    <select class="form-control " id="rolesUsuario" name="rolesUsuario" aria-label="E"
                                        aria-describedby="basic-addon1" required></select>
                                </div>
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h5><b>Usuario*</b></h5>
                                    <input class="form-control" type="text" name="txtUsuario" id="txtUsuario"
                                        aria-label="E" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h5><b>Clave Inicial</b></h5>
                                    <input class="form-control" type="password" name="txtClaveInicial"
                                        id="txtClaveInicial" autocomplete="current-password" aria-label="E"
                                        aria-describedby="basic-addon1" value="12345" readonly required>
                                </div>
                                <span class="text-muted">* Campo Obligatorio</span>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary mb-3" id="btnRegistrarUsuario"><i
                                            class="fas fa-plus"></i> Crear</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <!--Fin Formulario para la creacion de usuarios-->
                        <!--Se muestras los usuario registrados-->
                        <div class="col-md-12 col-xs-12 col-sm-12 bordeado" id="usuariosRegistrados">
                            <br>
                            <h4 class="card-title text-center"><b>Usuarios Registrados</b></h4>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <br>
                                <h5 id="usuarios"></h5>
                            </div>
                        </div>
                        <!--Fin de los usuario registrados-->
                        <!-- Modal para actualizaciones clave usuario-->
                        <div class="modal fade bd-example-modal-lg" id="modClaveUsuario" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Restablecer Contraseña de
                                                Usuario</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="modifClaveUsu" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numIdUsurioMoClave"
                                                    id="numIdUsurioMoClave" hidden>
                                                <input class="form-control" type="text" name="UsurioMoClave"
                                                    id="UsurioMoClave" hidden>
                                                <input class="form-control" type="text" name="NombreMoClave"
                                                    id="NombreMoClave" hidden>
                                                <input class="form-control" type="text" name="CorreoUsurioMoClave"
                                                    id="CorreoUsurioMoClave" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5><b>Restablecer Contraseña</b></h5>
                                                    <input class="form-control" type="password" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1" value="12345" hidden>
                                                    <span class="">Se generará una nueva contraseña automática y será
                                                        notificada al correo registrado </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnModClaveUsu" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Restablecer</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Fin para actualizaciones clave usuario-->
                        <!-- Modal para actualizaciones sobre Usuario-->
                        <div class="modal fade bd-example-modal-xl" id="modUsuario" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Actualizar Información del
                                                Usuario</b></h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="actulizarUsuario" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numIdUsuMod"
                                                    id="numIdUsuMod" hidden>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Nombre Empleado</b></h5>
                                                    <input class="form-control inicialM " type="text"
                                                        name="txtNombreMod" id="txtNombreMod">
                                                    <br>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Correo Electrónico</b></h5>
                                                    <input class="form-control" type="text" name="txtCorreoMod"
                                                        id="txtCorreoMod"
                                                        onkeyup="javascript:this.value=this.value.toLowerCase();">
                                                    <span id="emailOKM"></span>
                                                    <br>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Cargo Actual</b></h5>
                                                    <input class="form-control" type="text" name="idCargoActuUsuAnt"
                                                        id="idCargoActuUsuAnt" aria-label="E"
                                                        aria-describedby="basic-addon1" hidden readonly>
                                                    <input class="form-control" type="text" name="cargoActuUsuAnt"
                                                        id="cargoActuUsuAnt" aria-label="E"
                                                        aria-describedby="basic-addon1" readonly>
                                                    <br>
                                                    <h5><b>Cargo Nuevo</b></h5>
                                                    <select class="form-control " id="cargosUsuarioAct"
                                                        name="cargosUsuarioAct" aria-label="E"
                                                        aria-describedby="basic-addon1"></select>
                                                    <br>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Rol Actual</b></h5>
                                                    <input class="form-control" type="text" name="idRolActuUsuAnt"
                                                        id="idRolActuUsuAnt" aria-label="E"
                                                        aria-describedby="basic-addon1" hidden readonly>
                                                    <input class="form-control" type="text" name="rolActuUsuAnt"
                                                        id="rolActuUsuAnt" aria-label="E"
                                                        aria-describedby="basic-addon1" readonly>
                                                    <br>
                                                    <h5><b>Rol Nuevo</b></h5>
                                                    <select class="form-control " id="rolesUsuarioAct"
                                                        name="rolesUsuarioAct" aria-label="E"
                                                        aria-describedby="basic-addon1"></select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnActualizarEmpl" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Modal para actualizaciones sobre Usuario-->
                        <!-- Modal para actualziacion de estado Cargo-->
                        <div class="modal fade bd-example-modal-lg" id="estadoUsuario" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Cambiar estado del usuario</b>
                                        </h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="inactivarUsuario" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidUsuElim"
                                                    id="numidUsuElim" hidden>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Estado actual del usuario</b></h5>
                                                    <input class="form-control" type="text" name="estadoUsuActu"
                                                        id="estadoUsuActu" aria-label="E"
                                                        aria-describedby="basic-addon1" readonly>
                                                    <br>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5><b>Nuevo estado del usuario</b></h5>
                                                    <select class="form-group select1" id="estadoModusuario"
                                                        name="estadoModusuario">
                                                        <option>- Seleccione el nuevo estado -</option>
                                                        <option value="ACTIVO">Activo</option>
                                                        <option value="INACTIVO">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEliminarUsuario" class="btn btn-primary"><i
                                                    class="fas fa-times"></i> Cambiar Estado</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Modal para actualziacion de estado Cargo-->
                    </div>
                </div>
                <!-- Fin Modulo para el manejo de usuarios-->
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>
    <script src="../js/administrador/usuario.adm.js"></script>
    <script>
    document.getElementById('txtCorreoMod').addEventListener('input', function(event) {
        campo = event.target;
        valido = document.getElementById('emailOKM');

        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            valido.innerText = "";
        } else {
            valido.innerText = "Formato invalido para correo electrónico";
        }
    });

    document.getElementById('txtCorreoEmpleado').addEventListener('input', function(event) {
        campo = event.target;
        valido = document.getElementById('emailOK');

        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            valido.innerText = "";
        } else {
            valido.innerText = "Formato invalido para correo electrónico";
        }
    });
    </script>

</body>

</html>