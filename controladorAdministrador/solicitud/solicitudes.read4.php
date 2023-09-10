<?php


include_once "../../entidadAdministrador/solicitudes.entidad.php";
include_once "../../modeloAdministrador/solicitudes.modelo.php";
include_once "../../controladorLogin/logueo.read.php";

$id_empleado = $_SESSION['id_empleado'];

$solicitudesE = new \entidad\Solicitudes();
$solicitudesE -> setIdEmpleado($id_empleado);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->read4();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>