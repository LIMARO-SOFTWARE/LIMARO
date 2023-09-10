<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/macroproceso.entidad.php";
include_once "../../modeloAdministrador/macroproceso.modelo.php";

$macroprocesoE = new \entidad\macroproceso();
$macroprocesoM= new \modelo\macroproceso($macroprocesoE);

$resultado = $macroprocesoM->read();

unset($macroprocesoE);
unset($macroprocesoM);

echo json_encode($resultado);


?>