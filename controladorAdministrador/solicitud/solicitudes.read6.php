<?php

include_once "../../entidadAdministrador/solicitudes.entidad.php";
include_once "../../modeloAdministrador/solicitudes.modelo.php";
include_once "../../controladorLogin/logueo.read.php";

$solicitudesE = new \entidad\Solicitudes();

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->read6();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>