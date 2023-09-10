<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/usuario.entidad.php";
include_once "../../modeloAdministrador/usuario.modelo.php";

$empleado  = $_POST['empleado'];

$usuarioE = new \entidad\Usuario();
$usuarioE -> setUsuario($empleado);

$usuarioM= new \modelo\Usuario($usuarioE);

$resultado = $usuarioM->read3();

unset($usuarioE);
unset($usuarioM);

echo json_encode($resultado);


?>