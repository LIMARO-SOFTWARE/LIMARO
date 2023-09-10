<?php

include_once "../../entidadAdministrador/solicitudes.entidad.php";
include_once "../../modeloAdministrador/solicitudes.modelo.php";
include_once "../../controladorLogin/logueo.read.php";

$idsolicitud = $_POST['numIdSolicitud'];  

$solicitudesE = new \entidad\Solicitudes();
$solicitudesE -> setIdSolicitud($idsolicitud);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->comentarios();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>  