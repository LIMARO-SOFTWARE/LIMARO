<?php

include_once "../entidadEmpleado/inicio.entidad.php";
include_once "../modeloEmpleado/inicio.modelo.php";

$inicioE = new \entidad\Inicio();
$inicioM= new \modelo\Inicio($inicioE);

$resultado = $inicioM->read();

unset($inicioE);
unset($inicioM);

echo json_encode($resultado);


?>