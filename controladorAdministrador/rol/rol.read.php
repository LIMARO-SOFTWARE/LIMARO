<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/rol.entidad.php";
include_once "../../modeloAdministrador/rol.modelo.php";

$rolE = new \entidad\Rol();
$rolM= new \modelo\Rol($rolE);

$resultado = $rolM->read();

unset($rolE);
unset($rolM);

echo json_encode($resultado);


?>