<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/tipoDocumento.entidad.php";
include_once "../../modeloAdministrador/tipoDocumento.modelo.php";

$id_tipo_Documento = $_POST['numidTipDocElim'];
$estado = $_POST["estadoModTipdoc"];

$tipoDocumentoE = new \entidad\TipoDocumento();
$tipoDocumentoE -> setIdTipoDocumento($id_tipo_Documento);
$tipoDocumentoE -> setEstado($estado);

$tipoDocumentoM= new \modelo\TipoDocumento($tipoDocumentoE);
$resultado = $tipoDocumentoM->inactivarTipoDocumento();

unset($tipoDocumentoE);
unset($tipoDocumentoM);

echo json_encode($resultado);


?>