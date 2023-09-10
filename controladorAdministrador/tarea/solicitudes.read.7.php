<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/solicitudes.entidad.php";
include_once "../../modeloAdministrador/solicitudes.modelo.php";

$usuario = $_SESSION['usuario'];

$solicitudesE = new \entidad\Solicitudes();
$solicitudesE -> setUsuario($usuario);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->revisarTarea();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>
