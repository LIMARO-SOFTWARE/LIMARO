<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/inicio.entidad.php";
include_once "../../modeloAdministrador/inicio.modelo.php";

$id_empresa = $_POST['numEmpresaModvis'];
$vision = $_POST['txtVisiomMod'];

if (!empty($vision)) 
{
    $inicioE = new \entidad\Inicio();
    $inicioE -> setIdEmpresa($id_empresa);
    $inicioE -> setvision($vision);

    $inicioM= new \modelo\Inicio($inicioE);
    $resultado = $inicioM->actualizarVisionEmpresa();

    unset($inicioE);
    unset($inicioM);

    echo json_encode($resultado);

}


?>