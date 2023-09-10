<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/tipoDocumento.entidad.php";
include_once "../../modeloAdministrador/tipoDocumento.modelo.php";

$tipoDocumentoE = new \entidad\TipoDocumento();
$tipoDocumentoM= new \modelo\TipoDocumento($tipoDocumentoE);

$resultado = $tipoDocumentoM->read();

unset($tipoDocumentoE);
unset($tipoDocumentoM);

echo json_encode($resultado);


?>