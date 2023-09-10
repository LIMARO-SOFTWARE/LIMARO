<?php

include_once "../entidadLogin/login.entidad.php";
include_once "../modeloLogin/login.modelo.php";

session_start();

$usuario = $_POST['txtUsuario'];
$clave = $_POST['txtClave'];

$loginE = new \entidad\Login();
$loginE->setUsuario($usuario);
$loginE->setClave($clave);

$loginM = new \modelo\Login($loginE);
$retorno = $loginM->read();

if (empty($retorno)) {
    $retorno[0] = null;
} else {
    if (array_key_exists('usuario', $retorno[0])) {
        $_SESSION['id_usuario'] = $retorno[0]['id_usuario'];
        $_SESSION['usuario'] = $retorno[0]['usuario'];
        $_SESSION['id_rol'] = $retorno[0]['id_rol'];
        $_SESSION['rol'] = $retorno[0]['rol'];
        $_SESSION['id_empleado'] = $retorno[0]['id_empleado'];
        $_SESSION['nombre_completo'] = $retorno[0]['nombre_completo'];
        $_SESSION['correo_empleado'] = $retorno[0]['correo_empleado'];
        $_SESSION['img_empleado'] = $retorno[0]['img_empleado'];
        $_SESSION['cargo'] = $retorno[0]['cargo'];
        $_SESSION['id_cargo'] = $retorno[0]['id_cargo'];
        $_SESSION['manual_funciones'] = $retorno[0]['manual_funciones'];
        $_SESSION['nombre_empresa'] = $retorno[0]['nombre_empresa'];
        $_SESSION['logo'] = $retorno[0]['logo'];
    }
}

unset($loginE);
unset($loginM);

echo json_encode($retorno);

?>