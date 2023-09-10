<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/cargo.entidad.php";
include_once "../../modeloAdministrador/cargo.modelo.php";

$cargoE = new \entidad\Cargo();
$cargoM= new \modelo\Cargo($cargoE);

$resultado = $cargoM->read();

unset($cargoE);
unset($cargoM);

echo json_encode($resultado);


?>