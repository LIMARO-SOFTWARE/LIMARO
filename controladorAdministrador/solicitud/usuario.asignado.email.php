<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/solicitudes.entidad.php";
include_once "../../modeloAdministrador/solicitudes.modelo.php";
include_once "../../componente/Mailer/src/PHPMailer.php";
include_once "../../componente/Mailer/src/SMTP.php";
include_once "../../componente/Mailer/src/Exception.php";

 $nombre_completo  = $_POST['empleado'];
 $correo_empleado  = $_POST['empleadoCorreo'];
 $fechaActual = date("Y-m-d H-i-s");

try {

    $usuario  = $_POST['empleado'];
    $emailTo =  $_POST['empleadoCorreo'];
    $subject = "LIMARO - Asignación de Solicitud";
    $bodyEmail = "

FECHA: $fechaActual
PARA: $nombre_completo - Funcionario COOPEAIPE
DE: Area De Calidad
ASUNTO: Asignación de Solicitud

Cordial Saludo,

Se le ha asignado una solicitud para su desarrollo.

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
    //    echo ("no enviado"); 
    }

    // echo ("enviado"); 



} catch (Exception $e) {
    
}



?>  