function modificarRol(id_rol, rol) {
    $("#numidRolMod").val(id_rol);
    $("#txtRolMod").val(rol);
};

function estadoRol(id_rol, rol) {
    $("#numidRolElim").val(id_rol);
    $("#txtRolElim").val(rol);
};

function modificarCargo(id_cargo, cargo, manual_funciones) {
    $("#numidCargoMod").val(id_cargo);
    $("#txtCargoMod").val(cargo);
    $("#txtCargoModAnt").val(cargo);
    $("#txtManualModAnt").val(manual_funciones);
};

function estadoCargo(id_cargo, cargo) {
    $("#numidCargoElim").val(id_cargo);
    $("#txtCargoElim").val(cargo);
};

function actualiarClaveUsuario(id_cargo, nombre_completo, correo_empleado,usuario) {
    $("#numIdUsurioMoClave").val(id_cargo);
    $("#NombreMoClave").val(nombre_completo);
    $("#CorreoUsurioMoClave").val(correo_empleado);
    $("#UsurioMoClave").val(usuario);
};

function modUsuario(id_usuario, nombre_completo, correo_empleado, id_rol, rol, id_cargo, cargo) {
    $("#numIdUsuMod").val(id_usuario);
    $("#txtNombreMod").val(nombre_completo);
    $("#txtCorreoMod").val(correo_empleado);
    $("#idRolActuUsuAnt").val(id_rol);
    $("#rolActuUsuAnt").val(rol);
    $("#idCargoActuUsuAnt").val(id_cargo);
    $("#cargoActuUsuAnt").val(cargo);
};

function estadoUsuario(id_usuario, estado) {
    $("#numidUsuElim").val(id_usuario);
    $("#estadoUsuActu").val(estado);
};

$(document).ready(function () {
    buscarRol();
    buscarCargo();
    buscarRolUsuario();
    buscarCargoUsuario();
    buscarRolUsuarioAct();
    buscarCargoUsuarioAct();
    buscarUsuarios();

    /// MOSTRAR ROL ///
    function buscarRol() {
        $.ajax({
            url: '../controladorAdministrador/rol/rol.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
            * Se crea la tabla para mostrar los datos consultados
            */
            var datos = '';
            datos += "<table id='tablaRol'  class='table  table-striped table-bordered table-responsive '  >";
            datos += '<thead >';
                datos += '<tr class="table-light border-primary ">';
                    datos += '<th  class="text-center align-middle border border-primary ">ROL</th>';
                    datos += '<th  class="text-center align-middle border border-primary ">ACTUALIZAR ROL</th>';
                    datos += '<th  class="text-center align-middle border border-primary ">ESTADO ROL</th>';
                    datos += '<th  class="text-center align-middle border border-primary ">CAMBIAR ESTADO</th>';
                datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
                $.each(json, function (key, value) {
                    datos += '<tr class="align-middle" >';
                        datos += '<td class=" border border-primary text-wrap align-middle">' + value.rol + '</td>';
                        datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="modificarRol(' + value.id_rol + ',\'' + value.rol + '\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-edit"></i></button></td>';
                        datos += '<td class=" border border-primary text-center align-middle">' + value.estado + '</td>';
                        datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="estadoRol(' + value.id_rol + ',\'' + value.rol + '\')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fas fa-times"></i></button></td>';
                    datos += '</tr>';
                });
            datos += '</tbody>';
            datos += '</table>';
            $('#roles').html(datos);
            $('#tablaRol').DataTable({
                "destroy": true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info": true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength": 20,
                "language": { "url": "../componente/libreria/idioma/es-mx.json" },
                dom: 'Bfrtip',
                searchBuilder: true,
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Roles',
                        titleAttr: 'Roles',
                        messageTop: 'Roles',
                        text: '<i class="far fa-file-pdf"></i>',
                        exportOptions: {
                            columns: [0, 2]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Roles',
                        titleAttr: 'Roles',
                        messageTop: 'Roles',
                        text: '<i class="fas fa-print"></i>',
                        exportOptions: {
                            columns: [0, 2]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        autoFiltre: true,
                        title: 'Roles',
                        exportOptions: {
                            columns: [0, 2]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy"></i>',
                        autoFiltre: true,
                        titleAttr: 'COPIAR',
                        exportOptions: {
                            columns: [0, 2]
                        }
                    },
                    {
                        extend: 'searchBuilder',
                        config: {
                            depthLimit: 2,
                            columns: [0],
                            conditions: {
                                string: {
                                    '!=': null,
                                    '!null': null,
                                    'null': null,
                                    'contains': null,
                                    '!contains': null,
                                    'ends': null,
                                    '!ends': null,
                                    'starts': null,
                                    '!starts ': null
                                }
                            }
                        } 
                    }
                ],

            });
        }).fail(function (xhr, status, error) {
            $('#roles').html(error);
        });
    };

    /// REGISTRAR ROL ///
    $(document).on('click', '#btnRegistrarRol', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/rol/rol.create.php',
            type: 'POST',
            dataType: 'json',
            data: $('#rol').serialize(),
        }).done(function (json) {
            if(json !== null){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al rol ya existe',
                });
            }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Rol creado con éxito',
                    showConfirmButton: false,
                    timer: 2500
                }).then((result) => {
                    window.location.reload();
                });
            }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al crear el rol',
            });
        });
    });

    /// MODIFICAR rol///
    $(document).on('click', '#btnModificarRol', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/rol/rol.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#ModificarRol').serialize(),
        }).done(function (json) {
            if(json !== null){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al rol ya existe',
                });
            }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Rol Actualizado Con Éxito',
                    showConfirmButton: false,
                    timer: 2500
                }).then((result) => {
                    window.location.reload();
                });
            };
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al modificar el rol',
            });
        });
    });

    /// CAMBIO DE ESTADO rol///
    $(document).on('click', '#btnEliminarRol', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/rol/rol.delete.php',
            type: 'POST',
            dataType: 'json',
            data: $('#inactivarRol').serialize(),
        }).done(function (json) {
            if(json !== null){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar el rol',
                });
            }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Estado actualizado con éxito',
                    showConfirmButton: false,
                    timer: 2500
                }).then((result) => {
                    window.location.reload();
                });
            };
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al actualizar el rol',
            });
        });
    });

    /// MOSTRAR CARGO ///
    function buscarCargo() {
        $.ajax({
            url: '../controladorAdministrador/cargo/cargo.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var datos = '';
            datos += '<table id="tablaCargos"  class="table  table-striped table-bordered table-responsive"  >';
                datos += '<thead>';
                    datos += '<tr class="table-light border-primary ">';
                        datos += '<th  class="text-wrap align-middle border border-primary ">CARGO</th>';
                        datos += '<th  class="text-wrap align-middle border border-primary " >MANUAL DE FUNCIONES</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">ACTUALIZAR CARGO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">ESTADO CARGO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">CAMBIAR ESTADO</th>';
                    datos += '</tr>';
                datos += '</thead>';
                datos += '<tbody>';
                $.each(json, function (key, value) {
                    datos += '<tr class="align-middle" >';
                        datos += '<td class=" border border-primary text-wrap align-middle">' + value.cargo + '</td>';
                        datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/cargos/' +value.cargo+ '/' +value.manual_funciones+ '"><i class="fas fa-download"></i></a></td>';
                        datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="modificarCargo(' + value.id_cargo + ',\'' + value.cargo + '\',\'' + value.manual_funciones + '\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modCargo"><i class="far fa-edit"></i></button></td>';
                        datos += '<td class=" border border-primary text-center align-middle">' + value.estado + '</td>';
                        datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="estadoCargo(' + value.id_cargo + ',\'' + value.cargo + '\')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#estadoCargo"><i class="fas fa-times"></i></button></td>';
                    datos += '</tr>';
                })
                datos += '</tbody>';
            datos += '</table>';
            $('#cargos').html(datos);
            $('#tablaCargos').DataTable({
                "destroy": true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info": true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength": 20,
                "language": { "url": "../componente/libreria/idioma/es-mx.json" },
                
                dom: 'Bfrtip',
                searchBuilder: true,
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Cargos',
                        titleAttr: 'Cargos',
                        messageTop: 'Cargos',
                        text: '<i class="far fa-file-pdf"></i>',
                        exportOptions: {
                            columns: [0,3]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Cargos',
                        titleAttr: 'Cargos',
                        messageTop: 'Cargos',
                        text: '<i class="fas fa-print"></i>',
                        exportOptions: {
                            columns: [0, 3]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        autoFiltre: true,
                        title: 'Cargos',
                        exportOptions: {
                            columns: [0, 3]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy"></i>',
                        autoFiltre: true,
                        titleAttr: 'COPIAR',
                        exportOptions: {
                            columns: [0, 3]
                        }
                    },
                    {
                        extend: 'searchBuilder',
                        config: {
                            depthLimit: 2,
                            columns: [0],
                            conditions: {
                                string: {
                                    '!=': null,
                                    '!null': null,
                                    'null': null,
                                    'contains': null,
                                    '!contains': null,
                                    'ends': null,
                                    '!ends': null,
                                    'starts': null,
                                    '!starts ': null
                                }
                            }
                        } 

                    }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#cargos').html(status);
        });
    };

    /// CAMBIO DE ESTADO ROL///
    $(document).on('click', '#btnEliminarCargo', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/cargo/cargo.delete.php',
            type: 'POST',
            dataType: 'json',
            data: $('#inactivarCargo').serialize(),
        }).done(function (json) {
            if(json !== null){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar el cargo',
                });
            }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Estado actualizado con éxito',
                    showConfirmButton: false,
                    timer: 2500
                }).then((result) => {
                    window.location.reload();
                });
            }
        }).fail(function (xhr, status, error) {
            alert(error);
        })
    })

    /// MOSTRAR ROL PARA CREAR USUARIO ///
    function buscarRolUsuario() {
        $.ajax({
            url: '../controladorAdministrador/rol/rol.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var prioridad = 0;
            prioridad += '<option disabled selected> - Seleccione una Rol -</option>';
            $.each(json, function (key, value) {
                if (value.estado == "ACTIVO") {
                    prioridad += '<option value=' + value.id_rol + '>' + value.rol + '</option>';
                }
            })
            $('#rolesUsuario').html(prioridad);
        }).fail(function (xhr, status, error) {
            $('#rolesUsuario').html(error);
        })
    }

    /// MOSTRAR CARGO PARA CREAR USUARIO///
    function buscarCargoUsuario() {
        $.ajax({
            url: '../controladorAdministrador/cargo/cargo.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var cargos = 0;
            cargos += '<option disabled selected> - Seleccione un Cargo -</option>';
            $.each(json, function (key, value) {
                if (value.estado == "ACTIVO") {
                    cargos += '<option value=' + value.id_cargo + '>' + value.cargo + '</option>';
                }
            })
            $('#cargosUsuario').html(cargos);
        }).fail(function (xhr, status, error) {
            $('#cargosUsuario').html(status);
        })
    }

    /// CREAR USUARIO///
    $(document).on('click', '#btnRegistrarUsuario', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.create.php',
            type: 'POST',
            dataType: 'json',
            data: $('#usuario').serialize(),
        }).done(function (json) {
            if (json[0].proceso == "OK") {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario Creado Con Éxito',
                    showConfirmButton: false,
                    timer: 2500
                }).then((result) => {
                    window.location.href = "../administrador/usuarios.php";
                })

            } else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error al crear al usuario',
                });
            }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al crear al usuario',
            })
        })

    })

    /// ENVIAR EMAIL USUARIO///
    $(document).on('click', '#btnRegistrarUsuario', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.create.email.php',
            type: 'POST',
            dataType: 'json',
            data: $('#usuario').serialize(),
        }).done(function (json) {

        }).fail(function (xhr, status, error) {
            $('#respuesta').html(error);
        })
    })

    /// MOSTRAR LOS USUARIOS REGISTRADOS///
    function buscarUsuarios() {
        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
            * Se crea la tabla para mostrar los datos consultados
            */
            var datos = '';
            datos += "<table id='tablaUsuarios'   class='table  table-striped table-bordered table-responsive '  >";
            datos += '<thead >';
            datos += '<tr class="table-light border-primary ">';
            datos += '<th  class="text-center align-middle border border-primary ">NOMBRE EMPLEADO</th>';
            datos += '<th  class="text-center align-middle border border-primary " >CORREO EMPLEADO</th>';
            datos += '<th  class="text-center  align-middle border border-primary ">USUARIO</th>';
            datos += '<th  class="text-center  align-middle border border-primary ">CARGO</th>';
            datos += '<th  class="text-center  align-middle border border-primary ">ROL</th>';
            datos += '<th  class="text-center align-middle border border-primary "> RESTABLECER CONTRASEÑA</th>';
            datos += '<th  class="text-center  align-middle border border-primary ">ACTUALIZAR INFORMACIÓN</th>';
            datos += '<th  class="text-center  align-middle border border-primary ">ESTADO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">CAMBIAR ESTADO</th>';
            datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                datos += '<tr class="align-middle" >';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.nombre_completo + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.correo_empleado + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.usuario + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.cargo + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.rol + '</td>';
                    datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="actualiarClaveUsuario(' + value.id_usuario + ',\'' + value.nombre_completo + '\',\'' + value.correo_empleado + '\',\'' + value.usuario + '\')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modClaveUsuario"><i class="fas fa-lock-open"></i></button></td>';
                    datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="modUsuario(' + value.id_usuario + ',\'' + value.nombre_completo + '\',\'' + value.correo_empleado + '\',' + value.id_rol + ',\'' + value.rol + '\',' + value.id_cargo + ',\'' + value.cargo + '\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modUsuario    "><i class="far fa-edit"></i></button></td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.estado + '</td>';
                    datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="estadoUsuario(' + value.id_usuario + ',\'' + value.estado + '\')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#estadoUsuario"><i class="fas fa-times"></i></button></td>';
                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#usuarios').html(datos);
            $('#tablaUsuarios').DataTable({
                "destroy": true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info": true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength": 20,
                "language": { "url": "../componente/libreria/idioma/es-mx.json" },
                
                dom: 'Bfrtip',
                searchBuilder: true,
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Usuarios',
                        titleAttr: 'Usuarios',
                        messageTop: 'Usuarios',
                        text: '<i class="far fa-file-pdf"></i>',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 7]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Usuarios',
                        titleAttr: 'Usuarios',
                        messageTop: 'Usuarios',
                        text: '<i class="fas fa-print"></i>',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 7]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        autoFiltre: true,
                        title: 'Usuarios',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 7]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy"></i>',
                        autoFiltre: true,
                        titleAttr: 'COPIAR',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 7]
                        }
                    },
                    {
                        extend: 'searchBuilder',
                        config: {
                            depthLimit: 2,
                            columns: [0,1,2,3,4],
                            conditions: {
                                string: {
                                    '!=': null,
                                    '!null': null,
                                    'null': null,
                                    'contains': null,
                                    '!contains': null,
                                    'ends': null,
                                    '!ends': null,
                                    'starts': null,
                                    '!starts ': null
                                }
                            }
                        } 

                    }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#cargos').html(status);
        });
    }

    /// RESTABLECER CONTRASEÑA USUARIO///
    $(document).on('click', '#btnModClaveUsu', function (event) {   
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/clave/clave.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#modifClaveUsu').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Contraseña restablecida con éxito',
                showConfirmButton: false,
                timer: 2500
            }).then((result) => {
                window.location.reload();
            })
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al restablecer la contraseña',
                showConfirmButton: false,
                timer: 2500
            }).then((result) => {
                    window.location.reload();
                });
        })
    })

    /// ENVIAR EMAIL USUARIO RESTABLECER CONTRASEÑA///
    $(document).on('click', '#btnModClaveUsu', function (event) {
    event.preventDefault();
    $.ajax({
        url: '../controladorAdministrador/clave/clave.update.email.php',
        type: 'POST',
        dataType: 'json',
        data: $('#modifClaveUsu').serialize(),
    }).done(function (json) {

    }).fail(function (xhr, status, error) {
        $('#respuesta').html(error);
    })
    })

    /// MOSTRAR ROL PARA ACTUALIZAR USUARIO ///
    function buscarRolUsuarioAct() {
        $.ajax({
            url: '../controladorAdministrador/rol/rol.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var prioridad = 0;
            prioridad += '<option disabled selected> - Seleccione una Rol -</option>';
            $.each(json, function (key, value) {
                if (value.estado == "ACTIVO") {
                    prioridad += '<option value=' + value.id_rol + '>' + value.rol + '</option>';
                }
            })
            $('#rolesUsuarioAct').html(prioridad);
        }).fail(function (xhr, status, error) {
            $('#rolesUsuarioAct').html(error);
        })
    }

    /// MOSTRAR CARGO PARA ACTUALIZAR USUARIO///
    function buscarCargoUsuarioAct() {
        $.ajax({
            url: '../controladorAdministrador/cargo/cargo.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var cargos = 0;
            cargos += '<option disabled selected> - Seleccione un Cargo -</option>';
            $.each(json, function (key, value) {
                if (value.estado == "ACTIVO") {
                    cargos += '<option value=' + value.id_cargo + '>' + value.cargo + '</option>';
                }
            })
            $('#cargosUsuarioAct').html(cargos);
        }).fail(function (xhr, status, error) {
            $('#cargosUsuarioAct').html(status);
        })
    }

    /// MODIFICAR USUARIO///
    $(document).on('click', '#btnActualizarEmpl', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#actulizarUsuario').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Información del usuario actualizada con éxito',
                showConfirmButton: false,
                timer: 2500
            }).then((result) => {
                window.location.reload();
            });
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al actualizar la información del usuario',
           });
        })
    })

    /// CAMBIO DE ESTADO USUARIO///
    $(document).on('click', '#btnEliminarUsuario', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.delete.php',
            type: 'POST',
            dataType: 'json',
            data: $('#inactivarUsuario').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Estado Actualizado Con Éxito',
                showConfirmButton: false,
                timer: 2500
            }).then((result) => {
                window.location.reload();
            })
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al actualizar el estado del usuario',
           });
        })
    })

    /// MOSTRAR FORMULARIO PARA CREAR USUARIO///
    $(document).on('click','#btnFomularioCrear', function(){
        $("#btnFomularioCrear").prop("hidden", true);
        $("#usuario").prop("hidden", false);
        $("#usuariosRegistrados").prop("hidden", true);
        $("#volverRegistro").prop("hidden", false);
    })

    /// MOSTRAR USUARIOS REGISTRADOS///
    $(document).on('click','#volverRegistro', function(){
        $("#btnFomularioCrear").prop("hidden", false);
        $("#usuario").prop("hidden", true);
        $("#usuariosRegistrados").prop("hidden",false);
        $("#volverRegistro").prop("hidden", true);
    })

    /// MOSTRAR FORMULARIO PARA CREAR CARGO///
    $(document).on('click','#btnFomularioCargo', function(){
        $("#formCArgo").prop("hidden", false);
        $("#btnFomularioCargo").prop("hidden", true);
        $("#cargosRegistradoss").prop("hidden", true);
        $("#volverRegistroCargo").prop("hidden", false);
    })

    /// MOSTRAR CARGOS REGISTRADOS///
    $(document).on('click','#volverRegistroCargo', function(){
        $("#btnFomularioCargo").prop("hidden", false);
        $("#formCArgo").prop("hidden", true);
        $("#cargosRegistradoss").prop("hidden",false);
        $("#volverRegistroCargo").prop("hidden", true);
    })

    /// MOSTRAR FORMULARIO PARA CREAR ROL///
    $(document).on('click','#btnFomularioRol', function(){
        $("#rol").prop("hidden", false);
        $("#btnFomularioRol").prop("hidden", true);
        $("#rolesRegistrados").prop("hidden", true);
        $("#volverRegistroRol").prop("hidden", false);
    })

    /// MOSTRAR ROLES REGISTRADOS///
    $(document).on('click','#volverRegistroRol', function(){
        $("#btnFomularioRol").prop("hidden", false);
        $("#rol").prop("hidden", true);
        $("#rolesRegistrados").prop("hidden",false);
        $("#volverRegistroRol").prop("hidden", true);
    })

})

