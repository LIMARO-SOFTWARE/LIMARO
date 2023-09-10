<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/cargo.entidad.php";
include_once "../../modeloAdministrador/cargo.modelo.php";

$cargos = $_POST['txtCargo'];
$cargo =  ucwords($cargos);

if(!file_exists($_FILES['fileCargo']['tmp_name']) || !is_uploaded_file($_FILES['fileCargo']['tmp_name']))
{
    echo '
    <link rel="stylesheet" href="../../componente/css/globales/sweetalert2.min.css"> 
    <script src="../../componente/libreria/globales/sweetalert2.all.min.js"></script> 
    <script type="text/javascript" src="../../componente/libreria/globales/jquery-3.6.0.js"></script>
    <script>    
    jQuery(function(){
        Swal.fire({
            icon: "error",
            title: "Falta Información para crear el cargo",
            showConfirmButton: false,
            timer: 3000
            }).then(function() {
            window.location.href = "../../administrador/cargo.php";
        });
    });
    </script>';
}else{

    $foto=$_FILES["fileCargo"]["tmp_name"];
    $tipo =$_FILES['fileCargo']['type'];
    $tamaño =$_FILES['fileCargo']['size'];
    $directorio = "../../documentos/cargos/$cargo/";
   
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);
        $nombre = $_FILES['fileCargo']['name'];   
        move_uploaded_file($_FILES['fileCargo']['tmp_name'],$directorio.$nombre);        
    }else{
        if(file_exists($directorio)){
            $nombre = $_FILES['fileCargo']['name'];
            move_uploaded_file($_FILES['fileCargo']['tmp_name'],$directorio.$nombre);
        }    
    }
    $cargoE = new \entidad\Cargo(); 
    $cargoE -> setCargo($cargo);
    $cargoE -> setManualFunciones($nombre);

    $cargoM= new \modelo\Cargo($cargoE);
    $resultado = $cargoM->creacionCargo();

    unset($cargoE);
    unset($cargoM);

    if(($resultado !== null)){
        echo '
        <link rel="stylesheet" href="../../componente/css/globales/sweetalert2.min.css"> 
        <script src="../../componente/libreria/globales/sweetalert2.all.min.js"></script> 
        <script type="text/javascript" src="../../componente/libreria/globales/jquery-3.6.0.js"></script>
        <script>    
        jQuery(function(){
            Swal.fire({
                icon: "error",
                title: "Cargo ya creado",
                showConfirmButton: false,
                timer: 3000
                }).then(function() {
                window.location.href = "../../administrador/cargo.php";
            });
        });
        </script>';
    }else{

    echo '
        <link rel="stylesheet" href="../../componente/css/globales/sweetalert2.min.css"> 
        <script src="../../componente/libreria/globales/sweetalert2.all.min.js"></script> 
        <script type="text/javascript" src="../../componente/libreria/globales/jquery-3.6.0.js"></script>
        <script>    
        jQuery(function(){
            Swal.fire({
                icon: "success",
                title: "Cargo creado con éxito",
                showConfirmButton: false,
                timer: 3000
                }).then(function() {
                window.location.href = "../../administrador/cargo.php";
            });
        });
        </script>';
    }
}



?>  