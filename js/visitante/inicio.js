$(document).ready(function(){
    buscar();

    function buscar(){
        $.ajax({
            url:'../controladorEmpleado/inicio.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){

            mision = '';
            vision= '';
            politica_calidad= '';
            objetivos_calidad= '';
            organigrama ='';
            $.each(json, function(key, value){
                mision = '<h5>'+value.mision+'</h5>';
                vision = '<h5>'+value.vision+'</h5>';
                politica_calidad = '<h5>'+value.politica_calidad+'</h5>';
                objetivos_calidad = '<h5>'+value.objetivos_calidad+'</h5>';
                $("#organigrama").attr('src','../documentos/empresa/organigrama/'+value.organigrama); 
                $("#mapaProcesos").attr('src','../documentos/empresa/mapaProcesos/'+value.mapa_procesos); 
            });
        
        $('#mision').html(mision);
        $('#vision').html(vision);
        $('#politica').html(politica_calidad);
        $('#objetivo').html(objetivos_calidad);
        }).fail(function(xhr, status, error){
        $('#mision').html(error);
        $('#vision').html(error);
        $('#politica').html(error);
        $('#objetivo').html(error);
        $('#organigrama').html(error);
        });
    }



});