function comentarioAsi (id_solicitud){
    $("#numIdSolicitud").val(id_solicitud);
    $("#numIdSolicitud2").val(id_solicitud);
    $("#numIdSolicitud1").val(id_solicitud);
}

function procesarTarea (id_tarea , id_solicitud, ruta){
    $("#numIdSolicitud").val(id_solicitud);
    $("#numIdSolicitudCom").val(id_solicitud);
    $("#idTarea2").val(id_tarea);
    $("#idTarea23").val(id_tarea);
    $("#ruta").val(ruta);
    
    
}

function procesarTarea1 (id_tarea , id_solicitud, ruta,documento_tarea){
    $("#numIdSolicitud").val(id_solicitud);
    $("#numIdSolicitudCom").val(id_solicitud);
    $("#idTarea2").val(id_tarea);
    $("#idTarea23").val(id_tarea);
    $("#ruta").val(ruta);
    $("#documento1").val(documento_tarea);
    
    
}

function devolverTarea (id_tarea , id_solicitud, ruta){
    $("#numIdSolicitudDev").val(id_solicitud);
    $("#numIdSolicitudComDev").val(id_solicitud);
    $("#idTarea2Dev").val(id_tarea);
    $("#idTarea23Dev").val(id_tarea);
    $("#rutaDev").val(ruta);
    

    
}

function iniciarTarea(id_solicitud) {
    $("#numIdSolicitud3").val(id_solicitud);
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
    asignada();
    asignada1();
    desarrollo();
    elaboracion();
    buscarFuncionarios();
    revision();
    buscarFuncionariosDev();
    devueltas();
    aprobacion();
    buscarFuncionariosApro();
    finalizadas();
    finalizadas1();


    function asignada() {
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.read.3.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var datos = '';
            datos += "<table id='tableSolicitudesAsignadas'   class='table  table-striped table-bordered table-responsive'>";
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
                    datos += '<th  class="border border-primary text-center align-middle ">INICIAR TAREA </th>';
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
                        datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/usuarios/' + value.usuario + '/solicitudes/' + value.ruta  + '/' + value.documento + '">'+value.documento+' <i class="fas fa-download"></i></a></td>';
                    }
                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnIniciarTarea" onclick="iniciarTarea(' + value.id_solicitud + ')" class="btn btn-primary" ><i class="far fa-clock"></i></button></td>';
                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioAsi(' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                datos += '</tr>';
            });
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasAsignadas').html(datos);
            $('#tableSolicitudesAsignadas').DataTable({
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
                order: [[2, 'asc'], [4, 'asc']],
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
                            sheetName: 'Solicitudes Asignadas',
                            title: 'Solicitudes Asignadas',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4,5, 6, 7, 8]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                           
                            titleAttr: 'COPIAR',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
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
            $('#tareasAsignadas').html(error);
        });
    }
    
    /// INICIAR UNA TAREA///
    $(document).on('click', '#btnIniciarTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/tarea/tarea.create.php',
            type: 'POST',
            dataType: 'json',
            data: $('#iniciarTarea').serialize(),
        }).done(function (json) {
            if(json[0].proceso == "OK"){
          
                Swal.fire({
                    icon: 'success',
                    title: 'Tarea Iniciada con éxito',
                    showConfirmButton: true,
                    timer: 3000
                }).then((result) => {
                    window.location.reload();;
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error al crear la tarea',
                });
            }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al crear la tarea',
            });
        })
    })

    /// INICIAR UNA TAREA///
    $(document).on('click', '#btnIniciarTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/tarea/tarea.create.2.php',
            type: 'POST',
            dataType: 'json',
            data: $('#iniciarTarea').serialize(),
        }).done(function (json) {
        }).fail(function (xhr, status, error) {
        })
    })

    /// INICIAR UNA TAREA///
    $(document).on('click', '#btnIniciarTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.comentarios.create.tarea.php',
            type: 'POST',
            dataType: 'json',
            data: $('#iniciarTarea').serialize(),
        }).done(function (json) {
        }).fail(function (xhr, status, error) {
        })
    })

    $(document).on('click', '#btnVerComentarios', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.comentarios.read.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar1').serialize(),
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
                
                dom: 'Bfrtip',
                buttons:
                    [
                        {
                            extend: 'pdfHtml5',
                            orientation: 'landscape',
                            pageSize: 'A4',
                            download: 'open',
                            title: 'Comentarios sobre la Solicitud',
                            titleAttr: 'Comentarios sobre la Solicitud',
                            messageTop: 'Comentarios sobre la Solicitud',
                            text: '<i class="far fa-file-pdf"></i>',
                            exportOptions: {
                                columns: [0, 1, 2,]
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Comentarios sobre la Solicitud',
                            titleAttr: 'Comentarios sobre la Solicitud',
                            messageTop: 'Comentarios sobre la Solicitud',
                            text: '<i class="fas fa-print"></i>',
                            exportOptions: {
                                columns: [0, 1, 2]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fas fa-file-excel"></i>',
                           
                            title: 'Comentarios sobre la Solicitud',
                            exportOptions: {
                                columns: [0, 1, 2]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                           
                            titleAttr: 'COPIAR',
                            exportOptions: {
                                columns: [0, 1, 2]
                            }
                        }
                    ]
            });
        }).fail(function (xhr, status, error) {
            $('#comentarios').html(error);
        });
    });

      /// ASIGNAR COMENTARIO A LA SOLICITUD///
      $(document).on('click', '#btnCrearcomentario', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.comentarios.create.php',
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
                }).then((result) => {
                    window.location.reload();
                });
            }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al crear el comentario',
            });
        });
    });

    function asignada1() {
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.read.4.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var datos = '';
            datos += "<table id='tableSolicitudesAsignadas1'   class='table  table-striped table-bordered table-responsive'>";
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
                    datos += '<th  class="border border-primary text-center align-middle ">ASIGNADO A </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">FECHA DE ASIGNACIÓN </th>';
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
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.usuario_tarea_estado + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.fecha_tarea_estado + '</td>';
                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioAsi(' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                datos += '</tr>';
            });
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasAsignadas1').html(datos);
            $('#tableSolicitudesAsignadas1').DataTable({
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
                order: [[3, 'asc'], [1, 'asc']],
                rowGroup: {
                    dataSrc: [[3]]
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
        }).fail(function (xhr, status, error) {
            $('#tareasAsignadas1').html(error);
        });
    }
    
    function desarrollo() {
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.read.5.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var datos = '';
            datos += "<table id='tableTareasDesarrollo'   class='table  table-striped table-bordered table-responsive'>";
            datos += '<thead >';
                datos += '<tr class="table-light border-primary text-center align-middle ">';
                    datos += '<th  class="border border-primary text-center align-middle ">NÚMERO DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-wrap align-middle ">PRIORIDAD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">ESTADO DE LA TAREA</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">FUNCIONARIO ENCARGADO</th>';
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
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.solicitud + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.tarea_estado+ '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.nombre_completo+ '</td>';
                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioAsi(' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                datos += '</tr>';
            });
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasDesarrollo').html(datos);
            $('#tableTareasDesarrollo').DataTable({
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
                order: [[3, 'asc'], [1, 'asc']],
                rowGroup: {
                    dataSrc: [[3]]
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
                            sheetName: 'Tareas en Desarrollo',
                            title: 'Tareas en Desarrollos',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5,6,7]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                           
                            titleAttr: 'COPIAR',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4,5,6,7]
                            }
                        },
                        {
                            extend: 'searchBuilder',
                            config: {
                                
                                columns: [0,1,2,3,4,6,7],
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
            $('#tareasDesarrollo').html(error);
        });
    }

    function elaboracion() {
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.read.6.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var datos = '';
            datos += "<table id='tableTareasAelaborar'   class='table  table-striped table-bordered table-responsive'>";
            datos += '<thead >';
                datos += '<tr class="table-light border-primary text-center align-middle ">';
                    datos += '<th  class="border border-primary text-center align-middle ">NÚMERO DE LA TAREA</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-wrap align-middle ">PRIORIDAD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">ESTADO DE LA TAREA</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DOCUMENTO SOPORTE</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">COMENTARIOS</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">PROCESAR TAREA</th>';
                datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                datos += '<tr class="align-middle" >';
                    datos += '<td class=" border border-primary text-wrap align-middle" id="numIdSolicitud">' + value.id_tarea + ' </td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.fecha_solicitud + '</td>';
                    datos += '<td class=" border border-primary text-wrap">' + value.prioridad + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.tipo_solicitud + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.tipo_documento + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.solicitud + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.tarea_estado + '</td>';
                    if (value.tarea_estado == "CREADO"){
                        if (value.soportes == "") {
                            datos += '<td class=" border border-primary text-wrap align-middle">Sin Documento Soporte</td>';
                        } else {
                            datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/usuarios/'+value.solicitante+'/solicitudes/'+value.carpeta+'/'+value.soportes+'">'+value.soportes+'   <i class="fas fa-download"></i></a></td>';
                        }
                    }else if (value.tarea_estado == "DEVUELTO"){
                        datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/usuarios/'+value.usuario_tarea_estado+'/tareas/'+value.id_tarea+'/'+value.ruta+'/'+value.documento_tarea+'">'+value.documento_tarea+'<i class="fas fa-download"></i></a></td>';
                    }else{
                        datos += '<td class=" border border-primary text-wrap align-middle">Sin Documento Soporte</td>';
                    }
                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioAsi(' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                    datos += '<td class=" border border-primary text-wrap align-middle"><button type="button" onclick="procesarTarea('+ value.id_tarea +','+value.id_solicitud+',\''+value.ruta+'\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal12"><i class="fas fa-file-import"></i></button></td>';  
                datos += '</tr>';
            });
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasAelaborar').html(datos);
            $('#tableTareasAelaborar').DataTable({
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
                order: [[6, 'asc']],
                rowGroup: {
                    dataSrc: [[6]]
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
                            sheetName: 'Tareas en Desarrollo',
                            title: 'Tareas en Desarrollos',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5,6,7]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                           
                            titleAttr: 'COPIAR',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4,5,6,7]
                            }
                        },
                        {
                            extend: 'searchBuilder',
                            config: {
                                
                                columns: [0,1,2,3,4,6],
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
            $('#tareasAelaborar').html(error);
        });
    }

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

    function revision() {
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.read.7.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var datos = '';
            datos += "<table id='tableTareasArevisar'   class='table  table-striped table-bordered table-responsive'>";
            datos += '<thead >';
                datos += '<tr class="table-light border-primary text-center align-middle ">';
                    datos += '<th  class="border border-primary text-center align-middle ">NÚMERO DE LA TAREA</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA ASIGNACIÓN</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">PRIORIDAD DE LA TAREA</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DOCUMENTO SOPORTE </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">COMENTARIOS</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">PROCESAR TAREA</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DEVOLVER TAREA</th>';
                datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                datos += '<tr class="align-middle" >';
                    datos += '<td class=" border border-primary text-wrap align-middle" id="numIdSolicitud">' + value.id_tarea + ' </td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.fecha_tarea_estado + '</td>';
                    datos += '<td class=" border border-primary text-wrap">' + value.prioridad + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.tipo_documento + '</td>';
                    datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/usuarios/'+value.usuario_tarea_estado+'/tareas/'+value.id_tarea+'/'+value.ruta+'/'+value.documento_tarea+'">'+value.documento_tarea+'<i class="fas fa-download"></i></a></td>';
                    datos += '<td class=" border border-primary text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioAsi(' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                    datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="procesarTarea1('+ value.id_tarea +','+value.id_solicitud+',\''+value.ruta+'\',\''+value.documento_tarea+'\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal12"><i class="fas fa-file-import"></i></button></td>'; 
                    datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="devolverTarea('+ value.id_tarea +','+value.id_solicitud+',\''+value.ruta+'\',\''+value.documento_tarea+'\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalDevol"><i class="fas fa-reply-all"></i></button></td>';  
                datos += '</tr>';
            });
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasArevisar').html(datos);
            $('#tableTareasArevisar').DataTable({
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
                order: [[6, 'asc']],
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
                            sheetName: 'Tareas en Desarrollo',
                            title: 'Tareas en Desarrollos',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5,6,7]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                           
                            titleAttr: 'COPIAR',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4,5,6,7]
                            }
                        },
                        {
                            extend: 'searchBuilder',
                            config: {
                                
                                columns: [0,1,2,3,4,6],
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
            $('#tareasArevisar').html(error);
        });
    }

    function buscarFuncionariosDev() {

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
            $('#empleadoDev').html(tipoDocumento);
        }).fail(function (xhr, status, error) {
            $('#empleadoDev').html(error);
        });
    }

    $(document).on('click', '#empleadoDev', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.read4.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar12').serialize(),
        }).done(function (json) {
            var correo = "";
            $.each(json, function (key, value) {
                correo = value.correo_empleado;
            });
            $('#empleadoCorreoDev').val(correo);
            
        }).fail(function (xhr, status, error) {
            $('#empleadoCorreoDev').val(error);
        });
    });

    function devueltas() {
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.read.8.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var datos = '';
            datos += "<table id='tableTareasDesarrollo'   class='table  table-striped table-bordered table-responsive'>";
            datos += '<thead >';
                datos += '<tr class="table-light border-primary text-center align-middle ">';
                    datos += '<th  class="border border-primary text-center align-middle ">NÚMERO DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-wrap align-middle ">PRIORIDAD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">ESTADO DE LA TAREA</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">FUNCIONARIO ENCARGADO</th>';
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
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.solicitud + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.tarea_estado+ '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.nombre_completo+ '</td>';
                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioAsi(' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                datos += '</tr>';
            });
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasDevolucion').html(datos);
            $('#tableTareasDesarrollo').DataTable({
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
                order: [[3, 'asc'], [1, 'asc']],
                rowGroup: {
                    dataSrc: [[3]]
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
                            sheetName: 'Tareas en Desarrollo',
                            title: 'Tareas en Desarrollos',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5,6,7]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                           
                            titleAttr: 'COPIAR',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4,5,6,7]
                            }
                        },
                        {
                            extend: 'searchBuilder',
                            config: {
                                
                                columns: [0,1,2,3,4,6,7],
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
            $('#tareasDevolucion').html(error);
        });
    }

    function aprobacion() {
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.read.9.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var datos = '';
            datos += "<table id='tableTareasArevisar'   class='table  table-striped table-bordered table-responsive'>";
            datos += '<thead >';
                datos += '<tr class="table-light border-primary text-center align-middle ">';
                    datos += '<th  class="border border-primary text-center align-middle ">NÚMERO DE LA TAREA</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA ASIGNACIÓN</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">PRIORIDAD DE LA TAREA</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DOCUMENTO SOPORTE </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">COMENTARIOS</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">PROCESAR TAREA</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DEVOLVER TAREA</th>';
                datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                datos += '<tr class="align-middle" >';
                    datos += '<td class=" border border-primary text-wrap align-middle" id="numIdSolicitud">' + value.id_tarea + ' </td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.fecha_tarea_estado + '</td>';
                    datos += '<td class=" border border-primary text-wrap">' + value.prioridad + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.tipo_documento + '</td>';
                    datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/usuarios/'+value.usuario_tarea_estado+'/tareas/'+value.id_tarea+'/'+value.ruta+'/'+value.documento_tarea+'">'+value.documento_tarea+'<i class="fas fa-download"></i></a></td>';
                    datos += '<td class=" border border-primary text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioAsi(' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                    datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="procesarTarea1('+ value.id_tarea +','+value.id_solicitud+',\''+value.ruta+'\',\''+value.documento_tarea+'\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal12"><i class="fas fa-file-import"></i></button></td>'; 
                    datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="devolverTarea('+ value.id_tarea +','+value.id_solicitud+',\''+value.ruta+'\',\''+value.documento_tarea+'\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalDevol"><i class="fas fa-reply-all"></i></button></td>';  
                datos += '</tr>';
            });
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasAprobar').html(datos);
            $('#tableTareasArevisar').DataTable({
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
                order: [[6, 'asc']],
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
                            sheetName: 'Tareas en Desarrollo',
                            title: 'Tareas en Desarrollos',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5,6,7]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                           
                            titleAttr: 'COPIAR',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4,5,6,7]
                            }
                        },
                        {
                            extend: 'searchBuilder',
                            config: {
                                
                                columns: [0,1,2,3,4,6],
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
            $('#tareasAprobar').html(error);
        });
    }

    function buscarFuncionariosApro() {

        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.read5.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var tipoDocumento = 0;
            tipoDocumento += '<option disabled selected> - Seleccione un funcionario-</option>';
            $.each(json, function (key, value) {
                tipoDocumento += '<option value=' + value.usuario + '>' + value.usuario + '</option>';
            });
            $('#empleadoApro').html(tipoDocumento);
        }).fail(function (xhr, status, error) {
            $('#empleadoApro').html(error);
        });
    }

    $(document).on('click', '#empleadoApro', function (event) {
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
            $('#empleadoCorreoApro').val(correo);
            
        }).fail(function (xhr, status, error) {
            $('#empleadoCorreoApro').val(error);
        });
    });

    function finalizadas() {
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.read.10.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var datos = '';
            datos += "<table id='tableTareasDesarrollo'   class='table  table-striped table-bordered table-responsive'>";
            datos += '<thead >';
                datos += '<tr class="table-light border-primary text-center align-middle ">';
                    datos += '<th  class="border border-primary text-center align-middle ">NÚMERO DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-wrap align-middle ">PRIORIDAD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">ESTADO DE LA TAREA</th>';
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
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.solicitud + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.tarea_estado+ '</td>';
                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioAsi(' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                datos += '</tr>';
            });
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasFinalizadas').html(datos);
            $('#tableTareasDesarrollo').DataTable({
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
                order: [[3, 'asc'], [1, 'asc']],
                rowGroup: {
                    dataSrc: [[3]]
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
                            sheetName: 'Tareas en Desarrollo',
                            title: 'Tareas en Desarrollos',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5,6,7]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                           
                            titleAttr: 'COPIAR',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4,5,6,7]
                            }
                        },
                        {
                            extend: 'searchBuilder',
                            config: {
                                
                                columns: [0,1,2,3,4,6,7],
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
            $('#tareasFinalizadas').html(error);
        });
    }

    function finalizadas1() {
        $.ajax({
            url: '../controladorAdministrador/tarea/solicitudes.read.11.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var datos = '';
            datos += "<table id='tableTareasDesarrollo'   class='table  table-striped table-bordered table-responsive'>";
            datos += '<thead >';
                datos += '<tr class="table-light border-primary text-center align-middle ">';
                    datos += '<th  class="border border-primary text-center align-middle ">NÚMERO DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-wrap align-middle ">PRIORIDAD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                    datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>';
                    datos += '<th  class="border border-primary text-center align-middle ">ESTADO DE LA TAREA</th>';
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
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.solicitud + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.tarea_estado+ '</td>';
                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentarioAsi(' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                datos += '</tr>';
            });
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasFinalizadas1').html(datos);
            $('#tableTareasDesarrollo').DataTable({
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
                order: [[3, 'asc'], [1, 'asc']],
                rowGroup: {
                    dataSrc: [[3]]
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
                            sheetName: 'Tareas en Desarrollo',
                            title: 'Tareas en Desarrollos',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5,6,7]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                           
                            titleAttr: 'COPIAR',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4,5,6,7]
                            }
                        },
                        {
                            extend: 'searchBuilder',
                            config: {
                                
                                columns: [0,1,2,3,4,6,7],
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
            $('#tareasFinalizadas1').html(error);
        });
    }

})
