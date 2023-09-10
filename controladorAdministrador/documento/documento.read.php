<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/documento.entidad.php";
include_once "../../modeloAdministrador/documento.modelo.php";

$documentoE = new \entidad\Documento();
$documentoM= new \modelo\Documento($documentoE);

$resultado = $documentoM->readed();

unset($documentoE);
unset($documentoM);

echo json_encode($resultado);


?>