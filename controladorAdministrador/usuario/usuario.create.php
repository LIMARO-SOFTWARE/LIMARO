<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/usuario.entidad.php";
include_once "../../modeloAdministrador/usuario.modelo.php";

$nombre_completos  = $_POST['txtNombreEmpleado'];
$nombre_completo =  ucwords($nombre_completos);

$correo_empleados  = $_POST['txtCorreoEmpleado'];
$correo_empleado =  strtolower($correo_empleados);

$id_cargo  = $_POST['cargosUsuario'];

$usuarios  = $_POST['txtUsuario'];
$usuario =  strtolower($usuarios);

$clave  = $_POST['txtClaveInicial'];
$id_rol  = $_POST['rolesUsuario'];


if ((!empty($nombre_completo)) && (!empty($correo_empleado)) && (!empty($id_cargo))  && (!empty($usuario)) &&(!empty($clave)) &&(!empty($id_rol))  ) {
    if (filter_var($correo_empleado, FILTER_VALIDATE_EMAIL)) {

        $directorio = "../../documentos/usuarios/$usuario/imagen/";

        if(!file_exists($directorio)){
            mkdir($directorio,0777,true);
            copy("../../documentos/imagenes/usuario.png","../../documentos/usuarios/$usuario/imagen/usuario.png");     
        }
        
        $usuarioE = new \entidad\Usuario(); 
        $usuarioE -> setNombreCompleto($nombre_completo);
        $usuarioE -> setCorreoEmpleado($correo_empleado);
        $usuarioE -> setIdCargo($id_cargo);
        $usuarioE -> setUsuario($usuario);
        $usuarioE -> setClave($clave);
        $usuarioE -> setIdRol($id_rol);
        
        $usuarioM= new \modelo\Usuario($usuarioE);
        $resultado = $usuarioM->creacionUsuario();
        
        unset($usuarioE);
        unset($usuarioM);
        
        echo json_encode($resultado);
    }
}





?>  