<?php
include_once "../entidadEmpleado/solicitudes.entidad.php";
include_once "../modeloEmpleado/solicitudes.modelo.php";
include_once "../controladorLogin/logueo.read.php";

include_once "../componente/Mailer/src/PHPMailer.php";
include_once "../componente/Mailer/src/SMTP.php";
include_once "../componente/Mailer/src/Exception.php";

if (isset($_FILES["fileActualizacion"]))
{  
$id_empleado = $_SESSION['id_empleado'];
$usuario = $_SESSION['usuario'];
$codigo = $_POST['codigo'];
$id_tipoDocumento = $_POST['idTipoDoc1'];
$id_prioridad = $_POST['prioridad1'];
$solicitud = $_POST['solicitud1'];
$fechaActual = date("Y-m-d H-i-s");

    $directorio = "../documentos/usuarios/$usuario/solicitudes/$fechaActual/";
   
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);
        $nombre = $_FILES['fileActualizacion']['name'];   
        move_uploaded_file($_FILES['fileActualizacion']['tmp_name'],$directorio.$nombre);        
    }else{
        if(file_exists($directorio)){
            $nombre = $_FILES['fileActualizacion']['name'];
            move_uploaded_file($_FILES['fileActualizacion']['tmp_name'],$directorio.$nombre);
        }    
    }

$solicitudesE = new \entidad\Solicitudes(); 
$solicitudesE -> setIdEmpleado($id_empleado);
$solicitudesE -> setCodigo($codigo);
$solicitudesE -> setPrioridad($id_prioridad);
$solicitudesE -> setIdTipoDocumento($id_tipoDocumento);
$solicitudesE -> setSolicitud($solicitud);
$solicitudesE -> setDocumento($nombre); 
$solicitudesE -> setRuta($fechaActual); 
$solicitudesE -> setUsuarioComentario($usuario);


$solicitudesM= new \modelo\Solicitudes($solicitudesE);
$resultado = $solicitudesM->solicitudActualizacion();

}else{
$id_empleado = $_SESSION['id_empleado'];
$usuario = $_SESSION['usuario'];
$codigo = $_POST['codigo'];
$id_tipoDocumento = $_POST['idTipoDoc1'];
$id_prioridad = $_POST['prioridad1'];
$solicitud = $_POST['solicitud1'];
$fechaActual = date("Y-m-d H-i-s");
$nombre = null ;

    $directorio = "../documentos/usuarios/$usuario/solicitudes/$fechaActual/";
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);
    }else{
        if(file_exists($directorio)){
        }    
    }

$solicitudesE = new \entidad\Solicitudes(); 
$solicitudesE -> setIdEmpleado($id_empleado);
$solicitudesE -> setCodigo($codigo);
$solicitudesE -> setPrioridad($id_prioridad);
$solicitudesE -> setIdTipoDocumento($id_tipoDocumento);
$solicitudesE -> setSolicitud($solicitud);
$solicitudesE -> setDocumento($nombre); 
$solicitudesE -> setRuta($fechaActual); 
$solicitudesE -> setUsuarioComentario($usuario);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);
$resultado = $solicitudesM->solicitudActualizacion();
}

unset($solicitudesE);
unset($solicitudesM);

if(empty($retorno)){
    $usuario = $_SESSION['nombre_completo'];
    $correo = $_SESSION['correo_empleado'];
    $fechaActual = date("Y-m-d H-i-s");
try {
    $emailTo =  $correo;
    $subject = "LIMARO - Notificación De Solicitud Creada con Éxito";
    $bodyEmail = "
FECHA: $fechaActual
PARA: $usuario - Funcionario COOPEAIPE
DE: Area De Calidad
ASUNTO: Notificación De Solicitud Creada con Éxito

Estimado(a)  $usuario,

Cordial Saludo,

Me permito informar que su solicitud de actualización de documento fue recibida con éxito.

Atentamente,

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

    $mail ->Subject = $subject;
    $mail ->Body =$bodyEmail;

    if(!$mail->send()){
        // echo ("no enviado"); 
    }else{
        echo '
        <link rel="stylesheet" href="../componente/css/globales/sweetalert2.min.css"> 
        <script src="../componente/libreria/globales/sweetalert2.all.min.js"></script> 
        <script type="text/javascript" src="../componente/libreria/globales/jquery-3.6.0.js"></script>
        <script>    
        jQuery(function(){
            Swal.fire({
                icon: "success",
                title: "Solicitud de Actualización de Documento creada con Éxito ",
                showConfirmButton: false,
                timer: 2000
                }).then(function() {
                window.location.href = "../empleado/solicitudes.php";
            });
        });
        </script>';
    }
    } catch (Exception $e) {
        
    }
}

if(empty($retorno)){

$correo = $_SESSION['correo_empleado'];
$fechaActual = date("Y-m-d H-i-s");
$usuario = $_SESSION['nombre_completo'];
$id_prioridad = $_POST['prioridad1'];
$solicitud = $_POST['solicitud1'];
try {
    $emailTo =  "notificaciones@limaro.cloud";
    $subject = "LIMARO - Notificación De Solicitud Creada";
    $bodyEmail = "
FECHA: $fechaActual
PARA: Area De Calidad
DE: $usuario - Funcionario COOPEAIPE
ASUNTO: Notificación De Solicitud Creada con Éxito

Se recibio la siguiente solicitud:

Funcionario : $usuario
Prioridad: $id_prioridad
Tipo de Solicitud: Actulización de Documento
Solicitud: $solicitud

Atentamente,

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

$mail ->Subject = $subject;
$mail ->Body =$bodyEmail;

if(!$mail->send()){
    // echo ("no enviado"); 
}else{
    // echo (""); 
}
} catch (Exception $e) {
    
}

}

?>  