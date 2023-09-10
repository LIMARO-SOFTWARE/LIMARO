<?php
date_default_timezone_set('America/Bogota');

include_once "../../entidadAdministrador/solicitudes.entidad.php";
include_once "../../modeloAdministrador/solicitudes.modelo.php";
include_once "../../controladorLogin/logueo.read.php";

$usuario = $_SESSION['usuario'];
$idsolicitud = $_POST['numIdSolicitud3'];  
$fechaActual = date("Y-m-d H-i-s");

$solicitudesE = new \entidad\Solicitudes();
$solicitudesE -> setUsuario($usuario);
$solicitudesE -> setIdSolicitud($idsolicitud);
$solicitudesE -> setCarpeta($fechaActual);

$directorio = "../../documentos/usuarios/$usuario/tareas/$idsolicitud/$fechaActual/";

if(!file_exists($directorio)){
    mkdir($directorio,0777,true);
    
}else{
    if(file_exists($directorio)){

    }    
}


$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->tareaCrear();


unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>  