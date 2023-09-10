function comentario(id_solicitud) {
    $("#numIdSolicitud").val(id_solicitud);
    $("#numIdSolicitud1").val(id_solicitud);
}

function estadiSolicitud(id_solicitud, estatus_solicitud) {
    $("#numIdSolicitud2").val(id_solicitud);
    $("#estadoSolicitud").val(estatus_solicitud);
}

function iniciarTarea(id_solicitud) {
    $("#numIdSolicitud3").val(id_solicitud);
}

function idtarea(id_tarea, id_solicitud) {
    $("#numIdTarea").val(id_tarea);
    $("#numIdTarea1").val(id_tarea);
    $("#numIdSolT").val(id_solicitud);
}

function idtareaAct(id_versionamiento, id_tarea, documento, codigo, nombre_documento, numero_version, sigla_tipo_documento, sigla_proceso, descripcion_version) {
    $("#numIdTarea11").val(id_versionamiento);
    $("#documendocumentoTarea").val(codigo + '-' + nombre_documento);
    $("#versionDoc1").val(numero_version);
    $("#fileDocumentoDes").attr('href', '../documentos/procesos/' + sigla_proceso + '/' + sigla_tipo_documento + '/' + codigo+ '/' + numero_version + '/' + documento);
    $("#descriVersion").val(descripcion_version);
    $("#numIdVerDevol").val(id_versionamiento);
    $("#idTareDEvl").val(id_tarea);
    $("#id_tareaAct").val(id_tarea);
}

function idtareaApr(id_versionamiento, id_tarea, documento, codigo, nombre_documento, numero_version, sigla_tipo_documento, sigla_proceso, descripcion_version, id_documento) {
    $("#numIdTareaApro").val(id_versionamiento);
    $("#documendocumentoApr").val(codigo + '-' + nombre_documento);
    $("#versionDocAp").val(numero_version);
    $("#fileDocumentoDesAp").attr('href', '../documentos/procesos/' + sigla_proceso + '/' + sigla_tipo_documento + '/' + codigo+ '/' + numero_version + '/' + documento);
    $("#descriVersionAp").val(descripcion_version);
    $("#numIdVerDevolApr").val(id_versionamiento);

    $("#id_documentoVersion").val(id_documento);
    $("#versionAnterior").val(numero_version - 1);
    $("#id_tareaApr").val(id_tarea);

    $("#id_tareaDEvAp").val(id_tarea);

}

function idcomentarioTar(id_tarea) {
    $("#numIdTidTareaCom").val(id_tarea);
    $("#numIdTidTareaCom1").val(id_tarea);
    $("#idTareaComDev").val(id_tarea);
    
}

function idcomentarioTarAct(id_tarea) {
    $("#numIdTidTareaComAct").val(id_tarea);
    $("#numIdTidTareaCom1Act").val(id_tarea);
}

function sigla_proceso(id_proceso, sigla_proceso, numero_version) {
    $("#idsiglasProc").val(id_proceso);
    $("#proceso").val(sigla_proceso);
    $("#versionSig").val(numero_version + 1);
}

function idDevolucion(id_versionamiento, documento, codigo, nombre_documento, numero_version, sigla_tipo_documento, sigla_proceso, descripcion_version, id_documento) {
    $("#idVersionDevo").val(id_versionamiento);
    $("#documendocumentoDevo").val(codigo + '-' + nombre_documento);
    $("#versionDev").val(numero_version);
    $("#procesoDEv").val(sigla_proceso);
    $("#tipoDocDElv").val(sigla_tipo_documento);
}

$(document).ready(function () {

    tareasAct();
    tareasApr();
    buscarFuncionarios1();

    /// mostrar las tareas revision//
    function tareasAct() {
        $.ajax({
            url: '../controladorAdministrador/tarea.readAct.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
             * Se crea la tabla Por mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tabletareasAct'   class='table  table-striped table-bordered table-responsive '  >";
            datos += '<thead >';
            datos += '<tr class="table-light border-primary text-center align-middle ">';
            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO VERSIONAMIENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO DOCUMENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">NOMBRE DOCUMENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle "> VERSIÓN </th>';
            datos += '<th  class="border border-primary text-center align-middle ">ADMINISTRAR TAREA</th>';
            datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                if (value.estado = "R") {
                    estado = "REVISIÓN ";
                }
                datos += '<tr class="align-middle" >';
                datos += '<td class=" border border-primary text-wrap align-middle" >' + value.id_versionamiento + ' </td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.codigo + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.nombre_documento + '</td>';
                datos += '<td class=" border border border-primary text-center align-middle">' + value.numero_version + '</td>';
                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  onclick="idtareaAct(' + value.id_versionamiento + ',' + value.id_tarea + ',\'' + value.documento + '\',\'' + value.codigo + '\',\'' + value.nombre_documento + '\',' + value.numero_version + ',\'' + value.sigla_tipo_documento + '\',\'' + value.sigla_proceso + '\',\'' + value.descripcion_version + '\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltareaAct"><i class="fas fa-cogs"></i></button></td>';

                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasAct').html(datos);
            $('#tabletareasAct').DataTable({
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
                "iDisplayLength": 5,
                "language": {
                    "url": "../componente/libreria/idioma/es-mx.json"
                },
                order: [
                    [0, 'asc']
                ],
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    download: 'open',
                    title: 'Documentos Por Revisión',
                    titleAttr: 'Documentos Por Revisión',
                    messageTop: 'Documentos Por Revisión',
                    text: '<i class="far fa-file-pdf"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    title: 'Documentos Por Revisión',
                    titleAttr: 'Documentos Por Revisión',
                    messageTop: 'Documentos Por Revisión',
                    text: '<i class="fas fa-print"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    autoFiltre: true,
                    title: 'Documentos Por Revisión',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: '<i class="fas fa-copy"></i>',
                    autoFiltre: true,
                    titleAttr: 'COPIAR',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'searchBuilder'

                }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#tareasAct').html(error);
        })
    }

    ///asignar funcioanrio Por revisar///
    function buscarFuncionarios1() {
        $.ajax({
            url: '../controladorAdministrador/usuario.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var tipoDocumento = 0;
            tipoDocumento += '<option disabled selected> - Seleccione Un Funcionario -</option>';
            $.each(json, function (key, value) {
                tipoDocumento += '<option value=' + value.usuario + '>' + value.usuario + '</option>';
            })
            $('#empleado1').html(tipoDocumento);
        }).fail(function (xhr, status, error) {
            $('#empleado1').html(error);
        })
    }

    /// REVISIÓN  DE VERSIÓN  REALIZADA ///
    $(document).on('click', '#btnRevisionTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/versionamiento.revision.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#tareaRevision').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Revisión Registrada con Éxito',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                window.location.reload();
            })
        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    /// DEVOLVER REVISIÓN  DE VERSIÓN  REALIZADA ///
    $(document).on('click', '#btnDevolverTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/versionamiento.devolver.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#tareaDevolucion').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Devolución de Documento Registrada con Éxito',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                window.location.reload();
            })
        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    /// mostrar las tareas APROBACION//
    function tareasApr() {
        $.ajax({
            url: '../controladorAdministrador/tarea.readApr.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
             * Se crea la tabla Por mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tabletareasApr'   class='table  table-striped table-bordered table-responsive '  >";
            datos += '<thead >';
            datos += '<tr class="table-light border-primary text-center align-middle ">';
            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO VERSIONAMIENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">CÓDIGO DOCUMENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">NOMBRE DOCUMENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">VERSIÓN </th>';
            datos += '<th  class="border border-primary text-center align-middle ">ADMINISTRAR TAREA</th>';
            datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                if (value.estado = "R") {
                    estado = "REVISIÓN ";
                }
                datos += '<tr class="align-middle" >';
                datos += '<td class=" border border-primary text-wrap align-middle" >' + value.id_versionamiento + ' </td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.codigo + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.nombre_documento + '</td>';
                datos += '<td class=" bborder border-primary text-center align-middle">' + value.numero_version + '</td>';
                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  onclick="idtareaApr(' + value.id_versionamiento + ',' + value.id_tarea + ',\'' + value.documento + '\',\'' + value.codigo + '\',\'' + value.nombre_documento + '\',' + value.numero_version + ',\'' + value.sigla_tipo_documento + '\',\'' + value.sigla_proceso + '\',\'' + value.descripcion_version + '\',' + value.id_documento + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltareaApr"><i class="fas fa-cogs"></i></button></td>';

                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasApr').html(datos);
            $('#tabletareasApr').DataTable({
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
                "iDisplayLength": 5,
                "language": {
                    "url": "../componente/libreria/idioma/es-mx.json"
                },
                order: [
                    [0, 'asc']
                ],
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    download: 'open',
                    title: 'Documentos  Por Aprobación',
                    titleAttr: 'Documentos  Por Aprobación',
                    messageTop: 'Documentos  Por Aprobación',
                    text: '<i class="far fa-file-pdf"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    title: 'Documentos  Por Aprobación',
                    titleAttr: 'Documentos  Por Aprobación',
                    messageTop: 'Documentos  Por Aprobación',
                    text: '<i class="fas fa-print"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    autoFiltre: true,
                    title: 'Documentos Por Aprobación',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: '<i class="fas fa-copy"></i>',
                    autoFiltre: true,
                    titleAttr: 'COPIAR',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'searchBuilder'

                }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#tareasApr').html(error);
        })
    }

    /// REVISIÓN  DE VERSIÓN REALIZADA ///
    $(document).on('click', '#btnAprobacionTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/versionamiento.aprobacion.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#aprobacion').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Revisión Registrada con Éxito',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                window.location.reload();
            })
        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    ///INACTIVAR VERSIÓN ANTERIOR DE VERSIÓN REALIZADA///
    $(document).on('click', '#btnAprobacionTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/versionamiento.aprobacion.update2.php',
            type: 'POST',
            dataType: 'json',
            data: $('#aprobacion').serialize(),
        }).done(function (json) {

        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    /// DEVOLVER REVISIÓN  DE VERSIÓN REALIZADA ///
    $(document).on('click', '#btnDevolverTareaApr', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/versionamiento.devolver1.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#tareaDevolucionApr').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Devolución de Documento Registrada con Éxito',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                window.location.reload();
            })
        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

})
