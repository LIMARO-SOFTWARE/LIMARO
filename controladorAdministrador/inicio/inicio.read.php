<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/inicio.entidad.php";
include_once "../../modeloAdministrador/inicio.modelo.php";

$inicioE = new \entidad\Inicio();
$inicioM= new \modelo\Inicio($inicioE);

$resultado = $inicioM->read();

unset($inicioE);
unset($inicioM);

echo json_encode($resultado);


?>