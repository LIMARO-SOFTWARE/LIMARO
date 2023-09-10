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

function empresa (id_empresa, nombre_empresa){
    $("#numEmpresaMod").val(id_empresa);
    $("#txtempresaMod").val(nombre_empresa);
}

function logo (id_empresa){
    $("#numEmpresaMod1").val(id_empresa);
}

function organigramas (id_empresa){
    $("#numEmpresaOrganigrama").val(id_empresa);
}

function misions (id_empresa,mision){
    $("#numEmpresaModMis").val(id_empresa);
    $("#txtMisionMod").val(mision);
}

function visions (id_empresa,vision){
    $("#numEmpresaModvis").val(id_empresa);
    $("#txtVisiomMod").val(vision);
}

function politica (id_empresa,politica_calidad){
    $("#numEmpresaModPol").val(id_empresa);
    $("#txtPoliMod").val(politica_calidad);
}

function objetivos (id_empresa,objetivos_calidad){
    $("#numEmpresaModObj").val(id_empresa);
    $("#txtObjMod").val(objetivos_calidad);
}

function mapaprocesos (id_empresa){
    $("#numEmpresaMapa").val(id_empresa);
}

$(document).ready(function(){
    buscar();

     /// MUESTRA LOS DATOS EN LA PANTALLA INICIO///
    function buscar(){
        $.ajax({
            url:'../controladorAdministrador/inicio/inicio.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
            mision = '';
            empresas = '';
            vision= '';
            politica_calidad= '';
            objetivos_calidad= '';
            organigrama ='';
            logos ='';
            mapa_procesos='';
            $.each(json, function(key, value){
                if(value.mision !== null){
                    mision += '<h5>'+value.mision+'</h5>';
                    mision += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="misions('+value.id_empresa+',\''+value.mision+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalmis"><i class="far fa-edit"></i> Modificar </button>';
                }else{
                    value.mision = "";
                    mision +='<h5>Debe ingresar la misión</h5>'; 
                    mision += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="misions('+value.id_empresa+',\''+value.mision+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalmis"><i class="far fa-edit"></i> Modificar </button>';
                }

                if(value.vision !== null){
                    vision = '<h5>'+value.vision+'</h5>';
                    vision += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="visions('+value.id_empresa+',\''+value.vision+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalVis"><i class="far fa-edit"></i> Modificar </button>';
                 }else{
                    value.vision = "";
                    vision='<h5>Debe ingresar la visión</h5>';
                    vision += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="visions('+value.id_empresa+',\''+value.vision+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalVis"><i class="far fa-edit"></i> Modificar </button>';
                 }

                 if(value.nombre_empresa !== null){
                    empresas += '<h5>'+value.nombre_empresa+'</h5>';
                    empresas += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="empresa('+value.id_empresa+',\''+value.nombre_empresa+'\')" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-edit"></i> Modificar </button>'; 
                 }else{
                    value.nombre_empresa = "";
                    empresas='<h5>Debe ingresar el nombre de la empresa</h5>';
                    empresas += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="empresa('+value.id_empresa+',\''+value.nombre_empresa+'\')" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-edit"></i> Modificar </button>';
                 }

                 if(value.politica_calidad !== null){
                    politica_calidad = '<h5>'+value.politica_calidad+'</h5>';
                    politica_calidad += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="politica('+value.id_empresa+',\''+value.politica_calidad+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalPol"><i class="far fa-edit"></i> Modificar </button>';    
                 }else{
                     value.politica_calidad = "";
                    politica_calidad='<h5>Debe ingresar la política de calidad</h5>';
                    politica_calidad += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="politica('+value.id_empresa+',\''+value.politica_calidad+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalPol"><i class="far fa-edit"></i> Modificar </button>'; 
                 }

                 if(value.objetivos_calidad !== null){  
                    objetivos_calidad = '<h5>'+value.objetivos_calidad+'</h5>';
                    objetivos_calidad += '<button type="button" style="width:270px" class="btn btn-primary  text-center" onclick="objetivos('+value.id_empresa+',\''+value.objetivos_calidad+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalObj"><i class="far fa-edit"></i> Modificar </button>';
                 }else{
                    value.objetivos_calidad = "";
                    objetivos_calidad='<h5>Debe ingresar el objetivo de calidad</h5>';
                    objetivos_calidad += '<button type="button" style="width:270px" class="btn btn-primary  text-center" onclick="objetivos('+value.id_empresa+',\''+value.objetivos_calidad+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalObj"><i class="far fa-edit"></i> Modificar </button>';
                 }

                 if(value.logo !== null){
                    logos +=' <img id="logo" class="rounded d-block zoom1"  alt="..." src="../documentos/empresa/logo/'+value.logo+'">';
                    logos +='<br>';
                    logos +='<button type="button" style="width:270px" class="btn btn-primary" onclick="logo('+value.id_empresa+')" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="far fa-edit"></i> Modificar </button>';
                 }else{
                    logos='<h5>Debe ingresar el logo</h5>';
                    logos +='<br>';
                    logos +='<button type="button" style="width:270px" class="btn btn-primary" onclick="logo('+value.id_empresa+')" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="far fa-edit"></i> Modificar </button>';
                 }

                 if(value.organigrama !== null){
                    organigrama +='<img id="organigrama" class="rounded mx-auto d-block zoom" alt="..." src="../documentos/empresa/organigrama/'+value.organigrama+'"></img>';
                    organigrama +='<br>';
                    organigrama +='<button type="button" style="width:50%" class="btn btn-primary" onclick="organigramas('+value.id_empresa+')" data-bs-toggle="modal" data-bs-target="#exampleModalorganigrama"><i class="far fa-edit"></i> Modificar </button>';
                }else{
                    organigrama='<h5>Debe ingresar el organigrama</h5>';
                    organigrama +='<br>';
                    organigrama +='<button type="button" style="width:50%" class="btn btn-primary" onclick="organigramas('+value.id_empresa+')" data-bs-toggle="modal" data-bs-target="#exampleModalorganigrama"><i class="far fa-edit"></i> Modificar </button>';
                }

                if(value.mapa_procesos !== null){
                    mapa_procesos +='<img id="mapaprocesos" class="rounded mx-auto d-block zoom" alt="..." src="../documentos/empresa/mapaProcesos/'+value.mapa_procesos+'"></img>';
                    mapa_procesos +='<br>';
                    mapa_procesos +='<button type="button" style="width:50%" class="btn btn-primary" onclick="mapaprocesos('+value.id_empresa+')" data-bs-toggle="modal" data-bs-target="#exampleModalmapaprocesos"><i class="far fa-edit"></i> Modificar </button>';
                }else{
                    mapa_procesos='<h5>Debe ingresar el mapa procesos</h5>';
                    mapa_procesos +='<br>';
                    mapa_procesos +='<button type="button" style="width:50%" class="btn btn-primary" onclick="mapaprocesos('+value.id_empresa+')" data-bs-toggle="modal" data-bs-target="#exampleModalmapaprocesos"><i class="far fa-edit"></i> Modificar </button>';
                }
            });
        
            $('#empresa').html(empresas);
            $('#mision').html(mision);
            $('#vision').html(vision);
            $('#politica').html(politica_calidad);
            $('#objetivo').html(objetivos_calidad); 
            $('#btnModificarLogo').html(logos); 
            $('#btnModificarOrganigrama').html(organigrama); 
            $('#btnModificarMapa').html(mapa_procesos); 
        }).fail(function(xhr, status, error){
            $('#mision').html(error);
            $('#vision').html(error);
            $('#politica').html(error);
            $('#objetivo').html(error);
            $('#organigrama').html(error);
        });
    }

    /// MODIFICAR NOMBRE EMPRESA ///
    $(document).on('click','#btnModificarNomEmp',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/inicio/empresa.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarEmpre').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Nombre de la Empresa Actualizado con Éxito',
                    showConfirmButton: false,
                    timer: 2500
                  }).then((result) => {
                   window.location.reload();
                  });
            }).fail(function(xhr, status, error){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar el nombre de la empresa',
                });
        });
    });

    /// MODIFICAR MISION ///
    $(document).on('click','#btnModificarMisionEmp',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/inicio/mision.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarMision').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Misión Actualizada con Éxito',
                    showConfirmButton: false,
                    timer: 2500
                }).then((result) => {
                       window.location.reload();
                    });
            }).fail(function(xhr, status, error){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar la misión de la empresa',
                });
        });
    });

    /// MODIFICAR VISION ///
    $(document).on('click','#btnModificarvisionEmp',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/inicio/vision.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarVision').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Visión Actualizada con Éxito',
                    showConfirmButton: false,
                    timer: 2500
                    }).then((result) => {
                       window.location.reload();
                      });
            }).fail(function(xhr, status, error){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar la visión de la empresa',
                });
        });
    });

    /// MODIFICAR POLITICA CALIDAD ///
    $(document).on('click','#btnModificarPoliEmp',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/inicio/politica.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarPolitica').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Política  de Calidad Actualizada con Éxito',
                    showConfirmButton: false,
                    timer: 2500
                    }).then((result) => {
                       window.location.reload();
                      })
            }).fail(function(xhr, status, error){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar la política de calidad de la empresa',
                });
        })
    })

    /// MODIFICAR OBJETIVO DE CALIDAD ///
    $(document).on('click','#btnModificarObjetivoEmp',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/inicio/objetivos.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarObjetivo').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Objetivo de Calidad Actualizado con Éxito',
                    showConfirmButton: false,
                    timer: 2500
                    }).then((result) => {
                       window.location.reload();
                      })
            }).fail(function(xhr, status, error){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar el objetivo de calidad de la empresa',
                });
        })
    })

})

