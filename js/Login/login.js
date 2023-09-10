$(document).ready(function () {
    $(document).on('click', '#btnLogin', function () {
        $.ajax({
            url: '../controladorLogin/login.read.php',
            type: 'POST',
            datatype: 'JSON',
            data: $('#LoginF').serialize(),
        }).done(function (json) {
            var obj = JSON.parse(json);
            if ((document.getElementById('txtUsuario').value ==="") && (document.getElementById('txtClave').value ==="")){
                Swal.fire({
                    icon: 'error',
                    showConfirmButton: false,
                    title: '¡Campo usuario y contraseña vacío!',
                    timer: 2000
                });
            }else if (document.getElementById('txtUsuario').value ==="") {
                    Swal.fire({
                        icon: 'error',
                        showConfirmButton: false,
                        title: '¡Campo usuario vacío!',
                        timer: 2000
                    });
            }else if (document.getElementById('txtClave').value ==="") {
                    Swal.fire({
                        icon: 'error',
                        showConfirmButton: false,
                        title: '¡Campo contraseña vacío!',
                        timer: 2000
                    });
            }else if (obj[0] !== null) {
                if(obj[0].estadoUsuario =="ACTIVO"){
                    if (obj[0].id_rol ==1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Te damos la bienvenida '+obj[0].nombre_completo,
                            showConfirmButton: false,
                            timer: 2500
                          }).then((result) => {
                             window.location= "../administrador/inicio.php";
                          });
                    }else if (obj[0].id_rol ==2) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Te damos la bienvenida '+obj[0].nombre_completo , 
                            showConfirmButton: false,
                            timer: 2500
                          }).then((result) => {
                             window.location= "../empleado/inicio.php";
                          });
                    }else if (obj[0].id_rol ==3) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Te damos la bienvenida '+obj[0].nombre_completo , 
                            showConfirmButton: false,
                            timer: 2500
                          }).then((result) => {
                             window.location= "../visitante/inicio.php";
                          });
                        }
                }else if(obj[0].estadoUsuario =="CREADO"){
                    Swal.fire({
                        icon: 'error',
                        title: '¡Usuario No Activo!',
                        showConfirmButton: false,
                        timer: 2500
                      });
                }else if(obj[0].estadoUsuario =="INACTIVO"){
                    Swal.fire({
                        icon: 'error',
                        title: '¡Usuario Inhabilitado!',
                        showConfirmButton: false,
                        timer: 2500
                      });
                }else if(obj[0].rolEstado =="INACTIVO"){
                    Swal.fire({
                        icon: 'error',
                        title: 'Rol Inhabilitado!',
                        showConfirmButton: false,
                        timer: 2500
                      });
                } 
            }else{
                Swal.fire({
                    icon: 'error',
                    title: '¡Usuario o contraseña incorrecta!',
                    showConfirmButton: false,
                    timer: 2500
                });
            }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: '¡Por favor Ingrese La Información Correcta!',
                showConfirmButton: false,
                timer: 2500
            });
        });
    });


    /// ACTIVAR USUARIO///
    $(document).on('click','#btnActUsu',function(event){
        event.preventDefault();
        $.ajax({
            url:'../controladorLogin/clave.update.php',
            type: 'POST',
            dataType: 'json',
            data : $('#actUsu').serialize(),
        }).done(function(json){
            if(json =='1'){
                Swal.fire({                  
                    icon: 'success',
                    title: 'Usuario Activado con Exito... Por Favor Inicie Sesion',
                    showConfirmButton: false,
                    timer: 2500
                }).then((result) => {
                     window.location= "../login/login.php";
                });
            }else  if(json =='0')
            {
                Swal.fire({     
                    icon: 'error',             
                    title: 'Usuario ya se encuentra Activo  o esta Inhabilitado',
                    showConfirmButton: false,
                    timer: 2500
                }).then((result) => {
                     window.location= "../login/login.php";
                });
            }
        }).fail(function(xhr, status, error){
            Swal.fire({                  
                icon: 'error',
                title: 'Digete los campos completos del formulario',
                showConfirmButton: false,
                timer: 2500
            }).then((result) => {
                 window.location= "../login/login.php";
            });
        });
    });
});