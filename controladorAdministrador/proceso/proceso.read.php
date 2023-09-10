<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/proceso.entidad.php";
include_once "../../modeloAdministrador/proceso.modelo.php";

$procesoE = new \entidad\Proceso();
$procesoM= new \modelo\Proceso($procesoE);

$resultado = $procesoM->read();

unset($procesoE);
unset($procesoM);

echo json_encode($resultado);


?>