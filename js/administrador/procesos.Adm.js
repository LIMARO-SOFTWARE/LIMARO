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

function modificarProceso (id_proceso, proceso, sigla_proceso,id_macroproceso,macroproceso,objetivo){
    $("#numidProcesosMod").val(id_proceso);
    $("#idMacroAnt").val(id_macroproceso);
    $("#txtMacroActual").val(macroproceso);
    $("#txtProcesoMod").val(proceso);
    $("#txtProcesoAnt").val(proceso);
    $("#txtSiglaProcesoMod").val(sigla_proceso);
    $("#txtObjetiProMod").val(objetivo);
}

function modificarMacroproceso (id_macroproceso, macroproceso, objetivo){
    $("#numMacroMod").val(id_macroproceso);
    $("#txtMacroprocesoMod").val(macroproceso);
    $("#txtMacroprocesoModAnt").val(macroproceso);
    $("#txtObjetivoMod").val(objetivo);
}

function eliminacionMacroProceso (id_macroproceso, macroproceso, estado){
    $("#numidMacroprocesosElim").val(id_macroproceso);
    $("#txtMacroprocesoElim").val(macroproceso);
    $("#txtEstadoActualMac").val(estado);
}

function eliminacionProceso (id_proceso, proceso, estado){
    $("#numidProcesosElim").val(id_proceso);
    $("#txtProcesoElim").val(proceso);
    $("#txtEstadoActualPro").val(estado);
}

$(document).ready(function(){

    buscarProceso(); 
    buscarMacroproceso();
    buscarMacroprocesoP()
    buscarMacroprocesoActPro();

    /// REGISTRAR MACROPROCESO ///
    $(document).on('click','#btnRegistrarMacroroceso',function(event){
    event.preventDefault();
        $.ajax({
            url:'../controladorAdministrador/macroproceso/macroproceso.create.php',
            type: 'POST',
            dataType: 'json',
            data : $('#macroproceso').serialize(),
        }).done(function(json){
            if(json !== null){
                Swal.fire({
                    icon: 'error',
                    title: 'Error el macroproceso ya existe',
                })
            }else{
                Swal.fire({
                icon: 'success',
                title: 'Macroproceso creado con éxito',
                showConfirmButton: false,
                timer: 2500
                }).then((result) => {
                    window.location.reload();
                });
            }
        }).fail(function(xhr, status, error){
            Swal.fire({
                icon: 'error',
                title: 'Error al crear el macroproceso',
            })
    });
    });

    /// MOSTRAR MACROPROCESO ///
    function buscarMacroproceso(){
        $.ajax({
            url:'../controladorAdministrador/macroproceso/macroproceso.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
                datos += "<table id='tablaMacroprocesos' class='table  table-striped table-bordered table-responsive '   >"; 
                datos += '<thead >';
                        datos += '<tr class="table-light border-primary ">';
                            datos += '<th  class="text-center align-middle border border-primary ">NOMBRE MACROPROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">OBJETIVO DEL MACROPROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">ACTUALIZAR MACROPROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">ESTADO MACROPROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">CAMBIAR MACROPROCESO</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.macroproceso+'</td>';
                                datos += '<td class=" border border-primary text-break align-middle">'+value.objetivo+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="modificarMacroproceso('+value.id_macroproceso+',\''+value.macroproceso+'\',\''+value.objetivo+'\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-edit"></i></button></td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.estado+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="eliminacionMacroProceso('+value.id_macroproceso+',\''+value.macroproceso+'\',\''+value.estado+'\')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminacionMacroProceso"><i class="fas fa-times"></i></button></td>';
                            datos += '</tr>';
                        });
                    datos += '</tbody>';
                datos += '</table>';
            $('#macroprocesos').html(datos);
            $('#tablaMacroprocesos').DataTable({
                "destroy" : true,
                "autoWidth": true,
                "bAutoWidth": true,
                "responsive": true,
                "searching": true,
                "info":     true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu":	[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength":	20,
                "language": {"url": "../componente/libreria/idioma/es-mx.json"},
                dom:  'Bfrtip',
                searchBuilder: true,
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Macroprocesos',
                        titleAttr: 'Macroprocesos',
                        messageTop: 'Macroprocesos',
                        text : '<i class="far fa-file-pdf"></i>',
                        exportOptions : {
                            columns: [0,1,3]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Macroprocesos',
                        titleAttr: 'Macroprocesos',
                        messageTop: 'Macroprocesos',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,3]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        title: 'Macroprocesos',
                        exportOptions : {
                            columns: [0,1,3]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        autoFiltre : true ,
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,3]
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
        }).fail(function(xhr, status, error){
            $('#macroprocesos').html(error);
        });
    }

    /// MODIFICAR MACROPROCESO///
    $(document).on('click','#btnModificarMacropro',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/macroproceso/macroproceso.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarMacropro').serialize(),
            }).done(function(json){
                if(json !== null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error el macroproceso ya existe',
                    })
                }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Macroproceso actualizado con éxito',
                    showConfirmButton: false,
                    timer: 2500
                  }).then((result) => {
                   window.location.reload();
                  });
                }
            }).fail(function(xhr, status, error){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar el macroproceso',
                });
        });
    });
    
    /// CAMBIO DE ESTADO MACROPROCESO///
    $(document).on('click','#btnEliminarPro',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/macroproceso/macroproceso.delete.php',
                type: 'POST',
                dataType: 'json',
                data : $('#inactivarProce').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Estado Actualizado con éxito',
                    showConfirmButton: false,
                    timer: 2500
                  }).then((result) => {
                   window.location.reload();
                  });
            }).fail(function(xhr, status, error){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al cambiar el estado del macroproceso',
                });
        });

    });

    /// MOSTRAR MACROPROCESO PARA CREAR PROCESO ///
    function buscarMacroprocesoP() {
        $.ajax({
            url: '../controladorAdministrador/macroproceso/macroproceso.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var macroproceso = 0;
            macroproceso += '<option disabled selected> - Seleccione un Macroproceso -</option>';
            $.each(json, function (key, value) {
                if (value.estado == "ACTIVO") {
                    macroproceso += '<option value=' + value.id_macroproceso + '>' + value.macroproceso + '</option>';
                }
            });
            $('#tipoMacroProceso').html(macroproceso);
        }).fail(function (xhr, status, error) {
            $('#tipoMacroProceso').html(error);
        });
    }

    /// MOSTRAR MACROPROCESO PARA ACTUALIZAR PROCESO ///
    function buscarMacroprocesoActPro() {
        $.ajax({
            url: '../controladorAdministrador/macroproceso/macroproceso.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var macroproceso = 0;
            macroproceso += '<option disabled selected> - Seleccione un Macroproceso -</option>';
            $.each(json, function (key, value) {
                if (value.estado == "ACTIVO") {
                    macroproceso += '<option value=' + value.id_macroproceso + '>' + value.macroproceso + '</option>';
                }
            });
            $('#macroproActuPro').html(macroproceso);
        }).fail(function (xhr, status, error) {
            $('#macroproActuPro').html(error);
        });
    }

    /// REGISTRAR PROCESO ///
    $(document).on('click','#btnRegistrarProceso',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/proceso/proceso.create.php',
                type: 'POST',
                dataType: 'json',
                data : $('#proceso').serialize(),
            }).done(function(json){
                if(json !== null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error el nombre del proceso o las siglas ya existen',
                    })
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Proceso creado con éxito',
                        showConfirmButton: false,
                        timer: 2500
                    }).then((result) => {
                       window.location.reload();
                    });
                }
            }).fail(function(xhr, status, error){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al crear el proceso',
                });
        });
    });

     /// MOSTRAR PROCESO ///
     function buscarProceso(){
        $.ajax({
            url:'../controladorAdministrador/proceso/proceso.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
            datos +="<div class='table-responsive{-sm|-md|-lg|-xl|-xxl} '>"
                datos += "<table id='tablaProcesos' class='table  table-striped table-bordered  '   >"; 
                datos += '<thead >';
                        datos += '<tr class="table-light border-primary ">';
                            datos += '<th  class="text-center align-middle border border-primary ">MACROPROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">NOMBRE PROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">SIGLA PROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">OBJETO PROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">ACTUALIZAR PROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">ESTADO PROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">CAMBIAR ESTADO</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            if(value.estado == "A"){
                                value.estado = "ACTIVO";
                            }else{
                                if(value.estado == "I"){
                                    value.estado = "INACTIVO";
                                }
                            }
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap" id="numIdSolicitud" >'+value.macroproceso+' </td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.proceso+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.sigla_proceso+'</td>';
                                datos += '<td class=" border border-primary text-break align-middle">'+value.objetivo+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="modificarProceso('+value.id_proceso+',\''+value.proceso+'\',\''+value.sigla_proceso+'\','+value.id_macroproceso+',\''+value.macroproceso+'\',\''+value.objetivo+'\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModale"><i class="far fa-edit"></i></button></td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.estado+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="eliminacionProceso('+value.id_proceso+',\''+value.proceso+'\',\''+value.estado+'\')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fas fa-times"></i></button></td>';
                            datos += '</tr>';
                        });
                    datos += '</tbody>';
                datos += '</table>';
                datos += '</div>';
            $('#procesos').html(datos);
            $('#tablaProcesos').DataTable({
                "destroy" : true,
                "autoWidth": true,
                "responsive": false,
                "searching": true,
                "info":     true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                
                "keys": true,
                "deferRender": true,
                "lengthMenu":	[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength":	20,
                "language": {"url": "../componente/libreria/idioma/es-mx.json"},
               
                dom:  'Bfrtip',
                searchBuilder: true,
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Procesos',
                        titleAttr: 'Procesos',
                        messageTop: 'Procesos',
                        text : '<i class="far fa-file-pdf"></i>',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Procesos',
                        titleAttr: 'Procesos',
                        messageTop: 'Procesos',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        title: 'Procesos',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        autoFiltre : true ,
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'searchBuilder'
                        
                    }                      
                ],
               
            });
        }).fail(function(xhr, status, error){
            $('#procesos').html(error);
        });
    }

     /// MODIFICAR PROCESO///
     $(document).on('click','#btnModificarPro',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/proceso/proceso.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarPro').serialize(),
            }).done(function(json){
                if(json !== null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error el nombre del proceso o las siglas ya existen',
                    })
                }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Proceso actualizado con éxito',
                    showConfirmButton: false,
                    timer: 2500
                  }).then((result) => {
                   window.location.reload();
                  });
                }
            }).fail(function(xhr, status, error){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar el proceso',
                });
        });
    });
	
    /// CAMBIO DE ESTADO PROCESO///
    $(document).on('click','#btnEliminarPro',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/proceso/proceso.delete.php',
                type: 'POST',
                dataType: 'json',
                data : $('#inactivarProce').serialize(),
            }).done(function(json){
                if(json !== null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al cambiar el estado del proceso',
                    })
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Estado del proceso actualizado con éxito',
                        showConfirmButton: false,
                        timer: 2500
                    }).then((result) => {
                       window.location.reload();
                    });
                }
            }).fail(function(xhr, status, error){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al cambiar el estado al proceso',
                });
        });

    });

    /// MOSTRAR FORMULARIO PARA CREAR MACROPROCESO///
    $(document).on('click','#btnCrearMacro', function(){
        $("#btnCrearMacro").prop("hidden", true);
        $("#macroproceso").prop("hidden", false);
        $("#macroRegistrados").prop("hidden", true);
        $("#volverRegistroMacro").prop("hidden", false);
    })

    /// MOSTRAR MACROPROCESOS REGISTRADOS///
    $(document).on('click','#volverRegistroMacro', function(){
        $("#btnCrearMacro").prop("hidden", false);
        $("#macroproceso").prop("hidden", true);
        $("#macroRegistrados").prop("hidden", false);
        $("#volverRegistroMacro").prop("hidden", true);
    })

      /// MOSTRAR FORMULARIO PARA CREAR PROCESO///
      $(document).on('click','#btnCrearProce', function(){
        $("#btnCrearProce").prop("hidden", true);
        $("#proceso").prop("hidden", false);
        $("#procesoRgis").prop("hidden", true);
        $("#volverRegistroProce").prop("hidden", false);
    })

    /// MOSTRAR PROCESOS REGISTRADOS///
    $(document).on('click','#volverRegistroProce', function(){
        $("#btnCrearProce").prop("hidden", false);
        $("#proceso").prop("hidden", true);
        $("#procesoRgis").prop("hidden", false);
        $("#volverRegistroProce").prop("hidden", true);
    })

})