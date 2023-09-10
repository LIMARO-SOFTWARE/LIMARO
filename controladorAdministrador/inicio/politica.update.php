<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/inicio.entidad.php";
include_once "../../modeloAdministrador/inicio.modelo.php";

$id_empresa = $_POST['numEmpresaModPol'];
$politica_calidad = $_POST['txtPoliMod'];

if (!empty($politica_calidad)) 
	{
            $inicioE = new \entidad\Inicio();
            $inicioE -> setIdEmpresa($id_empresa);
            $inicioE -> setPoliticaCalidad($politica_calidad);

            $inicioM= new \modelo\Inicio($inicioE);
            $resultado = $inicioM->actualizarPoliticaEmpresa();

            unset($inicioE);
            unset($inicioM);

            echo json_encode($resultado);
    }

?>