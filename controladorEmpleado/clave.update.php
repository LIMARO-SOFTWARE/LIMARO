<?php

include_once "../entidadEmpleado/usuario.entidad.php";
include_once "../modeloEmpleado/usuario.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$id_usuario = $_SESSION['id_usuario'];
$clave = $_POST['txtNuevaClaveEmplA']; 

if (!empty($clave)) 
	{

    $usuarioE = new \entidad\Usuario();
    $usuarioE -> setIdUsuario($id_usuario);
    $usuarioE -> setClave($clave);


    $usuarioM= new \modelo\Usuario($usuarioE);
    $resultado = $usuarioM->newpass();

    unset($usuarioE);
    unset($usuarioM);

    echo json_encode($resultado);
    }
?>