<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/tipoDocumento.entidad.php";
include_once "../../modeloAdministrador/tipoDocumento.modelo.php";

$tipo_documentos = $_POST['txtTipoDocumento'];
$tipo_documento =  ucwords($tipo_documentos);
$sigla_tipo_documentos = $_POST['txtSiglaTipoDocumento'];
$sigla_tipo_documento = strtoupper($sigla_tipo_documentos);

if ((!empty($tipo_documento)) && (!empty($sigla_tipo_documento))) 
{
    $tipoDocumentoE = new \entidad\TipoDocumento();
    $tipoDocumentoE -> setTipoDocumento($tipo_documento);
    $tipoDocumentoE -> setSiglaTipoDocumento($sigla_tipo_documento);

    $tipoDocumentoM= new \modelo\TipoDocumento($tipoDocumentoE);
    $resultado = $tipoDocumentoM->creartipoDocumento();

    unset($tipoDocumentoE);
    unset($tipoDocumentoM);

    echo json_encode($resultado);
}

?>