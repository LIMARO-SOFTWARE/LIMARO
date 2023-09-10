
function activarVersion(id_documento, nombre_documento, numero_version) {
    $("#idDocumentoAct").val(id_documento);
    $("#txtNombreDocum").val(nombre_documento+' V'+numero_version);
    $("#versionObs").val(numero_version);
}

$(document).ready(function () {
    buscar();
    elaborado();
    revisado();
    aprobado();
    buscarDocuObs();

    function buscar(){
        $.ajax({
            url:'../controladorAdministrador/documento/documento.read2.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
            var datos = '';
            datos += "<table id='tableDocumentoVigentesEmp'  class='table  table-striped table-bordered table-responsive '   >";
               datos += '<thead >';
                    datos += '<tr class="table-light border-primary ">';
                        datos += '<th  class="text-center align-middle border border-primary " >MACROPROCESO</th>' ;
                        datos += '<th  class="text-center align-middle border border-primary  " hidden >PROCESO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">TIPO DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary "> CÓDIGO Y NOMBRE DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary "> OBJETIVO DEL DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">VERSIÓN</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">FECHA DE VIGENCIA</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">DESCARGAR DOCUMENTO</th>';
                    datos += '</tr>';
                datos +=  '</thead>';
                datos += '<tbody>';
                    $.each(json, function(key, value){
                        datos += '<tr class="align-middle" >';
                        datos += '<td class=" border border-primary  text-wrap">' + value.macroproceso + '</td>';
                            datos += '<td class=" border border-primary  text-center align-middle" hidden>'+value.proceso+'</td>'; 
                            datos += '<td class=" border border-primary text-center ">'+value.tipo_documento+'</td>';
                            datos += '<td class=" border border-primary text-wrap">'+value.codigo+' '+value.nombre_documento+'</td>';
                            datos += '<td class=" border border-primary text-wrap">'+value.nombre_documento+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.numero_version+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.fecha_aprobacion+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/macroprocesos/'+value.macroproceso+'/'+value.sigla_proceso+'/'+value.sigla_tipo_documento+'/'+value.codigo+ '/'+value.numero_version+ '/' +value.documento+'"><i class="fas fa-download"></i></a></td>';
                        datos += '</tr>';
                    });
                datos += '</tbody>';
            datos += '</table>';
            $('#consulta').html(datos);
            $('#tableDocumentoVigentesEmp').DataTable({
                "destroy" : true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info":     true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu":	[[5, 10, 20, 25, 50,100, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength":	50,
                "language": {"url": "../componente/libreria/idioma/es-mx.json"},
                dom:  'Bfrtip',
                order: [
                    [1, 'asc'],
                    [2, 'asc']
                ],
                rowGroup: {
                    dataSrc: 1
                },
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        download: 'open',
                        title: 'Documentos Vigentes',
                        titleAttr: 'Documentos Vigentes',
                        messageTop: 'Documentos Vigentes',
                        text : '<i class="far fa-file-pdf"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Documentos Vigentes',
                        titleAttr: 'Documentos Vigentes',
                        messageTop: 'Documentos Vigentes',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        title: 'Documentos Vigentes',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        autoFiltre : true ,
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6]
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
        }).fail(function(xhr, status, error){
            $('#consulta').html(error);
        });
        }

    $("#documentoAuto1").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "../controladorAdministrador/documento/documento.autocomplete.php",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            event.preventDefault();
                var suma = parseInt(ui.item.numero_version);
                var uno = 1;
                var resul = suma + uno;
                var sigla = ui.item.sigla_tipo_documento;
                var tipo = ui.item.tipo_documento;
                var c = sigla +' - ' +tipo;
                var nom = ui.item.nombre_documento;
                var cod = ui.item.codigo;
                var completo = cod+ ' ' +nom ;
                $("#documentoAuto1").val(completo);
                $("#documentoNam").val(ui.item.nombre_documento);
                $("#codigo1").val(ui.item.codigo);
                $("#versionSig1").val(resul);
                $("#versionAnt").val(suma);
                $("#idDocumento1").val(ui.item.id_documento);
                $("#proceso1").val(ui.item.sigla_proceso);
                $("#sigla_tipo_documento1").val(ui.item.sigla_tipo_documento) ;
                $("#macroproceso").val(ui.item.macroproceso);
                $("#proceso").val(ui.item.proceso);
                $("#documento").val(ui.item.tipo_documento);
                $("#tipo").val(sigla);
                $("#documentoAuto1").prop("disabled", true);
        }
    });

    function elaborado() {
        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.read2.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var usuarioCreacion = '';
            usuarioCreacion += '<option> - Seleccione un funcionario-</option>';
            $.each(json, function (key, value) {
                usuarioCreacion += '<option value=' + value.usuario + '>' + value.nombre_completo + ' - ' +value.cargo+'</option>';
            })
            $('#usuarioCreacion').html(usuarioCreacion);
        }).fail(function (xhr, status, error) {
            $('#usuarioCreacion').html(error);
        })
    };

    function revisado() {
        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.read2.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var usuarioRevision = '';
            usuarioRevision += '<option> - Seleccione un funcionario-</option>';
            $.each(json, function (key, value) {
                usuarioRevision += '<option value=' + value.usuario + '>' + value.nombre_completo + ' - ' +value.cargo+'</option>';
            })
            $('#usuarioRevision').html(usuarioRevision);
        }).fail(function (xhr, status, error) {
            $('#usuarioRevision').html(error);
        })
    };

    function aprobado() {
        $.ajax({
            url: '../controladorAdministrador/usuario/usuario.read2.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var usuarioAprobacion = '';
            usuarioAprobacion += '<option> - Seleccione un funcionario-</option>';
            $.each(json, function (key, value) {
                usuarioAprobacion += '<option value=' + value.usuario + '>' + value.nombre_completo + ' - ' +value.cargo+'</option>';
            })
            $('#usuarioAprobacion').html(usuarioAprobacion);
        }).fail(function (xhr, status, error) {
            $('#usuarioAprobacion').html(error);
        })
    };

    $(document).on('click', '#limpiar', function () {
        $("#documentoAuto1").prop("disabled", false);
    });
    
    $("#documentoAuto2").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "../controladorAdministrador/documento/documento.autocomplete.php",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            event.preventDefault();
                $("#documentoAuto2").val(ui.item.nombre_documento);
                $("#idDocumento2").val(ui.item.id_documento);
                $("#documentoAuto2").prop("disabled", true);
                $("#btnObsoletos").prop("hidden", false);
                $("#obsoletos").prop("hidden", true);
        }
    });

    $(document).on('click', '#limpiar1', function () {
        $("#documentoAuto2").prop("disabled", false);
        $("#btnObsoletos").prop("hidden", true);
        $("#obsoletos").prop("hidden", false);
    });

    
     /// MOSTRAR DOCUMENTOS OBSOLETOS
     function buscarDocuObs() {
        $.ajax({
            url: '../controladorAdministrador/documento/documento.obsoletos.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tableConsultaObso'  class='table  table-striped table-bordered table-responsive '    >";
                datos += '<thead >';
                    datos += '<tr class="table-light border-primary ">';
                        datos += '<th  class="text-center align-middle border border-primary " >MACROPROCESO  </th>' ;
                        datos += '<th  class="text-center align-middle border border-primary ">PROCESO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">TIPO DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">CÓDIGO Y NOMBRE DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">VERSIÓN</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">VER DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">FECHA INACTIVACIÓN</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">ACTIVAR VERSIÓN</th>';
                    datos += '</tr>';
                datos += '</thead>';
                datos += '<tbody>';
                    $.each(json, function (key, value) {
                        datos += '<tr class="align-middle" >';
                            datos += '<td class=" border border-primary  text-wrap" >' + value.macroproceso + '</td>';
                            datos += '<td class=" border border-primary  text-wrap">' + value.proceso + '</td>';
                            datos += '<td class=" border border-primary text-wrap align-middle">' + value.tipo_documento + '</td>';
                            datos += '<td class=" border border-primary text-wrap">' + value.codigo + ' - ' + value.nombre_documento + '</td>';
                            datos += '<td class=" border border-primary text-center align-middle">' + value.numero_version + '</td>';
                            datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/macroprocesos/'+value.macroproceso+'/'+value.sigla_proceso+'/'+value.sigla_tipo_documento+'/'+value.codigo+ '/'+value.numero_version+ '/' +value.documento+'"><i class="fas fa-download"></i></a></td>';
                            datos += '<td class=" border border-primary text-wrap">' + value.fecha_obsoleto + '</td>';
                            datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="activarVersion('+value.id_documento+',\''+value.nombre_documento+'\','+value.numero_version+')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#activarVersion"><i class="fa fa-exclamation-triangle"></i></button></td>';
                        datos += '</tr>';
                    })
                datos += '</tbody>';
            datos += '</table>';
            $('#documentosObs').html(datos);
            $('#tableConsultaObso').DataTable({
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
                "lengthMenu": [
                    [5, 10, 20, 25, 50, -1],
                    [5, 10, 20, 25, 50, "Todos"]
                ],
                "iDisplayLength": 100,
                "language": {
                    "url": "../componente/libreria/idioma/es-mx.json"
                },
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                order: [
                    [1, 'asc'],
                    [2, 'asc']
                ],
                rowGroup: {
                    dataSrc: 1
                },
                buttons: [{
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Documentos Obsoletos',
                        titleAttr: 'Documentos Obsoletos',
                        messageTop: 'Documentos Obsoletos',
                        text: '<i class="far fa-file-pdf"></i>',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4,5,7 ]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Documentos Obsoletos',
                        titleAttr: 'Documentos Obsoletos',
                        messageTop: 'Documentos Obsoletos',
                        text: '<i class="fas fa-print"></i>',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4,5,7]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        autoFiltre: true,
                        title: 'Documentos Obsoletos',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4,5,7]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy"></i>',
                        autoFiltre: true,
                        titleAttr: 'COPIAR',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4,5,7]
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
            $('#documentosObs').html(error);
        })
    }

    /// CAMBIO DE ESTADO TIPO DOCUMENTOS///
    $(document).on('click','#btnObsoleto',function(event){
    event.preventDefault();
        $.ajax({
            url:'../controladorAdministrador/documento/versionamiento.update.php',
            type: 'POST',
            dataType: 'json',
            data : $('#frmObsoletos').serialize(),
        }).done(function(json){
            if(json !== null){
                Swal.fire({
                    icon: 'error',
                    title: 'Error no se puede inactivar el documento',
                });
            }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Documento inactivo con éxito',
                    showConfirmButton: false,
                    timer: 2500
                    }).then((result) => {
                        window.location.reload();
                });
            }
        }).fail(function(xhr, status, error){
            Swal.fire({
                icon: 'error',
                title: 'Error al actualizar el documento',
            });
        })

    });

     /// CAMBIO DE ESTADO TIPO DOCUMENTOS///
     $(document).on('click','#bntActivarVersion',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/documento/versionamiento.update1.php',
                type: 'POST',
                dataType: 'json',
                data : $('#activarVersion1').serialize(),
            }).done(function(json){
                if(json !== null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error no se puede activar el documento',
                    });
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Documento activado con éxito',
                        showConfirmButton: false,
                        timer: 2500
                        }).then((result) => {
                            window.location.reload();
                    });
                }
            }).fail(function(xhr, status, error){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar el documento',
                });
            })
    
        });


});
