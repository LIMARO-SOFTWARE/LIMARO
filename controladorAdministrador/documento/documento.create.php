<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/documento.entidad.php";
include_once "../../modeloAdministrador/documento.modelo.php";


$macroproceso = $_POST['macroNombre'];
$id_proceso = $_POST['idProc12'];
$proceso = $_POST['procesoNom'];
$sigla_proceso =  $_POST['siglasProcDoc'];
$id_tipo_documento = $_POST['idTipoDoc12'];
$tipo_documento =  $_POST['tipoDocNom'];
$sigla_tipo_documento =  $_POST['siglasTipDoc12'];
$codigo = $_POST['txtcodigo'];
$s ="-";
$e =" ";
$codigoConca = $sigla_proceso.$s.$sigla_tipo_documento.$s.$codigo;
$nombre_documentos = $_POST['nombreDoc'];   
$nombre_documento = strtoupper($nombre_documentos);
$usuario_crecion = $_SESSION['usuario'];
$objetivo_documento = $_POST['txtObjetivoproceso'];

if ((!empty($macroproceso)) || (!empty($proceso)) || (!empty($sigla_tipo_documento)) || (!empty($codigo)) || (!empty($nombre_documentos)) || (!empty($objetivo_documento)) )
{
    $directorio = "../../documentos/macroprocesos/$macroproceso/$sigla_proceso/$sigla_tipo_documento/$codigoConca/0/";
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);       
    }else{
        if(file_exists($directorio)){
        }    
    }
    
    $documentoE = new \entidad\Documento(); 
    $documentoE -> setIdProceso($id_proceso);
    $documentoE -> setIdTipoDocumento($id_tipo_documento);
    $documentoE -> setCodigo($codigoConca);
    $documentoE -> setNombreDocumento($nombre_documento);
    $documentoE -> setUsuarioCreacion($usuario_crecion);
    $documentoE -> setObjetivoDocumento($objetivo_documento);
    
    $documentoM= new \modelo\Documento($documentoE);
    $resultado = $documentoM->creaciondocumento();
    
    unset($documentoE);
    unset($documentoM);
    
    
    echo json_encode($resultado);
}


?>  