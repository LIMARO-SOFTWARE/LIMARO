<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/macroproceso.entidad.php";
include_once "../../modeloAdministrador/macroproceso.modelo.php";

$id_macroproceso = $_POST['numMacroMod'];

$macroproceso = $_POST['txtMacroprocesoMod'];
$macroprocesoAnt = $_POST['txtMacroprocesoModAnt'];

$objetivo = $_POST['txtObjetivoMod'];


 if ((!empty($macroproceso)) && (!empty($objetivo)) ){

    $directorio = "../../documentos/macroprocesos/$macroprocesoAnt/";
    $directorioNew = "../../documentos/macroprocesos/$macroproceso/";

    rename ($directorio, $directorioNew);

    $macroprocesoE = new \entidad\macroproceso();
    $macroprocesoE -> setIdMacroproceso($id_macroproceso);
    $macroprocesoE -> setMacroproceso($macroproceso);
    $macroprocesoE -> setObjetivo($objetivo);

    $macroprocesoM= new \modelo\macroproceso($macroprocesoE);
    $resultado = $macroprocesoM->actualizarmacroproceso();

    unset($macroprocesoE);
    unset($macroprocesoM);

    echo json_encode($resultado);
 }

?>