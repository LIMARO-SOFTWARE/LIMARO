<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/inicio.entidad.php";
include_once "../../modeloAdministrador/inicio.modelo.php";

$id_empresa=$_POST["numEmpresaMapa"];

if(!file_exists($_FILES['fileMap']['tmp_name']) || !is_uploaded_file($_FILES['fileMap']['tmp_name']))
{
    echo '
    <link rel="stylesheet" href="../../componente/css/globales/sweetalert2.min.css"> 
    <script src="../../componente/libreria/globales/sweetalert2.all.min.js"></script> 
    <script type="text/javascript" src="../../componente/libreria/globales/jquery-3.6.0.js"></script>
    <script>    
    jQuery(function(){
        Swal.fire({
            icon: "error",
            title: "Falta información para actualizar el mapa de procesos",
            showConfirmButton: false,
            timer: 3000
            }).then(function() {
                window.location.href = "../../administrador/inicio.php";
        });
    });
    </script>';
}else{
if (isset($_FILES["fileMap"]))
{
    $foto=$_FILES["fileMap"]["tmp_name"];
    $tipo =$_FILES['fileMap']['type'];
    $tamaño =$_FILES['fileMap']['size'];
    
    $directorio = "../../documentos/empresa/mapaProcesos/";
   
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);
        $nombre = $_FILES['fileMap']['name'];   
        move_uploaded_file($_FILES['fileMap']['tmp_name'],$directorio.$nombre);        
    }else{
        if(file_exists($directorio)){
            $nombre = $_FILES['fileMap']['name'];
            move_uploaded_file($_FILES['fileMap']['tmp_name'],$directorio.$nombre);
        }    
    }
}
else{
    $nombre = NULL ;
}


$inicioE =new \entidad\Inicio();
$inicioE->setIdEmpresa($id_empresa);
$inicioE->setMapaProcesos($nombre);

$inicioM =new \modelo\Inicio($inicioE);

$resultado =$inicioM->actualizarMapaProcesos();


unset($inicioE);
unset($inicioM);


echo '
    <link rel="stylesheet" href="../../componente/css/globales/sweetalert2.min.css"> 
    <script src="../../componente/libreria/globales/sweetalert2.all.min.js"></script> 
    <script type="text/javascript" src="../../componente/libreria/globales/jquery-3.6.0.js"></script>
    <script>    
    jQuery(function(){
        Swal.fire({
            icon: "success",
            title: "Mapa de Proceso actualizado con éxito",
            showConfirmButton: false,
            timer: 3000
            }).then(function() {
                window.location.href = "../../administrador/inicio.php";
        });
    });
    </script>';
}
?>