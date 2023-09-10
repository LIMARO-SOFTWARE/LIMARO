<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/usuario.entidad.php";
include_once "../../modeloAdministrador/usuario.modelo.php";

$id_usuario = $_POST['numIdUsuMod'];

$nombre_completos = $_POST['txtNombreMod'];
$nombre_completo =  ucwords($nombre_completos);

$correo_empleados = $_POST['txtCorreoMod'];
$correo_empleado =  strtolower($correo_empleados);

if (empty($nombre_completos)) 
{

}else if(empty($correo_empleados)){

}else{

    if (filter_var($correo_empleados, FILTER_VALIDATE_EMAIL)) {

        if (isset($_POST['cargosUsuarioAct']))
        {
            $cargo = $_POST['cargosUsuarioAct'];
        }
        else{
            $cargo = $_POST['idCargoActuUsuAnt'];
        }

        if (isset($_POST['rolesUsuarioAct']))
        {
            $rol = $_POST['rolesUsuarioAct'];
        }
        else{
            $rol = $_POST['idRolActuUsuAnt'];
        }

        $usuarioE = new \entidad\Usuario();

        $usuarioE -> setIdUsuario($id_usuario);
        $usuarioE -> setNombreCompleto($nombre_completos);
        $usuarioE -> setCorreoEmpleado($correo_empleados);
        $usuarioE -> setIdCargo($cargo);
        $usuarioE -> setIdRol($rol);


        $usuarioM= new \modelo\Usuario($usuarioE);
        $resultado = $usuarioM->actualizarUsuario();

        unset($usuarioE);
        unset($usuarioM);

        echo json_encode($resultado);
    }
}
?>