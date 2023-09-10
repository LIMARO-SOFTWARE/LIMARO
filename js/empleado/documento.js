$(document).ready(function(){
    buscar();

     /**
     * Se realiza la consulta de los documentos vigentes para mostrar en la vistaEmpleado/consultas.frm.php
     */

     function buscar(){
        $.ajax({
            url:'../controladorEmpleado/documento.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tableDocumentoVigentesEmp'  class='table  table-striped table-bordered table-responsive '   >";
               datos += '<thead >';
                    datos += '<tr class="table-light border-primary ">';
                        datos += '<th  class="text-center align-middle border border-primary">MACROPROCESO</th>' ;
                        datos += '<th  class="text-center align-middle border border-primary " hidden>PROCESO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">TIPO DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">CÓDIGO Y NOMBRE DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">VERSIÓN</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">FECHA DE VIGENCIA</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">DESCARGAR DOCUMENTO</th>';
                    datos += '</tr>';
                datos +=  '</thead>';
                datos += '<tbody>';
                    $.each(json, function(key, value){
                        datos += '<tr class="align-middle" >';
                            datos += '<td class=" border border-primary  text-wrap" >' + value.macroproceso + '</td>';
                            datos += '<td class=" border border-primary text-center align-middle" hidden>'+value.proceso+'</td>'; 
                            datos += '<td class=" border border-primary text-center">'+value.tipo_documento+'</td>';
                            datos += '<td class=" border border-primary text-wrap">'+value.codigo+' '+value.nombre_documento+'</td>';
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
                        extend: 'pdfHtml5',
                        pageSize: 'LEGAL',
                        download: 'open',
                        title: 'Listado Maestro De Documentos Vigentess',
                        titleAttr: 'Listado Maestro De Documentos Vigentes',
                        messageTop: ' Listado Maestro De Documentos Vigentes',
                        text : '<i class="far fa-file-pdf"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6]
                        },
                        footer: true
                    },
                    {
                        extend: 'print',
                        title: 'Listado Maestro De Documentos Vigentes',
                        titleAttr: 'Listado Maestro De Documentos Vigentes',
                        messageTop: 'Listado Maestro De Documentos Vigentes',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6]
                        },
                        footer: true
                    },
                    {
                        extend: 'excelHtml5',
                        footer: true,
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        sheetName: 'Listado Maestro De Documentos',
                        title: 'Listado Maestro De Documentos Vigente',
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
});