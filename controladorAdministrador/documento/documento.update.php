<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/documento.entidad.php";
include_once "../../modeloAdministrador/documento.modelo.php";

$id_documento = $_POST['idDocumentoNod'];
$nombre_documento = $_POST['nombreModif'];
$objetivo = $_POST['objetivoModif'];

if ((!empty($nombre_documento))  || (!empty($objetivo)) )
{
    $documentoE = new \entidad\Documento();

    $documentoE -> setIdDocumento($id_documento);
    $documentoE -> setNombreDocumento($nombre_documento);
    $documentoE -> setObjetivoDocumento($objetivo);

    $documentoM= new \modelo\Documento($documentoE);
    $resultado = $documentoM->actualizarNombreDoc();

    unset($documentoE);
    unset($documentoM);

    echo json_encode($resultado);
}

?>