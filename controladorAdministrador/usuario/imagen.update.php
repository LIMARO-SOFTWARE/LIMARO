<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/usuario.entidad.php";
include_once "../../modeloAdministrador/usuario.modelo.php";

$id_empleado = $_SESSION['id_empleado'];
$usuario = $_SESSION['usuario'];
 
 if (isset($_FILES["fileImagenPerfilUs"]))
{
    $foto=$_FILES["fileImagenPerfilUs"]["tmp_name"];
    $tipo =$_FILES['fileImagenPerfilUs']['type'];
    $tamaño =$_FILES['fileImagenPerfilUs']['size'];
    
    $directorio = "../../documentos/usuarios/$usuario/imagen/";
   
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);
        $nombre = $_FILES['fileImagenPerfilUs']['name'];   
        move_uploaded_file($_FILES['fileImagenPerfilUs']['tmp_name'],$directorio.$nombre);        
    }else{
        if(file_exists($directorio)){
            $nombre = $_FILES['fileImagenPerfilUs']['name'];
            move_uploaded_file($_FILES['fileImagenPerfilUs']['tmp_name'],$directorio.$nombre);
        }    
    }
}


$usuario =new \entidad\Usuario();
$usuario->setIdEmpleado($id_empleado);
$usuario->setImgEmpleado($nombre);
$usuarioM =new \modelo\Usuario($usuario);

$retorno =$usuarioM->updateImg();


unset($usuario);
unset($usuarioM);

echo '
    <link rel="stylesheet" href="../../componente/css/globales/sweetalert2.min.css"> 
    <script src="../../componente/libreria/globales/sweetalert2.all.min.js"></script> 
    <script type="text/javascript" src="../../componente/libreria/globales/jquery-3.6.0.js"></script>
    <script>    
    jQuery(function(){
        Swal.fire({
            icon: "success",
            title: "¡Imagen actualizada con éxito ...! Inicie sesión nuevamente ",
            showConfirmButton: false,
            timer: 3000
            }).then(function() {
            window.location.href = "../../login/login.php";
        });
    });
    </script>';
?>  