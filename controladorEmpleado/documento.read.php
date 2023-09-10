<?php

include_once "../entidadEmpleado/documento.entidad.php";
include_once "../modeloEmpleado/documento.modelo.php";


$documentoE = new \entidad\Documento();
$documentoM= new \modelo\Documento($documentoE);

$resultado = $documentoM->read();

unset($documentoE);
unset($documentoM);

echo json_encode($resultado);


?>