<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/usuario.entidad.php";
include_once "../../modeloAdministrador/usuario.modelo.php";

$usuarioE = new \entidad\Usuario();
$usuarioM= new \modelo\Usuario($usuarioE);

$resultado = $usuarioM->read();

unset($usuarioE);
unset($usuarioM);

echo json_encode($resultado);


?>