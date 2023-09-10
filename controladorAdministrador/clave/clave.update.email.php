<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/usuario.entidad.php";
include_once "../../modeloAdministrador/usuario.modelo.php";
include_once "../../componente/Mailer/src/PHPMailer.php";
include_once "../../componente/Mailer/src/SMTP.php";
include_once "../../componente/Mailer/src/Exception.php";

 $nombre_completo  = $_POST['NombreMoClave'];
 $correo_empleado  = $_POST['CorreoUsurioMoClave'];
 $usuario  = $_POST['UsurioMoClave'];
 $fechaActual = date("Y-m-d H-i-s");

try {

    $usuario  = $_POST['UsurioMoClave'];
    $emailTo =  $_POST['CorreoUsurioMoClave'];
    $subject = "LIMARO - Restablecimiento Contraseña de usuario";
    $bodyEmail = "

FECHA: $fechaActual
PARA: $nombre_completo - Funcionario COOPEAIPE
DE: Area De Calidad
ASUNTO: Restablecimiento Contraseña de Usuario

Su solicitud de restablecimiento de Contraseña dentro del sistema LIMARO SOFTWARE fue realizado exitosamente con la siguiente información:

    Url de conexión: https://limaro.cloud/co/login/login.php
    Usuario: $usuario
  
Para ingresar nuevamente, el sistema solicitará activar el usuario, para lo cual debe dar clic en el botón 'Activar Usuario' y realizar cambio de clave; No olvide guardar la clave en un sitio seguro.

Cordialmente,

LIMARO SOFTWARE - Software de gestión ISO 9001:2015 con funcionalidad de control de documentos.

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
    $mail ->SMTPDebug = 1;
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
    }else{
        //   echo ("enviado");
    }

   



} catch (Exception $e) {
    
}



?>  