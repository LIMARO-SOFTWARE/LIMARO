<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/inicio.entidad.php";
include_once "../../modeloAdministrador/inicio.modelo.php";

$id_empresa = $_POST['numEmpresaMod'];
$nombre_empresa = $_POST['txtempresaMod'];

if (!empty($nombre_empresa)) 
	{
        $inicioE = new \entidad\Inicio();
        $inicioE -> setIdEmpresa($id_empresa);
        $inicioE -> setNombreEmpresa($nombre_empresa);

        $inicioM= new \modelo\Inicio($inicioE);
        $resultado = $inicioM->actualizarNombreEmpresa();

        unset($inicioE);
        unset($inicioM);

        echo json_encode($resultado);
    }

?>