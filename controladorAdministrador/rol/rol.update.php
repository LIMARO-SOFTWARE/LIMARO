<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/rol.entidad.php";
include_once "../../modeloAdministrador/rol.modelo.php";

$id_rol = $_POST['numidRolMod'];
$rol = $_POST['txtRolMod'];

$rolE = new \entidad\Rol();
$rolE -> setIdRol($id_rol);
$rolE -> setRol($rol);

$rolM= new \modelo\Rol($rolE);
$resultado = $rolM->actualizarRol();

unset($rolE);
unset($rolM);

echo json_encode($resultado);


?>