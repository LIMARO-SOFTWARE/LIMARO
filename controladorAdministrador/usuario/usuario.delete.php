<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/usuario.entidad.php";
include_once "../../modeloAdministrador/usuario.modelo.php";


$id_usuario = $_POST['numidUsuElim'];
$estado = $_POST['estadoModusuario'];

$usuarioE = new \entidad\Usuario();
$usuarioE -> setIdusuario($id_usuario);
$usuarioE -> setEstado($estado);



$usuarioM= new \modelo\Usuario($usuarioE);
$resultado = $usuarioM->inactivarUsuario();

unset($usuarioE);
unset($usuarioM);


echo json_encode($resultado);

?>