<?php

include_once "../entidadEmpleado/solicitudes.entidad.php";
include_once "../modeloEmpleado/solicitudes.modelo.php";


$idsolicitud = $_POST['numIdSolicitud'];  

$solicitudesE = new \entidad\Solicitudes();
$solicitudesE -> setIdSolicitud($idsolicitud);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->comentarios();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>  