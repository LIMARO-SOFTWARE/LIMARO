<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/solicitudes.entidad.php";
include_once "../../modeloAdministrador/solicitudes.modelo.php";

$idsolicitud = $_POST['numIdSolicitud2'];  
$funcionario_asignado = $_POST['empleado'];  

$solicitudesE = new \entidad\Solicitudes();
$solicitudesE -> setIdSolicitud($idsolicitud);
$solicitudesE -> setFuncionarioAsignado($funcionario_asignado);
    
$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->funcionarioCrear();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>