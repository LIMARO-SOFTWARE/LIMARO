<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/documento.entidad.php";
include_once "../../modeloAdministrador/documento.modelo.php";


$nombre_documento = $_GET['term'];

$documentoE = new \entidad\Documento();
$documentoE->setNombreDocumento($nombre_documento);
$documentoM= new \modelo\documento($documentoE);

$resultado = $documentoM->autocomplete();

unset($documentoE);
unset($documentoM);

echo json_encode($resultado);




?>