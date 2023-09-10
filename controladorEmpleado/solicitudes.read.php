<?php

include_once "../entidadEmpleado/solicitudes.entidad.php";
include_once "../modeloEmpleado/solicitudes.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$id_empleado = $_SESSION['id_empleado'];

$solicitudesE = new \entidad\Solicitudes();
$solicitudesE -> setIdEmpleado($id_empleado);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->read();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>