
$(document).ready(function(){

     /// CAMBIO DE CONTRASEÑA POR EL EMPLEADO ///
     $(document).on('click','#btnModClavEmpl',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorEmpleado/clave.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#modifClaveUsu').serialize(),
            }).done(function(json){
                Swal.fire({                  
                    icon: 'success',
                    title: 'Contraseña actualizada con éxito... Por favor inicie sesión nuevamente',
                    showConfirmButton: false,
                    timer: 3000
                    }).then((result) => {
                        window.location.href = "../Login/login.php";
                    });
            }).fail(function(xhr, status, error){
                Swal.fire({                  
                    icon: 'error',
                    title: 'Contraseña no actualizada',
                    showConfirmButton: true,
                    })
        });
    });


});