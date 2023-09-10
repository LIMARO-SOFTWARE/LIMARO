<?php

date_default_timezone_set('America/Bogota');

include_once "../../entidadAdministrador/solicitudes.entidad.php";
include_once "../../modeloAdministrador/solicitudes.modelo.php";
include_once "../../controladorLogin/logueo.read.php";

include_once "../../componente/Mailer/src/PHPMailer.php";
include_once "../../componente/Mailer/src/SMTP.php";
include_once "../../componente/Mailer/src/Exception.php";


$id_tarea=  $_POST['idTarea2Dev'];
$id_solicitud = $_POST['numIdSolicitudComDev'];
$usuario_comentario = $_SESSION['usuario'];
$comentarios = $_POST['comentarioTarea'];
$comentarios1 =  ucwords($comentarios);
$text="Devolución: ";
$comentario = $text.$comentarios1;
$usuario_tarea_estado = $_POST['empleadoDev'];
$ruta= $_POST['rutaDev'];
$correo= $_POST['empleadoCorreoDev'];
$fechaActual = date("Y-m-d H-i-s");

$directorio = "../../documentos/usuarios/$usuario_tarea_estado/tareas/$id_solicitud/$ruta/";

if(!file_exists($directorio)){
    mkdir($directorio,0777,true);
    $nombre = $_FILES['fileTarea']['name'];   
    move_uploaded_file($_FILES['fileTarea']['tmp_name'],$directorio.$nombre);        
}else{
    if(file_exists($directorio)){
        $nombre = $_FILES['fileTarea']['name'];
        move_uploaded_file($_FILES['fileTarea']['tmp_name'],$directorio.$nombre);
    }    
}

$solicitudesE = new \entidad\Solicitudes(); 
$solicitudesE -> setIdTarea($id_tarea);
$solicitudesE -> setIdSolicitud($id_solicitud);
$solicitudesE -> setUsuarioComentario($usuario_comentario);
$solicitudesE -> setComentario($comentario);
$solicitudesE -> setUsuarioTareaEstado($usuario_tarea_estado);
$solicitudesE -> setRuta($ruta);
$solicitudesE -> setDocumentoTarea($nombre);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);
$resultado = $solicitudesM->tareaDevuelta();
$resultado = $solicitudesM->comentarioTareaElaborada();
$resultado = $solicitudesM->actualizarTareaEstadoApr();

unset($solicitudesE);
unset($solicitudesM);

if(($resultado !== null)){
    echo '
    <link rel="stylesheet" href="../../componente/css/globales/sweetalert2.min.css"> 
    <script src="../../componente/libreria/globales/sweetalert2.all.min.js"></script> 
    <script type="text/javascript" src="../../componente/libreria/globales/jquery-3.6.0.js"></script>
    <script>    
    jQuery(function(){
        Swal.fire({
            icon: "error",
            title: "Error al devolver la tarea",
            showConfirmButton: false,
            timer: 3000
            }).then(function() {
            window.location.href = "../../administrador/tareasApr.php";
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
            title: "Tarea devuelta con éxito",
            showConfirmButton: false,
            timer: 3000
            }).then(function() {
            window.location.href = "../../administrador/tareasApr.php";
        });
    });
    </script>';
}

try {

    
    $usuario_tarea_estado = $_POST['empleadoDev'];
    $emailTo =  $_POST['empleadoCorreoDev'];
    $subject = "LIMARO - Devolución de Tarea";
    $bodyEmail = "


FECHA: $fechaActual
PARA: $usuario_tarea_estado - Funcionario COOPEAIPE
DE: Area De Calidad
ASUNTO: Devolución de Tarea

Cordial Saludo,

Se ha devuelto una tarea para su gestión.

Cordialmente,

LIMARO SOFTWARE - Software de gestión ISO 9001:2015 con funcionalidad de control de documentos

Este correo es de tipo informativo, agradecemos no dar respuesta a este mensaje ya que es generado de manera automática y no es un canal oficial de comunicación de LIMARO SOFTWARE.";
    
    $fromemail = "notificaciones@limaro.cloud";
    $fromname = "LIMARO";
    $host = "mail.limaro.cloud";
    $port ="465";
    $SMTPAuth = true;
    $SMTPSecure = "ssl";
    $password ="Dralei89%";
    $IsHTML=true;


    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail ->IsSMTP();
    $mail ->SMTPDebug = 0;
    $mail ->SMTPAuth  =  $SMTPAuth;
    $mail ->SMTPSecure = $SMTPSecure;
    $mail ->Host =  $host;
    $mail ->Port = $port; 
    $mail ->IsHTML = $IsHTML; 
    $mail->CharSet  ="utf-8";
    $mail->SMTPKeepAlive = true;
    $mail ->Username =  $fromemail;
    $mail ->Password =  $password;

    $mail ->setFrom($fromemail, $fromname);
    $mail ->addAddress($emailTo);

    // $mail ->isSMTP(true);
    $mail ->Subject = $subject;
    $mail ->Body =$bodyEmail;

    if(!$mail->send()){
      
    }
} catch (Exception $e) {
    
}


?>