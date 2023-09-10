<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/macroproceso.entidad.php";
include_once "../../modeloAdministrador/macroproceso.modelo.php";

$id_macroproceso = $_POST['numidMacroprocesosElim'];
$estado = $_POST["estadoModMacroproceso"];

$macroprocesoE = new \entidad\macroproceso();
$macroprocesoE -> setIdmacroproceso($id_macroproceso);
$macroprocesoE -> setEstado($estado);

$macroprocesoM= new \modelo\macroproceso($macroprocesoE);
$resultado = $macroprocesoM->inactivarmacroproceso();

unset($macroprocesoE);
unset($macroprocesoM);

echo json_encode($resultado);


?>