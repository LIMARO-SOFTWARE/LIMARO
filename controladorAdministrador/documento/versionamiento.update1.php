<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/documento.entidad.php";
include_once "../../modeloAdministrador/documento.modelo.php";

$id_documento = $_POST['idDocumentoAct'];
$estado = $_POST['estadoObs1'];
$version_Ant = $_POST['versionObs'];

$documentoE = new \entidad\Documento();
$documentoE -> setIdDocumento($id_documento);
$documentoE -> setEstado($estado);
$documentoE -> setVersionAnte($version_Ant);

$documentoM= new \modelo\Documento($documentoE);
$resultado = $documentoM->activarVersion();

unset($documentoE);
unset($documentoM);

echo json_encode($resultado);


?>