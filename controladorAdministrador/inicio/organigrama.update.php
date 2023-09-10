<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/inicio.entidad.php";
include_once "../../modeloAdministrador/inicio.modelo.php";

$id_empresa=$_POST["numEmpresaOrganigrama"];

    
if(!file_exists($_FILES['fileOrg']['tmp_name']) || !is_uploaded_file($_FILES['fileOrg']['tmp_name']))
{
    echo '
    <link rel="stylesheet" href="../../componente/css/globales/sweetalert2.min.css"> 
        <script src="../../componente/libreria/globales/sweetalert2.all.min.js"></script> 
        <script type="text/javascript" src="../../componente/libreria/globales/jquery-3.6.0.js"></script>
        <script>    
    jQuery(function(){
        Swal.fire({
            icon: "error",
            title: "Falta información para actualizar el organigrama",
            showConfirmButton: false,
            timer: 3000
            }).then(function() {
                window.location.href = "../../administrador/inicio.php";
        });
    });
    </script>';
}else{
    if (isset($_FILES["fileOrg"]))
    {
        $foto=$_FILES["fileOrg"]["tmp_name"];
        $tipo =$_FILES['fileOrg']['type'];
        $tamaño =$_FILES['fileOrg']['size'];
        
        $directorio = "../../documentos/empresa/organigrama/";
    
        if(!file_exists($directorio)){
            mkdir($directorio,0777,true);
            $nombre = $_FILES['fileOrg']['name'];   
            move_uploaded_file($_FILES['fileOrg']['tmp_name'],$directorio.$nombre);        
        }else{
            if(file_exists($directorio)){
                $nombre = $_FILES['fileOrg']['name'];
                move_uploaded_file($_FILES['fileOrg']['tmp_name'],$directorio.$nombre);
            }    
        }
    }
    else{
        $nombre = NULL ;
    }


    $inicioE =new \entidad\Inicio();
    $inicioE->setIdEmpresa($id_empresa);
    $inicioE->setOrganigrama($nombre);

    $inicioM =new \modelo\Inicio($inicioE);

    $resultado =$inicioM->actualizarOrganigrama();


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
                title: "Organigrama actualizado con éxito",
                showConfirmButton: false,
                timer: 3000
                }).then(function() {
                window.location.href = "../../administrador/inicio.php";
            });
        });
        </script>';
    }
?>  