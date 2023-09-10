<?php

include_once "../entidadLogin/login.entidad.php";
include_once "../modeloLogin/login.modelo.php";

$usuario = $_POST['txtUsuarioAct'];
$clave = $_POST['txtClaveAct'];

$loginE = new \entidad\Login();
$loginE->setUsuario($usuario);
$loginE->setClave($clave);

$loginM = new \modelo\Login($loginE);
$resultado = $loginM->newpass();

unset($loginE);
unset($loginM);

echo json_encode($resultado);


?>