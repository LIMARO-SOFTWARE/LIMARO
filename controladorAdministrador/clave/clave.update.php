<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/usuario.entidad.php";
include_once "../../modeloAdministrador/usuario.modelo.php";

$id_usuario = $_POST['numIdUsurioMoClave'];
$clave = $_POST['txtClaveMod']; 

$usuarioE = new \entidad\Usuario();
$usuarioE -> setIdUsuario($id_usuario);
$usuarioE -> setClave($clave);


$usuarioM= new \modelo\Usuario($usuarioE);
$resultado = $usuarioM->newpass();

unset($usuarioE);
unset($usuarioM);

echo json_encode($resultado);

?>