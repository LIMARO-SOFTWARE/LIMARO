<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/macroproceso.entidad.php";
include_once "../../modeloAdministrador/macroproceso.modelo.php";

$macroprocesos = $_POST['txtmacroproceso'];
$macroproceso =  ucwords($macroprocesos);

$objetivos = $_POST['txtObjetivoMacroproceso'];
$objetivo =  ucwords($objetivos);

if (!empty($macroprocesos) && !empty($objetivos)){

    $directorio = "../../documentos/macroprocesos/$macroproceso/";
   
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);        
    }

    $macroprocesoE = new \entidad\macroproceso();
    $macroprocesoE -> setMacroproceso($macroproceso);
    $macroprocesoE -> setObjetivo($objetivo);

    $macroprocesoM= new \modelo\macroproceso($macroprocesoE);
    $resultado = $macroprocesoM->crearmacroproceso();

    unset($macroprocesoE);
    unset($macroprocesoM);

    echo json_encode($resultado);
}



?>