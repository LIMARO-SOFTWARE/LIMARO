<?php
include_once "../../controladorLogin/logueo.read.php";
include_once "../../entidadAdministrador/usuario.entidad.php";
include_once "../../modeloAdministrador/usuario.modelo.php";
include_once "../../componente/Mailer/src/PHPMailer.php";
include_once "../../componente/Mailer/src/SMTP.php";
include_once "../../componente/Mailer/src/Exception.php";

 $nombre_completo  = $_POST['txtNombreEmpleado'];
 $correo_empleado  = $_POST['txtCorreoEmpleado'];
 $id_cargo  = $_POST['cargosUsuario'];
 $usuario  = $_POST['txtUsuario'];
 $clave  = $_POST['txtClaveInicial'];
 $id_rol  = $_POST['rolesUsuario'];
 $fechaActual = date("Y-m-d H-i-s");


try {

    $nombre_completo  = $_POST['txtNombreEmpleado'];
    $usuario  = $_POST['txtUsuario'];
    $emailTo =  $_POST['txtCorreoEmpleado'];
    $clave  = $_POST['txtClaveInicial'];
    $subject = "LIMARO - Creación De Usuario";
    $bodyEmail = "

FECHA: $fechaActual
PARA: $nombre_completo - Funcionario COOPEAIPE
DE: Area De Calidad
ASUNTO: Creación De Usuario

Su usuario dentro del sistema LIMARO SOFTWARE fue creado exitosamente con la siguiente información:

    Url de conexión: https://limaro.cloud/co/login/login.php
    Usuario: $usuario
   

Para ingresar por primera vez, el sistema solicitará activar el usuario, para lo cual debe dar clic en el botón 'Activar Usuario' y realizar cambio de contraseña; No olvide guardar la contraseña en un sitio seguro.

Bienvenido(a)

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