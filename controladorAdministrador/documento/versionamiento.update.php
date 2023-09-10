<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/documento.entidad.php";
include_once "../../modeloAdministrador/documento.modelo.php";

$id_documento = $_POST['idDocumento2'];
$estado = $_POST['estadoObs'];

$documentoE = new \entidad\Documento();
$documentoE -> setIdDocumento($id_documento);
$documentoE -> setEstado($estado);

$documentoM= new \modelo\Documento($documentoE);
$resultado = $documentoM->obsoleto();

unset($documentoE);
unset($documentoM);

echo json_encode($resultado);


?>