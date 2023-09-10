<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/proceso.entidad.php";
include_once "../../modeloAdministrador/proceso.modelo.php";

$id_proceso = $_POST['numidProcesosElim'];
$estado = $_POST["estadoModProceso"];

$procesoE = new \entidad\Proceso();
$procesoE -> setIdProceso($id_proceso);
$procesoE -> setEstado($estado);

$procesoM= new \modelo\Proceso($procesoE);
$resultado = $procesoM->inactivarProceso();

unset($procesoE);
unset($procesoM);

echo json_encode($resultado);


?>