function comentarios(id_solicitud) {
    $("#numIdSolicitud").val(id_solicitud);
    $("#numIdSolicitud1").val(id_solicitud);
}

function asignarFuncionario(id_solicitud, funcionario_asignado, fecha_asignacion) {
    $("#numIdSolicitud2").val(id_solicitud);
    $("#funcionarioAsignado").val(funcionario_asignado);
    $("#fecha").val(fecha_asignacion);
}

function comentario (codigo){
    $("#numIdSolicitud").val(codigo);
}

function comentarioAsig (id_solicitud){
    $("#numIdSolicitud").val(id_solicitud);
    $("#numIdSolicitud1").val(id_solicitud);
}

function comentarioDesa (id_solicitud){
    $("#numIdSolicitud").val(id_solicitud);
    $("#numIdSolicitud1").val(id_solicitud);
}

function actualizacion (codigo, tipo_documento,id_tipo_documento){
    $("#codigo").val(codigo);
    $("#tipoDoc1").val(tipo_documento);
    $("#idTipoDoc1").val(id_tipo_documento);
}

function eliminacion (codigo, tipo_documento,id_tipo_documento){
    $("#codigo2").val(codigo);
    $("#tipoDoc2").val(tipo_documento);
    $("#idTipoDoc2").val(id_tipo_documento);
}

var inputs = "textarea[maxlength]";
$(document).on('keyup', "[maxlength]", function (e) {
    var este = $(this),
    maxlength = este.attr('maxlength'),
    maxlengthint = parseInt(maxlength),
    textoActual = este.val(),
    currentCharacters = este.val().length;
    remainingCharacters = maxlengthint - currentCharacters,
    espan = este.prev('label').find('span');	

    // Detectamos si es IE9 y si hemos llegado al final, convertir el -1 en 0 - bug ie9 porq. no coge directamente el atributo 'maxlength' de HTML5
    if (document.addEventListener && !window.requestAnimationFrame) {
        if (remainingCharacters <= -1) {
            remainingCharacters = 0;            
        }
    }
    espan.html(remainingCharacters);
    if (!!maxlength) {
        var texto = este.val();	
        if (texto.length >= maxlength) {
            este.removeClass().addClass("borderojo");
            e.preventDefault();
        }
        else if (texto.length < maxlength) {
            este.removeClass().addClass("bordegris");
        }	
    }	
});

$(document).ready(function () {

    buscar1();
    
    buscarFuncionarios();
    buscar();
    buscarTipoDocumento();   
    actualizarDocumentos();
    eliminarDocumentos();
    solicitudesAsignadas();
    solicitudesDesarrollo();
    solicitudesFinalizadas();
    // correoFuncionario();
    
 /// todas las solicitudes radicadas///
    function buscar1() {
        $.ajax({
            url: '../controladorAdministrador/solicitud/solicitudes.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var datos = '';
            datos += "<table id='tableSolicitudesRea'   class='table  table-striped table-bordered table-responsive'>";
            datos += '<thead >';
                datos += '<tr class="table-light border-primary text-center align-middle ">';
                    datos += '<th  class="border border-primary text-center align-middle ">NÚMERO DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-wrap align-middle ">PRIORIDAD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO  DOCUMENTO </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">CREADO POR: </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DOCUMENTO SOPORTE </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">ASIGNAR FUNCIONARIO ENCARGADO</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">COMENTARIOS</th>';
                datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                datos += '<tr class="align-middle" >';
                    datos += '<td class=" border border-primary text-wrap align-middle" id="numIdSolicitud">' + value.id_solicitud + ' </td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.fecha_solicitud + '</td>';
                    datos += '<td class=" border border-primary text-wrap">' + value.prioridad + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.tipo_solicitud + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.tipo_documento + '</td>';
                    if(value.codigo_documento == '0000'){
                        datos += '<td class=" border border-primary text-wrap align-middle">No Aplica</td>';
                    }else{
                        datos += '<td class=" border border-primary text-wrap align-middle">' + value.codigo_documento + '</td>';
                    }
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.usuario + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.solicitud + '</td>';
                    if (value.documento == "") {
                        datos += '<td class=" border border-primary text-wrap align-middle">Sin Documento Soporte</td>';
                    } else {
                        datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/usuarios/' + value.usuario + '/solicitudes/' + value.ruta  + '/' + value.documento + '">'+value.documento+'   <i class="fas fa-download"></i></a></td>';
                    }
                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="bntAsignarFuncionario" onclick="asignarFuncionario(' + value.id_solicitud + ',\'' + value.funcionario_asignado + '\',\'' + value.fecha_asignacion + '\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#asignarFuncionarioSol"><i class="fas fa-user-check"></i> ASIGNAR</button></td>';
                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarios(' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                datos += '</tr>';
            });
            datos += '</tbody>';
            datos += '</table>';
            $('#solicitudesAdmn').html(datos);
            $('#tableSolicitudesRea').DataTable({
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
                order: [[2, 'asc'],[4, 'asc'],[3, 'asc']],
                rowGroup: {
                    dataSrc: [[2]]
                },
                dom: 'Bflrtip',
                buttons:
                    [
                        // {
                        //     extend: 'pdfHtml5',
                        //     orientation: 'landscape',
                        //     pageSize: 'A4',
                        //     download: 'open',
                        //     title: 'Solicitudes Registradas',
                        //     titleAttr: 'Solicitudes Registradas',
                        //     messageTop: 'Solicitudes Registradas',
                        //     text: '<i class="far fa-file-pdf"></i>',
                        //     exportOptions: {
                        //         columns: [0, 1, 2, 3, 4,  6, 7, 8]
                        //     }
                        // },
                        // {
                        //     extend: 'print',
                        //     title: 'Solicitudes Registradas',
                        //     titleAttr: 'Solicitudes Registradas',
                        //     messageTop: 'Solicitudes Registradas',
                        //     text: '<i class="fas fa-print"></i>',
                        //     exportOptions: {
                        //         columns: [0, 1, 2, 3, 4,  6, 7, 8]
                        //     }
                        // },
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fas fa-file-excel"></i>',
                            sheetName: 'Solicitudes Registradas',
                            title: 'Solicitudes Registradas',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4,  6, 7, 8]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                            titleAttr: 'COPIAR',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4,  6, 7, 8]
                            }
                        },
                        {
                            extend: 'searchBuilder',
                            config: {
                                columns: [0,1,2,3,4,5,6],
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
                                    },
                                    num: {
                                        '!=': null,
                                        '!null': null,
                                        '<': null,
                                        '<=': null,
                                        '>': null,
                                        '>=': null,
                                        'null': null,
                                        'between': null,
                                        '!between': null
                                    },
                                    date: {
                                        '!=': null,
                                        '!null': null,
                                        '<': null,
                                        '<=': null,
                                        '>': null,
                                        '>=': null,
                                        'null': null,
                                        'between': null,
                                        '!between': null
                                    }
                                } 
                            }
                        }
                    ]
            });
        }).fail(function (xhr, status, error) {
            $('#solicitudesAdmn').html(error);
        });
    }

    $(document).on('click', '#btnVerComentarios', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/solicitud/solicitudes.comentarios.read.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar').serialize(),
        }).done(function (json) {
            var comentarios = '';
            if (json === 0) {
                comentarios += "<h5>Aun no hay comentarios</h5>";
            } else {
                // datos += '<form action="" class="form-group" id="buscar">';
                comentarios += "<table id='tableComentarios'  class='table  table-striped table-bordered table-responsive'>";
                comentarios += '<thead >';
                comentarios += '<tr class="table-light border-primary ">';
                comentarios += '<th  class="text-center align-middle border border-primary ">FECHA COMENTARIO</th>';
                comentarios += '<th  class="text-center align-middle border border-primary ">USUARIO</th>';
                comentarios += '<th  class="text-center align-middle border border-primary ">COMENTARIO</th>';
                comentarios += '</tr>';
                comentarios += '</thead>';
                comentarios += '<tbody>';
                $.each(json, function (key, value) {
                    comentarios += '<tr class="align-middle" >';
                    comentarios += '<td class=" border border-primary text-wrap" id="numIdSolicitud">' + value.fecha_comentario + ' </td>';
                    comentarios += '<td class=" border border-primary  text-wrap align-middle">' + value.usuario_comentario + '</td>';
                    comentarios += '<td class=" border border-primary  text-wrap align-middle">' + value.comentario + '</td>';
                    comentarios += '</tr>';
                });
                comentarios += '</tbody>';
                comentarios += '</table>';
            }
            $('#comentarios').html(comentarios);
            $('#tableComentarios').DataTable({
                "destroy": true,
                "autoWidth": true,
                "responsive": true,
                "searching": false,
                "info": true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "fixedColumns": true,
                "fixedHeader": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength": 20,
                "language": { "url": "../componente/libreria/idioma/es-mx.json" },
                
                // dom: 'Bfrtip',
                // buttons:
                //     [
                //         {
                //             extend: 'pdfHtml5',
                //             orientation: 'landscape',
                //             pageSize: 'A4',
                //             download: 'open',
                //             title: 'Comentarios sobre la Solicitud',
                //             titleAttr: 'Comentarios sobre la Solicitud',
                //             messageTop: 'Comentarios sobre la Solicitud',
                //             text: '<i class="far fa-file-pdf"></i>',
                //             exportOptions: {
                //                 columns: [0, 1, 2,]
                //             }
                //         },
                //         {
                //             extend: 'print',
                //             title: 'Comentarios sobre la Solicitud',
                //             titleAttr: 'Comentarios sobre la Solicitud',
                //             messageTop: 'Comentarios sobre la Solicitud',
                //             text: '<i class="fas fa-print"></i>',
                //             exportOptions: {
                //                 columns: [0, 1, 2]
                //             }
                //         },
                //         {
                //             extend: 'excelHtml5',
                //             text: '<i class="fas fa-file-excel"></i>',
                //             autoFiltre: true,
                //             title: 'Comentarios sobre la Solicitud',
                //             exportOptions: {
                //                 columns: [0, 1, 2]
                //             }
                //         },
                //         {
                //             extend: 'copyHtml5',
                //             text: '<i class="fas fa-copy"></i>',
                //             autoFiltre: true,
                //             titleAttr: 'COPIAR',
                //             exportOptions: {
                //                 columns: [0, 1, 2]
                //             }
                //         }
                //     ]
            });
        }).fail(function (xhr, status, error) {
            $('#comentarios').html(error);
        });
    });

    function buscarFuncionarios() {

        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.read2.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var tipoDocumento = 0;
            tipoDocumento += '<option disabled selected> - Seleccione un funcionario-</option>';
            $.each(json, function (key, value) {
                tipoDocumento += '<option value=' + value.usuario + '>' + value.usuario + '</option>';
            });
            $('#empleado').html(tipoDocumento);
        }).fail(function (xhr, status, error) {
            $('#empleado').html(error);
        });
    }

    $(document).on('click', '#empleado', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.read3.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar2').serialize(),
        }).done(function (json) {
            var correo = "";
            $.each(json, function (key, value) {
                correo = value.correo_empleado;
            });
            $('#empleadoCorreo').val(correo);
            
        }).fail(function (xhr, status, error) {
            $('#empleadoCorreo').val(error);
        });
    });


    /// ASIGNAR COMENTARIO A LA SOLICITUD///
    $(document).on('click', '#btnCrearcomentario', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/solicitud/solicitudes.comentarios.create.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar1').serialize(),
        }).done(function (json) {
            if(json !== null){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al crear el comentario',
                });
            }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Comentario Creado con Exito',
                    showConfirmButton: true,
                    timer: 3000
                })
            }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al crear el comentario',
            });
        });
    });

       /// ASIGNAR COMENTARIO A LA SOLICITUD///
       $(document).on('click', '#btnCrearcomentarioAsig', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/solicitud/solicitudes.comentarios.create.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar1').serialize(),
        }).done(function (json) {
            if(json !== null){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al crear el comentario',
                });
            }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Comentario Creado con éxito',
                    showConfirmButton: true,
                    timer: 3000
                })
            }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al crear el comentario',
            });
        });
    });

    /// ASIGNAR COMENTARIO A LA SOLICITUD///
    $(document).on('click', '#btnCrearcomentarioDes', function (event) {
    event.preventDefault();
    $.ajax({
        url: '../controladorAdministrador/solicitud/solicitudes.comentarios.create.php',
        type: 'POST',
        dataType: 'json',
        data: $('#buscar1').serialize(),
    }).done(function (json) {
        if(json !== null){
            Swal.fire({
                icon: 'error',
                title: 'Error al crear el comentario',
            });
        }else{
            Swal.fire({
                icon: 'success',
                title: 'Comentario Creado con éxito',
                showConfirmButton: true,
                timer: 3000
            })
        }
    }).fail(function (xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Error al crear el comentario',
        });
    });
    });

    /// ASIGNAR FUNCIONARIO A LA SOLICITUD///
    $(document).on('click', '#btnAgregarFunc', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/solicitud/solicitudes.funcionario.create.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar2').serialize(),
        }).done(function (json) {
            if(json !== null){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al asignar al funcionario',
                });
            }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Funcionario asignado con éxito',
                    showConfirmButton: true,
                    timer: 3000
                }).then((result) => {
                    window.location.reload();
                });
            }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al asignar al funcionario',
            });
        })
    })

    /// ASIGNAR COMENTARIO DE CREACION FUNCIONARIO///
    $(document).on('click', '#btnAgregarFunc', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/solicitud/solicitudes.comentarios.funcionario.create.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar2').serialize(),
        }).done(function (json) {
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al crear el comentario',
            });
        })
    })

        /// ASIGNAR COMENTARIO DE CREACION FUNCIONARIO///
        $(document).on('click', '#btnAgregarFunc', function (event) {
            event.preventDefault();
            $.ajax({
                url: '../controladorAdministrador/solicitud/usuario.asignado.email.php',
                type: 'POST',
                dataType: 'json',
                data: $('#buscar2').serialize(),
            }).done(function (json) {

            }).fail(function (xhr, status, error) {
              
            })
        })
    

    function buscar(){
        $.ajax({
            url:'../controladorAdministrador/solicitud/solicitudes.read4.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
                datos += "<table id='tableSolicitudes' class='table  table-striped table-bordered table-responsive '  >"; 
                datos += '<thead >';
                        datos += '<tr class="table-light border-primary text-center align-middle ">';
                            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">PRIORIDAD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">ESTADO DE LA SOLICITUD</th>'; 
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO DE DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">ASIGNADO A</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">FECHA DE ASIGNACIÓN</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">COMENTARIOS</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap align-middle" id="numIdSolicitud">'+value.id_solicitud+' </td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_solicitud+'</td>'; 
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.prioridad+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.estado_solicitud+'</td>'; 
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_solicitud+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_documento+'</td>';
                                if(value.codigo_documento !== "0000"){
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.codigo_documento+'</td>';
                                }else{
                                    datos += '<td class=" border border-primary text-wrap align-middle">No aplica</td>';
                                }
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.solicitud+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.funcionario_asignado+'</td>';
                                if( value.fecha_asignacion !== null){
                                    datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_asignacion+'</td>';
                                }else{
                                    datos += '<td class=" border border-primary text-wrap align-middle">Sin Asignar</td>';
                                }
                                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentario('+value.id_solicitud+')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                            datos += '</tr>';
                        });
                    datos += '</tbody>';
                datos += '</table>';
            $('#solicitudes').html(datos);
            $('#tableSolicitudes').DataTable({
                "destroy" : true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info":     true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "fixedColumns": true,
                "fixedHeader": true,
                "keys": true,
                "deferRender": true,
                "lengthChange": true,
                "lengthMenu":	[[5, 10, 20, 25, 50, 100, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength":20,
                "language": {"url": "../componente/libreria/idioma/es-mx.json"},
                dom:  'Bflrtip',
                order: [[2,'asc'],[5,'asc'],[4,'asc']],
                    rowGroup: {
                        dataSrc: 2
                    },
                buttons: 
                [
                    // {
                    //     extend: 'pdfHtml5',
                    //     orientation: 'landscape',
                    //     pageSize: 'A4',
                    //     page: 'current',
                    //     download: 'open',
                    //     title: 'Mis Solicitudes',
                    //     titleAttr: 'Mis Solicitudes',
                    //     messageTop: 'Mis Solicitudes',
                    //     text : '<i class="far fa-file-pdf"></i>',
                    //     exportOptions : {
                    //         columns: [0,1,2,3,4,5,6,7]
                    //     }
                    // },
                    // {
                    //     extend: 'print',
                    //     title: 'Mis Solicitudes',
                    //     titleAttr: 'Mis Solicitudes',
                    //     messageTop: 'Mis Solicitudes',
                    //     text : '<i class="fas fa-print"></i>',
                    //     exportOptions : {
                    //         columns: [0,1,2,3,4,5,6,7]
                    //     }
                    // },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        sheetName: 'Mis Solicitudes Radicadas',
                        title: 'Mis Solicitudes Radicadas',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                       
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'searchBuilder',
                        config: {
                            
                            columns: [0,1,2,3,4,5],
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
                                },
                                num: {
                                    '!=': null,
                                    '!null': null,
                                    '<': null,
                                    '<=': null,
                                    '>': null,
                                    '>=': null,
                                    'null': null,
                                    'between': null,
                                    '!between': null
                                },
                                date: {
                                    '!=': null,
                                    '!null': null,
                                    '<': null,
                                    '<=': null,
                                    '>': null,
                                    '>=': null,
                                    'null': null,
                                    'between': null,
                                    '!between': null
                                }
                            }
                        } 
                    
                    }                      
                ]
            });
        }).fail(function(xhr, status, error){
            $('#solicitudes').html(error);
        });
    }

    function solicitudesAsignadas(){
        $.ajax({
            url:'../controladorAdministrador/solicitud/solicitudes.read2.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
                datos += "<table id='tablesolicitudesAsignadas' class='table  table-striped table-bordered table-responsive '  >"; 
                datos += '<thead >';
                        datos += '<tr class="table-light border-primary text-center align-middle ">';
                            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">PRIORIDAD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">ESTADO DE LA SOLICITUD</th>'; 
                            datos += '<th  class="border border-primary text-center align-middle ">ASIGNADO A</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO DE DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">FECHA DE ASIGNACIÓN</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">COMENTARIOS</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap align-middle" id="numIdSolicitud">'+value.id_solicitud+' </td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_solicitud+'</td>'; 
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.prioridad+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.estado_solicitud+'</td>'; 
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.funcionario_asignado+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_solicitud+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_documento+'</td>';
                                if(value.codigo_documento !== "0000"){
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.codigo_documento+'</td>';
                                }else{
                                    datos += '<td class=" border border-primary text-wrap align-middle">No aplica</td>';
                                }
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.solicitud+'</td>';
                                
                                if( value.fecha_asignacion !== null){
                                    datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_asignacion+'</td>';
                                }else{
                                    datos += '<td class=" border border-primary text-wrap align-middle">Sin Asignar</td>';
                                }
                                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioAsig('+value.id_solicitud+')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                            datos += '</tr>';
                        });
                    datos += '</tbody>';
                datos += '</table>';
            $('#solicitudesAsignadas').html(datos);
            $('#tablesolicitudesAsignadas').DataTable({
                "destroy" : true,
                "autoWidth": true,
                "responsive": true,
                "autoFiltre" : true ,
                "searching": true,
                "info":     true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "fixedColumns": true,
                "fixedHeader": true,
                "keys": true,
                "deferRender": true,
                "lengthChange": true,
                "lengthMenu":	[[5, 10, 20, 25, 50, 100, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength":20 ,
                "language": {"url": "../componente/libreria/idioma/es-mx.json"},
                dom:  'Bflrtip',
                order: [[2, 'asc'], [5, 'asc']],
                    rowGroup: {
                        dataSrc: 2
                    },
                buttons: 
                [
                    // {
                    //     extend: 'pdfHtml5',
                    //     orientation: 'landscape',
                    //     pageSize: 'A4',
                    //     download: 'open',
                    //     title: 'Mis Solicitudes',
                    //     titleAttr: 'Mis Solicitudes',
                    //     messageTop: 'Mis Solicitudes',
                    //     text : '<i class="far fa-file-pdf"></i>',
                    //     exportOptions : {
                    //         columns: [0,1,2,3,4,5,6,7]
                    //     }
                    // },
                    // {
                    //     extend: 'print',
                    //     title: 'Mis Solicitudes',
                    //     titleAttr: 'Mis Solicitudes',
                    //     messageTop: 'Mis Solicitudes',
                    //     text : '<i class="fas fa-print"></i>',
                    //     exportOptions : {
                    //         columns: [0,1,2,3,4,5,6,7]
                    //     }
                    // },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        sheetName: 'Solicitudes Asignadas',
                        title: 'Solicitudes Asignadas',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        titleAttr: 'COPIAR',
                        autoFilter: true,
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'searchBuilder',
                        config: {
                            
                            columns: [0,1,2,3,4,5,6,7,9],
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
                                },
                                num: {
                                    '!=': null,
                                    '!null': null,
                                    '<': null,
                                    '<=': null,
                                    '>': null,
                                    '>=': null,
                                    'null': null,
                                    'between': null,
                                    '!between': null
                                },
                                date: {
                                    '!=': null,
                                    '!null': null,
                                    '<': null,
                                    '<=': null,
                                    '>': null,
                                    '>=': null,
                                    'null': null,
                                    'between': null,
                                    '!between': null
                                }
                            }
                        } 
                    
                    }                      
                ]
            });
        }).fail(function(xhr, status, error){
            $('#solicitudesAsignadas').html(error);
        });
    }

    function solicitudesDesarrollo(){
        $.ajax({
            url:'../controladorAdministrador/solicitud/solicitudes.read5.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
                datos += "<table id='tablesolicitudesDesa' class='table  table-striped table-bordered table-responsive '  >"; 
                datos += '<thead >';
                        datos += '<tr class="table-light border-primary text-center align-middle ">';
                            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO SOLICITUD edward</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">PRIORIDAD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">ESTADO DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">ASIGNADO A</th>'; 
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO DE DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>'
                            datos += '<th  class="border border-primary text-center align-middle ">FECHA INICIO TAREA</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">COMENTARIOS</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap align-middle" id="numIdSolicitud">'+value.id_solicitud+' </td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_solicitud+'</td>'; 
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.prioridad+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.estado_solicitud+'</td>'; 
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.funcionario_asignado+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_solicitud+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_documento+'</td>';
                                if(value.codigo_documento !== "0000"){
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.codigo_documento+'</td>';
                                }else{
                                    datos += '<td class=" border border-primary text-wrap align-middle">No aplica</td>';
                                }
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.solicitud+'</td>';
                                
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_inicio_tarea+'</td>';
                                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioDesa('+value.id_solicitud+')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                            datos += '</tr>';
                        });
                    datos += '</tbody>';
                datos += '</table>';
            $('#solicitudesDesa').html(datos);
            $('#tablesolicitudesDesa').DataTable({
                "destroy" : true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info":     true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "fixedColumns": true,
                "fixedHeader": true,
                "keys": true,
                "deferRender": true,
                "lengthChange": true,
                "lengthMenu":	[[5, 10, 20, 25, 50, 100, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength":20,
                "language": {"url": "../componente/libreria/idioma/es-mx.json"},
                dom:  'Bflrtip',
                order: [[2, 'asc'], [5, 'asc']],
                    rowGroup: {
                        dataSrc: 2
                    },
                buttons: 
                [
                    // {
                    //     extend: 'pdfHtml5',
                    //     orientation: 'landscape',
                    //     pageSize: 'A4',
                    //     download: 'open',
                    //     title: 'Mis Solicitudes',
                    //     titleAttr: 'Mis Solicitudes',
                    //     messageTop: 'Mis Solicitudes',
                    //     text : '<i class="far fa-file-pdf"></i>',
                    //     exportOptions : {
                    //         columns: [0,1,2,3,4,5,6,7]
                    //     }
                    // },
                    // {
                    //     extend: 'print',
                    //     title: 'Mis Solicitudes',
                    //     titleAttr: 'Mis Solicitudes',
                    //     messageTop: 'Mis Solicitudes',
                    //     text : '<i class="fas fa-print"></i>',
                    //     exportOptions : {
                    //         columns: [0,1,2,3,4,5,6,7]
                    //     }
                    // },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        sheetName: 'Solicitudes En Desarrollo',
                        title: 'Solicitudes En Desarrollo',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'searchBuilder',
                        config: {
                            
                            columns: [0,1,2,3,4,5,6,7,9],
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
                                },
                                num: {
                                    '!=': null,
                                    '!null': null,
                                    '<': null,
                                    '<=': null,
                                    '>': null,
                                    '>=': null,
                                    'null': null,
                                    'between': null,
                                    '!between': null
                                },
                                date: {
                                    '!=': null,
                                    '!null': null,
                                    '<': null,
                                    '<=': null,
                                    '>': null,
                                    '>=': null,
                                    'null': null,
                                    'between': null,
                                    '!between': null
                                }
                            }
                        } 
                    
                    }                      
                ]
            });
        }).fail(function(xhr, status, error){
            $('#solicitudesDesa').html(error);
        });
    }

    function solicitudesFinalizadas(){
        $.ajax({
            url:'../controladorAdministrador/solicitud/solicitudes.read6.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
                datos += "<table id='tablesolicitudesFinal' class='table  table-striped table-bordered table-responsive '  >"; 
                datos += '<thead >';
                        datos += '<tr class="table-light border-primary text-center align-middle ">';
                            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">PRIORIDAD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">ESTADO DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">ASIGNADO A</th>'; 
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO DE DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>'
                            datos += '<th  class="border border-primary text-center align-middle ">FECHA TERMINACIÓN</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">COMENTARIOS</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap align-middle" id="numIdSolicitud">'+value.id_solicitud+' </td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_solicitud+'</td>'; 
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.prioridad+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.estado_solicitud+'</td>'; 
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.funcionario_asignado+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_solicitud+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_documento+'</td>';
                                if(value.codigo_documento !== "0000"){
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.codigo_documento+'</td>';
                                }else{
                                    datos += '<td class=" border border-primary text-wrap align-middle">No aplica</td>';
                                }
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.solicitud+'</td>';
                                
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_solucion+'</td>';
                                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioDesa('+value.id_solicitud+')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                            datos += '</tr>';
                        });
                    datos += '</tbody>';
                datos += '</table>';
            $('#solicitudesFinal').html(datos);
            $('#tablesolicitudesFinal').DataTable({
                "destroy" : true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info":     true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "fixedColumns": true,
                "fixedHeader": true,
                "keys": true,
                "deferRender": true,
                "lengthChange": true,
                "lengthMenu":	[[5, 10, 20, 25, 50, 100, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength":10,
                "language": {"url": "../componente/libreria/idioma/es-mx.json"},
                dom:  'Bflrtip',
                order: [[2, 'asc'], [5, 'asc']],
                    rowGroup: {
                        dataSrc: 2
                    },
                buttons: 
                [
                    // {
                    //     extend: 'pdfHtml5',
                    //     orientation: 'landscape',
                    //     pageSize: 'A4',
                    //     download: 'open',
                    //     title: 'Mis Solicitudes',
                    //     titleAttr: 'Mis Solicitudes',
                    //     messageTop: 'Mis Solicitudes',
                    //     text : '<i class="far fa-file-pdf"></i>',
                    //     exportOptions : {
                    //         columns: [0,1,2,3,4,5,6,7]
                    //     }
                    // },
                    // {
                    //     extend: 'print',
                    //     title: 'Mis Solicitudes',
                    //     titleAttr: 'Mis Solicitudes',
                    //     messageTop: 'Mis Solicitudes',
                    //     text : '<i class="fas fa-print"></i>',
                    //     exportOptions : {
                    //         columns: [0,1,2,3,4,5,6,7]
                    //     }
                    // },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        sheetName: 'Solicitudes Finalizadas',
                        title: 'Solicitudes Finalizadas',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'searchBuilder',
                        config: {
                            
                            columns: [0,1,2,3,4,5,6,7,9],
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
                                },
                                num: {
                                    '!=': null,
                                    '!null': null,
                                    '<': null,
                                    '<=': null,
                                    '>': null,
                                    '>=': null,
                                    'null': null,
                                    'between': null,
                                    '!between': null
                                },
                                date: {
                                    '!=': null,
                                    '!null': null,
                                    '<': null,
                                    '<=': null,
                                    '>': null,
                                    '>=': null,
                                    'null': null,
                                    'between': null,
                                    '!between': null
                                }
                            }
                        } 
                    
                    }                      
                ]
            });
        }).fail(function(xhr, status, error){
            $('#solicitudesFinal').html(error);
        });
    }

    $(document).on('click','#btnVerComentarios',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/solicitud/solicitudes.comentarios.read.php',
                type: 'POST',
                dataType: 'json',
                data : $('#buscar').serialize(),
            }).done(function(json){
                var comentarios = '';
                    if(json=== 0){ 
                        comentarios += "<h5>Aun no hay comentarios</h5>";
                    }else{
                    comentarios += "<table id='tableComentarios'   class='table  table-striped table-bordered table-responsive ' >"; 
                        comentarios += '<thead >';
                            comentarios += '<tr class="table-light border-primary ">';
                                comentarios += '<th  class="text-center align-middle border border-primary ">FECHA COMENTARIO</th>';
                                comentarios += '<th  class="text-center align-middle border border-primary ">USUARIO</th>';
                                comentarios += '<th  class="text-center align-middle border border-primary ">COMENTARIO</th>';
                            comentarios += '</tr>';
                        comentarios +=  '</thead>';
                    comentarios += '<tbody>';
                    $.each(json, function(key, value){
                    comentarios += '<tr class="align-middle" >';
                        comentarios += '<td class=" border border-primary text-wrap" id="numIdSolicitud">'+value.fecha_comentario+' </td>';
                        comentarios += '<td class=" border border-primary  text-wrap align-middle">'+value.usuario_comentario+'</td>';
                        comentarios += '<td class=" border border-primary  text-wrap align-middle">'+value.comentario+'</td>';
                    comentarios += '</tr>';
                    });
                    comentarios += '</tbody>';
                    comentarios += '</table>';
                    }
                    $('#comentarios').html(comentarios  );
                    $('#tableComentarios').DataTable({
                        "destroy" : true,
                        "autoWidth": true,
                        "responsive": true,
                        "searching": false,
                        "info":     true,
                        "ordering": true,
                        "colReorder": true,
                        "sZeroRecords": true,
                        "fixedColumns": true,
                        "fixedHeader": true,
                        "keys": true,
                        "deferRender": true,
                        "lengthMenu":	[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                        "iDisplayLength":5,
                        "language": {"url": "../componente/libreria/idioma/es-mx.json"},
                        // dom:  'Bfrtip',
                        // buttons: 
                        // [
                        //     {
                        //         extend: 'pdfHtml5',
                        //         orientation: 'landscape',
                        //         pageSize: 'A4',
                        //         download: 'open',
                                
                        //         title: 'Comentarios sobre la Solicitud',
                        //         titleAttr: 'Comentarios sobre la Solicitud',
                        //         messageTop: 'Comentarios sobre la Solicitud',
                        //         text : '<i class="far fa-file-pdf"></i>',
                        //         exportOptions : {
                        //             columns: [0,1,2,]
                        //         }
                        //     },
                        //     {
                        //         extend: 'print',
                        //         title: 'Comentarios sobre la Solicitud',
                        //         titleAttr: 'Comentarios sobre la Solicitud',
                        //         messageTop: 'Comentarios sobre la Solicitud',
                        //         text : '<i class="fas fa-print"></i>',
                        //         exportOptions : {
                        //             columns: [0,1,2]
                        //         }
                        //     },
                        //     {
                        //         extend: 'excelHtml5',
                        //         text : '<i class="fas fa-file-excel"></i>',
                                
                        //         title: 'Comentarios sobre la Solicitud',
                        //         exportOptions : {
                        //             columns: [0,1,2]
                        //         }
                        //     },
                        //     {
                        //         extend: 'copyHtml5',
                        //         text : '<i class="fas fa-copy"></i>',
                                
                        //         titleAttr: 'COPIAR',
                        //         exportOptions : {
                        //             columns: [0,1,2]
                        //         }
                        //     }                
                        // ]
                    }); 
                }).fail(function(xhr, status, error){
                        $('#comentarios').html(error); 
                });
                }
    );
   
    function buscarTipoDocumento() {

        $.ajax({
            url:'../controladorAdministrador/solicitud/solicitudes.tipoDocumento.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
            var tipoDocumento  =0;
            tipoDocumento+='<option disabled selected> - Seleccione Un Tipo De Documento -</option>';
            $.each(json, function (key,value) {    
                tipoDocumento+='<option value='+value.id_tipo_documento+'>'+value.tipo_documento+'</option>';   
            });    
            $('#tipoDocumento').html(tipoDocumento);
        }).fail(function(xhr, status, error){
            $('#tipoDocumento').html(error);
        });
    }

    function actualizarDocumentos(){
        $.ajax({
            url:'../controladorAdministrador/solicitud/documento.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tablaActualizar'  class='table  table-striped table-bordered table-responsive' >";
               datos += '<thead >';
                    datos += '<tr class="table-light border-primary ">';
                        datos += '<th  class="text-center align-middle border border-primary ">MACROPROCESO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">PROCESO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">TIPO DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">CÓDIGO Y NOMBRE DEL DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">VERSIÓN</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">FECHA DE VIGENCIA</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">SOLICITAR ACTUALIZACIÓN</th>';
                    datos += '</tr>';
                datos +=  '</thead>';
                datos += '<tbody>';
                    $.each(json, function(key, value){
                        datos += '<tr class="align-middle" >';
                            datos += '<td class=" border border-primary  text-wrap">'+value.macroproceso+'</td>'; 
                            datos += '<td class=" border border-primary  text-wrap">'+value.proceso+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.tipo_documento+'</td>';
                            datos += '<td class=" border border-primary text-wrap">'+value.codigo+' '+value.nombre_documento+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.numero_version+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.fecha_aprobacion+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="actualizacion(\''+value.codigo+'\',\''+value.tipo_documento+'\','+value.id_tipo_documento+'\)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fas fa-file-signature"></i></button></td>';
                        datos += '</tr>';
                    })
                datos += '</tbody>';
            datos += '</table>';
            $('#actualizacion').html(datos);
            $('#tablaActualizar').DataTable({
                "destroy" : true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info":     true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "fixedColumns": true,
                "fixedHeader": true,
                "keys": true,
                "deferRender": true,
                "lengthChange": true,
                "lengthMenu":	[[5, 10, 20, 25, 50, 100, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength": 20,
                "language": {"url": "../componente/libreria/idioma/es-mx.json"},
                dom:  'Bflrtip',
                order: [
                    [1, 'asc'],
                    [2, 'asc']
                ],
                rowGroup: {
                    dataSrc: 1
                },
                buttons: [
                    {
                        extend: 'searchBuilder',
                        config: {
                            depthLimit: 2,
                            columns: [0,1,2],
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
        }).fail(function(xhr, status, error){
            $('#actualizacion').html(error);
        })
    }

    function eliminarDocumentos(){  
        $.ajax({
            url:'../controladorAdministrador/solicitud/documento.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tablaEliminar'class='table  table-striped table-bordered table-responsive '   >";
               datos += '<thead >';
                    datos += '<tr class="table-light border-primary ">';
                        datos += '<th  class="text-center align-middle border border-primary ">MACROPROCESO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">PROCESO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">TIPO DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">CÓDIGO Y NOMBRE DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">VERSIÓN</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">FECHA DE VIGENCIA</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">SOLICITAR ELIMINACIÓN</th>';
                    datos += '</tr>';
                datos +=  '</thead>';
                datos += '<tbody>';
                    $.each(json, function(key, value){
                        datos += '<tr class="align-middle" >';
                            datos += '<td class=" border border-primary  text-wrap">'+value.macroproceso+'</td>'; 
                            datos += '<td class=" border border-primary  text-wrap">'+value.proceso+'</td>'; 
                            datos += '<td class=" border border-primary text-center align-middle">'+value.tipo_documento+'</td>';
                            datos += '<td class=" border border-primary text-wrap">'+value.codigo+' '+value.nombre_documento+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.numero_version+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.fecha_aprobacion+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle"><button type="button"  onclick="eliminacion(\''+value.codigo+'\',\''+value.tipo_documento+'\','+value.id_tipo_documento+'\)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="fas fa-trash-alt"></i></button></td>';
                        datos += '</tr>';
                    })
                datos += '</tbody>';
            datos += '</table>';
            $('#eliminacion').html(datos);
            $('#tablaEliminar').DataTable({
                "destroy" : true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info":     true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "fixedColumns": true,
                "fixedHeader": true,
                "keys": true,
                "deferRender": true,
                "lengthChange": true,
                "lengthMenu":	[[5, 10, 20, 25, 50, 100, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength":	20,
                "language": {"url": "../componente/libreria/idioma/es-mx.json"},
                dom:  'Bflrtip',
                order: [
                    [1, 'asc'],
                    [2, 'asc']
                ],
                rowGroup: {
                    dataSrc: 1
                },
                buttons: [
                    {
                        extend: 'searchBuilder',
                        config: {
                            depthLimit: 2,
                            columns: [0,1,2],
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
        }).fail(function(xhr, status, error){
            $('#eliminacion').html(error);
        })
    }


})