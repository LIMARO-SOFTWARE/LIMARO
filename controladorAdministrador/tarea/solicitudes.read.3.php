<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/solicitudes.entidad.php";
include_once "../../modeloAdministrador/solicitudes.modelo.php";

$empleado = $_SESSION['usuario'];


$solicitudesE = new \entidad\Solicitudes();
$solicitudesE -> setUsuario($empleado);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->asignada();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>
