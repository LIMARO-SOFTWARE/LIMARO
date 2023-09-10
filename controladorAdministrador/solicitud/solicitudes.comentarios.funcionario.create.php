<?php

include_once "../../entidadAdministrador/solicitudes.entidad.php";
include_once "../../modeloAdministrador/solicitudes.modelo.php";
include_once "../../controladorLogin/logueo.read.php";

$usuario = $_SESSION['usuario'];
$idsolicitud = $_POST['numIdSolicitud2'];  

$solicitudesE = new \entidad\Solicitudes();
$solicitudesE -> setUsuarioComentario($usuario);
$solicitudesE -> setIdSolicitud($idsolicitud);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->comentariosCrear1();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>  