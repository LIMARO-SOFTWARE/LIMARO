<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/tipoDocumento.entidad.php";
include_once "../../modeloAdministrador/tipoDocumento.modelo.php";

$id_tipo_documento = $_POST['numidTipoDocumentoMod'];
$tipo_documento = $_POST['txtTipoDocumentoMod'];
$sigla_tipo_documento = $_POST['txtSiglaTipoDocumentoMod'];


$tipo_documentoE = new \entidad\TipoDocumento();
$tipo_documentoE -> setIdTipoDocumento($id_tipo_documento);
$tipo_documentoE -> setTipoDocumento($tipo_documento);
$tipo_documentoE -> setSiglaTipoDocumento($sigla_tipo_documento);

$tipo_documentoM= new \modelo\TipoDocumento($tipo_documentoE);
$resultado = $tipo_documentoM->actualizarTipodocumento();

unset($tipo_documentoE);
unset($tipo_documentoM);

echo json_encode($resultado);


?>