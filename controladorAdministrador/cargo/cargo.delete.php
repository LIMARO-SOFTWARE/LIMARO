<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/cargo.entidad.php";
include_once "../../modeloAdministrador/cargo.modelo.php";


$id_cargo = $_POST['numidCargoElim'];
$estado = $_POST['estadoModCargo'];

$cargoE = new \entidad\Cargo();
$cargoE -> setIdcargo($id_cargo);
$cargoE -> setEstado($estado);



$cargoM= new \modelo\Cargo($cargoE);
$resultado = $cargoM->inactivarCargo();

unset($cargoE);
unset($cargoM);


echo json_encode($resultado);

?>