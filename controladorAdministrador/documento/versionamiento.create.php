<?php

date_default_timezone_set('America/Bogota');

include_once "../../entidadAdministrador/documento.entidad.php";
include_once "../../modeloAdministrador/documento.modelo.php";
include_once "../../controladorLogin/logueo.read.php";

include_once "../../entidadAdministrador/usuario.entidad.php";
include_once "../../modeloAdministrador/usuario.modelo.php";
include_once "../../componente/Mailer/src/PHPMailer.php";
include_once "../../componente/Mailer/src/SMTP.php";
include_once "../../componente/Mailer/src/Exception.php";

$id_documento=  $_POST['idDocumento1'];
$macroproceso = $_POST['macroproceso'];
$proceso = $_POST['proceso1'];
$tipDocCon = $_POST['tipo'];
$codigo = $_POST['codigo1'];
$numero_version_ante = $_POST['versionAnt'];
$numero_version = $_POST['versionSig1'];
$nombre_documento = $_POST['documentoNam'];
$descripcion_version = $_POST['descriCambio1'];
$usuario_creacion = $_POST['usuarioCreacion'];
$fecha_creacion = $_POST['fechaCreacion'];
$usuario_revision = $_POST['usuarioRevision'];
$fecha_revision = $_POST['fechaRevision'];
$usuario_aprobacion = $_POST['usuarioAprobacion'];
$fecha_aprobacion = $_POST['fechaAprobacion'];
$documentos = $_POST['documento'];

$foto=$_FILES["fileDocumento"]["tmp_name"];
$tipo =$_FILES['fileDocumento']['type'];
$tamaño =$_FILES['fileDocumento']['size'];

$directorio = "../../documentos/macroprocesos/$macroproceso/$proceso/$tipDocCon/$codigo/$numero_version/";

if(!file_exists($directorio)){
    mkdir($directorio,0777,true);
    $nombre = $_FILES['fileDocumento']['name'];   
    move_uploaded_file($_FILES['fileDocumento']['tmp_name'],$directorio.$nombre);        
}else{
    if(file_exists($directorio)){
        chmod($directorio,0777);
        $nombre = $_FILES['fileDocumento']['name'];
        move_uploaded_file($_FILES['fileDocumento']['tmp_name'],$directorio.$nombre);
    }    
}

$documentoE = new \entidad\documento(); 

$documentoE -> setNumeroVersion($numero_version);
$documentoE -> setIdDocumento($id_documento);
$documentoE -> setDescripcionVersion($descripcion_version);
$documentoE -> setUsuarioCreacion($usuario_creacion);
$documentoE -> setFechaCreacion($fecha_creacion);
$documentoE -> setUsuarioRevision($usuario_revision);
$documentoE -> setFechaRevision($fecha_revision);
$documentoE -> setUsuarioAprobacion($usuario_aprobacion);
$documentoE -> setFechaAprobacion($fecha_aprobacion);
$documentoE -> setDocumento($nombre);
$documentoE -> setVersionAnte($numero_version_ante);

$documentoM= new \modelo\documento($documentoE);
$resultado = $documentoM->creacionVersionamiento();
$resultado = $documentoM->actualizarVersionamiento();

unset($documentoE);
unset($documentoM);

if(empty($retorno)){
    $usuarioE = new \entidad\Usuario();
    $usuarioM= new \modelo\Usuario($usuarioE);
    $resultado = $usuarioM->usuariosCorreos();
    $fechaActual = date("Y-m-d H-i-s");

    if($resultado !== null){

    for($i = 0; $i < count($resultado); $i++) {

        $usuario['nombre_completo']=$resultado[$i]['nombre_completo'];
        $correo_empleado['correo_empleado']=$resultado[$i]['correo_empleado'];
        $usuarios= implode( ',', $usuario );

    try {
    
        $emailTo =   implode( ',', $correo_empleado );
        $subject = "LIMARO - Actualización de Documento";
        $bodyEmail = "
FECHA: $fechaActual
PARA: $usuarios - Funcionario COOPEAIPE
DE: Area De Calidad
ASUNTO: Envió de Información De Documento Actualizado

Estimado(a)  $usuarios,

Cordial Saludo,

Me permito informar que el siguiente documento se encuentran actualizado para que sea consultado y aplicado:

  TIPO: $documentos
  CÓDIGO: $codigo
  NOMBRE: $nombre_documento
  VERSIÓN: $numero_version 
  FECHA DE ACTUALIZACIÓN: $fecha_aprobacion
        
Los cambios básicos están con letras en color verde, pero se recomienda leer en su totalidad el documento si lo desconoce o ha olvidado su contenido. Si todo el documento esta con letras de color negra, es porque el documento fue actualizado en su totalidad o es un documento nuevo.

Es obligación leer y difundir la información contenida en cada documento. UNA VEZ REPRODUCIDO O IMPRESO ESTE DOCUMENTO SE CONSIDERA COPIA NO CONTROLADA.

Favor tener en cuenta las siguientes instrucciones:

1.Una vez se tenga el documento favor, LEERLO en su totalidad Y COMPRENDERLO   y una vez comprendido asegúrese que las personas involucradas en los procesos los conozcan y cumplan. 

2.Para la lectura, entendimiento y aplicación del documento se da un plazo máximo de tres (3) días, a partir de la fecha de recibido este correo. Si él documento es de aplicación INMEDIATA su plazo máximo será de un (1) día. Los documentos referenciados que se citan hacen parte integral del mismo.

3.Por ningún motivo los documentos deben ser reproducidas ni utilizadas para objetivos distintos a las necesidades del trabajo. Por su carácter normativo los documentos son de obligatorio cumplimiento

4.Los documentos son una herramienta de trabajo cuya vigencia es importante mantener en todo momento; por ello las actualizaciones que demande deben ser efectuadas con el mayor cuidado y prontitud. Toda observación tendiente al mejoramiento de su contenido es de fundamental importancia, por lo tanto, debe darse a conocer oportunamente a la subgerencia administrativa mediante comunicación escrita o correo electrónico quien se encargará de coordinar con el área de calidad (OYM) la actualización, mejora, modificación o creación del documento.

5.Si se relacionan documentos que deben ser descargados al computador del funcionario, este proceso se debe realizar de manera obligatoria una vez conocido el documento. El contenido y diseño de los documentos no deben ser modificados por ningún motivo. Si hay algún aporte o sugerencia para mejorarlos remitirla a la subgerencia administrativa mediante comunicación escrita o correo electrónico quien se encargará de coordinar con el área de calidad (OYM) la actualización, mejora, modificación o creación del formato.

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
    //    echo ("enviado");
    }
    } catch (Exception $e) {
        
    }
                
        }
    
}


}

 echo '
        <link rel="stylesheet" href="../../componente/css/globales/sweetalert2.min.css"> 
        <script src="../../componente/libreria/globales/sweetalert2.all.min.js"></script> 
        <script type="text/javascript" src="../../componente/libreria/globales/jquery-3.6.0.js"></script>
        <script>    
            jQuery(function(){
                Swal.fire({
                    icon: "success",
                    title: "Versionamiento Creado con Éxito",
                    showConfirmButton: false,
                    timer: 3000
                    }).then(function() {
                    window.location.href = "../../administrador/versionamiento.php";
                });
            });
        </script>';
        


?>