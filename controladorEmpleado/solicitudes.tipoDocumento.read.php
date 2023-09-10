<?php

include_once "../entidadEmpleado/solicitudes.entidad.php";
include_once "../modeloEmpleado/solicitudes.modelo.php";


$solicitudesE = new \entidad\Solicitudes();

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->tipoDocumento();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>  