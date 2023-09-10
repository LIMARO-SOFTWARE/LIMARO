<?php
include_once "../../ontroladorLogin/logueo.read.php";
include_once "../../ntidadAdministrador/rol.entidad.php";
include_once "../../odeloAdministrador/rol.modelo.php";

$id_rol = $_POST['numidRolElim'];
$estado = $_POST["estadoModRol"];

$rolE = new \entidad\Rol();
$rolE -> setIdRol($id_rol);
$rolE -> setEstado($estado);

$rolM= new \modelo\Rol($rolE);
$resultado = $rolM->inactivarRol();

unset($rolE);
unset($rolM);

echo json_encode($resultado);


?>