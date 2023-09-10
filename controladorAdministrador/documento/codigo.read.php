<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/documento.entidad.php";
include_once "../../modeloAdministrador/documento.modelo.php";

$proceso = $_POST['siglasProcDoc'];
$tipoDoc = $_POST['siglasTipDoc12'];
$sl = "-";
$codigo = $proceso.$sl.$tipoDoc;

$documentoE = new \entidad\Documento();
$documentoE -> setCodigo($codigo);

$documentoM= new \modelo\Documento($documentoE);
$resultado = $documentoM->codigo();

unset($documentoE);
unset($documentoM);

echo json_encode($resultado);


?>