<?php

namespace modelo;
use PDO;
use Exception;

include_once '../../entidadAdministrador/solicitudes.entidad.php';
include_once '../../entorno/conexionSingleton.php';

class Solicitudes{
    
     public $id_solicitud;
     public $solicitud;
     public $id_empleado;
     public $id_prioridad;
     public $prioridad;
     public $id_tipo_documento;
     public $tipo_documento;
     public $id_estatus_solicitud;
     public $estatus_solicitud;
     public $id_tipo_solicitud;
     public $tipo_solicitud;
     public $documento;
     public $codigo;
     public $carpeta;
     public $funcionario_asignado;
     public $usuario;
     public $id_comentarios_solicitud;
     public $comentario;
     public $usuario_comentario;
     public $fecha_comentario;

     public $id_tarea_estado;
     public $id_tarea;
     public $usuario_tarea_estado;
     public $fecha_tarea_estado;
     public $tarea_estado;
     public $ruta;
     public $documento_tarea;

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;

     public function __construct(\entidad\Solicitudes $solicitudesE)
     {
          $this->id_solicitud = $solicitudesE->getIdSolicitud();
          $this->solicitud = $solicitudesE->getSolicitud();
          $this->id_empleado = $solicitudesE->getIdEmpleado();
          $this->id_prioridad = $solicitudesE->getIdPrioridad();
          $this->prioridad = $solicitudesE->getPrioridad();
          $this->id_tipo_documento = $solicitudesE->getIdTipoDocumento();
          $this->tipo_documento = $solicitudesE->getTipoDocumento();
          $this->id_estatus_solicitud = $solicitudesE->getIdEstatusSolicitud();
          $this->estatus_solicitud = $solicitudesE->getEstatusSolicitud();
          $this->id_tipo_solicitud = $solicitudesE->getIdTipoSolicitud();
          $this->tipo_solicitud = $solicitudesE->getTipoSolicitud();
          $this->documento = $solicitudesE->getDocumento();
          $this->codigo = $solicitudesE->getCodigo();
          $this->carpeta = $solicitudesE->getCarpeta();
          $this->usuario = $solicitudesE->getUsuario();
          $this->funcionario_asignado = $solicitudesE -> getFuncionarioAsignado();
          
          $this->id_comentarios_solicitud = $solicitudesE->getIdComentariosSolicitud();
          $this->comentario = $solicitudesE->getComentario();
          $this->usuario_comentario = $solicitudesE->getUsuarioComentario();
          $this->fecha_comentario = $solicitudesE->getFechaComentario();

          $this->id_tarea_estado = $solicitudesE->getIdTareaEstado();
          $this->id_tarea = $solicitudesE->getIdTarea();
          $this->usuario_tarea_estado = $solicitudesE->getUsuarioTareaEstado();
          $this->fecha_tarea_estado = $solicitudesE->getFechaTareaEstado();
          $this->tarea_estado = $solicitudesE->getTareaEstado();
          $this->ruta = $solicitudesE->getRuta();
          $this->documento_tarea = $solicitudesE->getDocumentoTarea();

          $this->conexion = \Conexion::singleton();
     }

     public function read()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_solicitud`,
               sl.`fecha_asignacion`,
               sl.`ruta`,
               sl.`documento`,
               sl.`funcionario_asignado`,
               sl.`estado_solicitud`,
               us.`usuario`
          
               FROM solicitud AS sl
               
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE sl.`estado_solicitud` = 'CREADA' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function comentarios()
     {
          try {
               $this->sql = "	SELECT * FROM solicitud_comentario 
               WHERE id_solicitud =  '$this->id_solicitud'";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function comentariosCrear()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO solicitud_comentario VALUES (NULL ,:id_solicitud, :comentario ,  :usuario_comentario , CURRENT_TIMESTAMP(), 'ACTIVO')");
               $this->result->bindParam(':comentario', $this->comentario);
               $this->result->bindParam(':id_solicitud', $this->id_solicitud);
               $this->result->bindParam(':usuario_comentario', $this->usuario_comentario);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function comentariosCrear1()
     {
          try{
               $this->result = $this->conexion->prepare("INSERT INTO solicitud_comentario VALUES (NULL , :id_solicitud,'Se asignó o modificó al funcionario encargado',  :usuario_comentario , CURRENT_TIMESTAMP(), 'ACTIVO')");
               $this->result->bindParam(':id_solicitud', $this->id_solicitud);
               $this->result->bindParam(':usuario_comentario', $this->usuario_comentario);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

 
     public function funcionarioCrear()
     {
          try {
               $this->sql = "UPDATE solicitud SET funcionario_asignado='$this->funcionario_asignado', estado_solicitud='ASIGNADA', fecha_asignacion =  CURRENT_TIMESTAMP() WHERE id_solicitud=$this->id_solicitud";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function tareaCrear()
     {
          try {
               $this->sql = "CALL create_tarea_estado(1,$this->id_solicitud,'1','$this->usuario', CURRENT_TIMESTAMP(),'CREADO', '$this->carpeta', NULL)";
               $this->result=$this->conexion->query($this->sql);
               $this->retorno =  $this->result->fetchAll(PDO::FETCH_ASSOC);

          } catch (Exception $e) {
               $this->retorno = $e->getMessage(); 
          }
               return $this->retorno;
     }
	 
     public function estatusSolicitud()
     {
          try {
               $this->sql = "UPDATE solicitud SET estado_solicitud='$this->estatus_solicitud',  fecha_inicio_tarea =  CURRENT_TIMESTAMP() WHERE id_solicitud=$this->id_solicitud";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function read4()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`codigo_documento`,
               sl.`solicitud`,
               sl.`fecha_solicitud`,
               sl.`fecha_asignacion`,
               sl.`documento`,
               sl.`funcionario_asignado`,
               sl.`estado_solicitud`,
               sl.`ruta`
               FROM solicitud AS sl
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               WHERE sl.`id_empleado` = '$this->id_empleado' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }
         
     public function solicitudCreacion()
     {
          try {
               $this->sql = "CALL create_comentario_sol(1,$this->id_empleado,'$this->prioridad',$this->id_tipo_documento,'CREACION','CREADA','0000',
               '$this->solicitud','$this->carpeta','$this->documento',CURRENT_TIMESTAMP(),
               'Sin Asignar',NULL,NULL,NULL,'1', 'Se crea la solicitud','$this->usuario_comentario',CURRENT_TIMESTAMP(), 'ACTIVO')";
               $this->result=$this->conexion->query($this->sql);
               $this->retorno =  $this->result->fetchAll(PDO::FETCH_ASSOC);

          } catch (Exception $e) {
               $this->retorno = $e->getMessage(); 
          }
               return $this->retorno;
     }

     public function solicitudActualizacion()
     {
          try {
               $this->sql = "CALL create_comentario_sol(1,$this->id_empleado,'$this->prioridad',$this->id_tipo_documento,'ACTUALIZACION','CREADA','$this->codigo',
               '$this->solicitud','$this->carpeta','$this->documento',CURRENT_TIMESTAMP(),
               'Sin Asignar',NULL,NULL,NULL,'1', 'Se crea la solicitud','$this->usuario_comentario',CURRENT_TIMESTAMP(), 'ACTIVO')";
               $this->result=$this->conexion->query($this->sql);

          } catch (Exception $e) {
               $this->retorno = $e->getMessage(); 
          }
               return $this->retorno;
     }

     public function solicitudEliminacion()
     {
          try {
               $this->sql = "CALL create_comentario_sol(1,$this->id_empleado,'$this->prioridad',$this->id_tipo_documento,'ELIMINACION','CREADA','$this->codigo',
               '$this->solicitud','$this->carpeta','$this->documento',CURRENT_TIMESTAMP(),
               'Sin Asignar',NULL,NULL,NULL,'1', 'Se crea la solicitud','$this->usuario_comentario',CURRENT_TIMESTAMP(), 'ACTIVO')";
               $this->result=$this->conexion->query($this->sql);
               $this->retorno =  $this->result->fetchAll(PDO::FETCH_ASSOC);
               // $this->retorno = "Exito: Usuario Creado";

          } catch (Exception $e) {
               $this->retorno = $e->getMessage(); 
          }
               return $this->retorno;
     }

     public function tipoDocumento()
     {
          try {
               $this->sql = "SELECT * FROM tipo_documento ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }




     public function read2()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_solicitud`,
               sl.`fecha_asignacion`,
               sl.`fecha_inicio_tarea`,
               sl.`fecha_solucion`,
               sl.`ruta`,
               sl.`documento`,
               sl.`funcionario_asignado`,
               sl.`estado_solicitud`,
               us.`usuario`
          
               FROM solicitud AS sl
              
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE sl.`estado_solicitud` = 'ASIGNADA'";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function read5()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_solicitud`,
               sl.`fecha_asignacion`,
               sl.`fecha_inicio_tarea`,
               sl.`fecha_solucion`,
               sl.`ruta`,
               sl.`documento`,
               sl.`funcionario_asignado`,
               sl.`estado_solicitud`,
               us.`usuario`
          
               FROM solicitud AS sl
              
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE sl.`estado_solicitud` = 'EN DESARROLLO' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function read6()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_solicitud`,
               sl.`fecha_asignacion`,
               sl.`fecha_inicio_tarea`,
               sl.`fecha_solucion`,
               sl.`ruta`,
               sl.`documento`,
               sl.`funcionario_asignado`,
               sl.`estado_solicitud`,
               us.`usuario`
          
               FROM solicitud AS sl
              
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE sl.`estado_solicitud` = 'FINALIZADA'";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function asignada()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_solicitud`,
               sl.`fecha_asignacion`,
               sl.`ruta`,
               sl.`documento`,
               sl.`funcionario_asignado`,
               sl.`estado_solicitud`,
               us.`usuario`
          
               FROM solicitud AS sl
               
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE sl.`funcionario_asignado` = '$this->usuario'  AND sl.`estado_solicitud` = 'ASIGNADA' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function asignada1()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`fecha_solicitud`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_inicio_tarea`,
               sl.`ruta`,
               sl.`documento`,
               us.`usuario`,
               tre.`usuario_tarea_estado`,
               tre.`tarea_estado`,
               tre.`ruta`,
               tre.`documento_tarea`,
               tre.`fecha_tarea_estado`
          
               FROM solicitud AS sl
               
               INNER JOIN tarea AS tr ON sl.`id_solicitud` = tr.`id_solicitud`
               INNER JOIN tarea_estado AS tre ON tr.`id_tarea` = tre.`id_tarea`
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE  tre.`tarea_estado` ='CREADO'";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function desarrolloTarea()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`fecha_solicitud`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_inicio_tarea`,
               sl.`ruta`,
               sl.`documento`,
               us.`usuario`,
               tre.`usuario_tarea_estado`,
               tre.`tarea_estado`,
               tre.`ruta`,
               tre.`documento_tarea`,
               tre.`fecha_tarea_estado`
          
               FROM tarea_estado AS tre
               
               INNER JOIN tarea AS tr ON tre.`id_tarea` = tr.`id_tarea`
               INNER JOIN solicitud AS sl ON tr.`id_solicitud` = sl.`id_solicitud`
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE tre.`tarea_estado` !='CREADO' AND tre.`tarea_estado` !='FINALIZADO' AND tre.`tarea_estado` !='DEVUELTO' AND tre.`tarea_estado` !='CAMBIO' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function desarrolloTarea1()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud`,
               sl.`id_empleado`,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`fecha_solicitud`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_inicio_tarea`,
               sl.`ruta` AS carpeta,
               sl.`documento` AS soportes,
               us.`usuario` AS solicitante ,
               tre.`usuario_tarea_estado`,
               tre.`tarea_estado`,
               tre.`ruta`,
               tre.`documento_tarea`,
               tr.`id_tarea`,
               tre.`fecha_tarea_estado`
          
               FROM tarea_estado AS tre
               
               INNER JOIN tarea AS tr ON tre.`id_tarea` = tr.`id_tarea`
               INNER JOIN solicitud AS sl ON tr.`id_solicitud` = sl.`id_solicitud`
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE   tre.`usuario_tarea_estado` = '$this->usuario'  AND tre.`tarea_estado` IN('CREADO','DEVUELTO') ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function tareaElaborada()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO tarea_estado VALUES (NULL ,:id_tarea, :usuario_tarea_estado,CURRENT_TIMESTAMP(), 'REVISION', :ruta, :documento_tarea )");
               $this->result->bindParam(':id_tarea', $this->id_tarea);
               $this->result->bindParam(':usuario_tarea_estado', $this->usuario_tarea_estado);
               $this->result->bindParam(':ruta', $this->ruta);
               $this->result->bindParam(':documento_tarea', $this->documento_tarea);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function comentarioTareaElaborada()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO solicitud_comentario VALUES (NULL ,:id_solicitud, :comentario ,  :usuario_comentario , CURRENT_TIMESTAMP(), 'ACTIVO')");
               $this->result->bindParam(':comentario', $this->comentario);
               $this->result->bindParam(':id_solicitud', $this->id_solicitud);
               $this->result->bindParam(':usuario_comentario', $this->usuario_comentario);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarTareaEstado()
     {
          try {
               $this->sql = "UPDATE tarea_estado SET tarea_estado='CAMBIO' WHERE id_tarea=$this->id_tarea AND tarea_estado = 'CREADO'";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function revisarTarea()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud`,
               sl.`id_empleado`,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`fecha_solicitud`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_inicio_tarea`,
               sl.`ruta` AS carpeta,
               sl.`documento` AS soportes,
               us.`usuario` AS solicitante ,
               tre.`usuario_tarea_estado`,
               tre.`tarea_estado`,
               tre.`ruta`,
               tre.`documento_tarea`,
               tr.`id_tarea`,
               tre.`fecha_tarea_estado`
          
               FROM tarea_estado AS tre
               
               INNER JOIN tarea AS tr ON tre.`id_tarea` = tr.`id_tarea`
               INNER JOIN solicitud AS sl ON tr.`id_solicitud` = sl.`id_solicitud`
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE   tre.`usuario_tarea_estado` = '$this->usuario'  AND tre.`tarea_estado` = 'REVISION' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function tareaRevisada()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO tarea_estado VALUES (NULL ,:id_tarea, :usuario_tarea_estado,CURRENT_TIMESTAMP(), 'APROBACION', :ruta, :documento_tarea )");
               $this->result->bindParam(':id_tarea', $this->id_tarea);
               $this->result->bindParam(':usuario_tarea_estado', $this->usuario_tarea_estado);
               $this->result->bindParam(':ruta', $this->ruta);
               $this->result->bindParam(':documento_tarea', $this->documento_tarea);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarTareaEstadoRev()
     {
          try {
               $this->sql = "UPDATE tarea_estado SET tarea_estado='CAMBIO' WHERE id_tarea=$this->id_tarea AND tarea_estado = 'REVISION'";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function tareaDevuelta()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO tarea_estado VALUES (NULL ,:id_tarea, :usuario_tarea_estado,CURRENT_TIMESTAMP(), 'DEVUELTO', :ruta, :documento_tarea )");
               $this->result->bindParam(':id_tarea', $this->id_tarea);
               $this->result->bindParam(':usuario_tarea_estado', $this->usuario_tarea_estado);
               $this->result->bindParam(':ruta', $this->ruta);
               $this->result->bindParam(':documento_tarea', $this->documento_tarea);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     
     public function devueltas()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`fecha_solicitud`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_inicio_tarea`,
               sl.`ruta`,
               sl.`documento`,
               us.`usuario`,
               tre.`usuario_tarea_estado`,
               tre.`tarea_estado`,
               tre.`ruta`,
               tre.`documento_tarea`,
               tre.`fecha_tarea_estado`
          
               FROM tarea_estado AS tre
               
               INNER JOIN tarea AS tr ON tre.`id_tarea` = tr.`id_tarea`
               INNER JOIN solicitud AS sl ON tr.`id_solicitud` = sl.`id_solicitud`
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE tre.`tarea_estado` ='DEVUELTO' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function aprobartarea()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud`,
               sl.`id_empleado`,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`fecha_solicitud`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_inicio_tarea`,
               sl.`ruta` AS carpeta,
               sl.`documento` AS soportes,
               us.`usuario` AS solicitante ,
               tre.`usuario_tarea_estado`,
               tre.`tarea_estado`,
               tre.`ruta`,
               tre.`documento_tarea`,
               tr.`id_tarea`,
               tre.`fecha_tarea_estado`
          
               FROM tarea_estado AS tre
               
               INNER JOIN tarea AS tr ON tre.`id_tarea` = tr.`id_tarea`
               INNER JOIN solicitud AS sl ON tr.`id_solicitud` = sl.`id_solicitud`
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE   tre.`usuario_tarea_estado` = '$this->usuario'  AND tre.`tarea_estado` = 'APROBACION' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function actualizarTareaEstadoApr()
     {
          try {
               $this->sql = "UPDATE tarea_estado SET tarea_estado='CAMBIO' WHERE id_tarea=$this->id_tarea AND tarea_estado = 'APROBACION'";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function tareaAprobada()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO tarea_estado VALUES (NULL ,:id_tarea, :usuario_tarea_estado,CURRENT_TIMESTAMP(), 'FINALIZADO', :ruta, :documento_tarea )");
               $this->result->bindParam(':id_tarea', $this->id_tarea);
               $this->result->bindParam(':usuario_tarea_estado', $this->usuario_tarea_estado);
               $this->result->bindParam(':ruta', $this->ruta);
               $this->result->bindParam(':documento_tarea', $this->documento_tarea);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function estatusSolicitudFinalizada()
     {
          try {
               $this->sql = "UPDATE solicitud SET estado_solicitud='FINALIZADA',  fecha_solucion=  CURRENT_TIMESTAMP() WHERE id_solicitud=$this->id_solicitud";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function comentarioSolicFinal()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO solicitud_comentario VALUES (NULL ,:id_solicitud,'Solicitud Finalizada con éxito, se aprobó lo solicitado' ,  :usuario_comentario , CURRENT_TIMESTAMP(), 'ACTIVO')");
               $this->result->bindParam(':id_solicitud', $this->id_solicitud);
               $this->result->bindParam(':usuario_comentario', $this->usuario_comentario);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function finalizadas()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`fecha_solicitud`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_inicio_tarea`,
               sl.`ruta`,
               sl.`documento`,
               us.`usuario`,
               tre.`usuario_tarea_estado`,
               tre.`tarea_estado`,
               tre.`ruta`,
               tre.`documento_tarea`,
               tre.`fecha_tarea_estado`
          
               FROM tarea_estado AS tre
               
               INNER JOIN tarea AS tr ON tre.`id_tarea` = tr.`id_tarea`
               INNER JOIN solicitud AS sl ON tr.`id_solicitud` = sl.`id_solicitud`
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE tre.`tarea_estado` ='FINALIZADO' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function finalizadas1()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               sl.`prioridad`,
               sl.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`fecha_solicitud`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_inicio_tarea`,
               sl.`ruta`,
               sl.`documento`,
               us.`usuario`,
               tre.`usuario_tarea_estado`,
               tre.`tarea_estado`,
               tre.`ruta`,
               tre.`documento_tarea`,
               tre.`fecha_tarea_estado`
          
               FROM tarea_estado AS tre
               
               INNER JOIN tarea AS tr ON tre.`id_tarea` = tr.`id_tarea`
               INNER JOIN solicitud AS sl ON tr.`id_solicitud` = sl.`id_solicitud`
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE tre.`usuario_tarea_estado` = '$this->usuario' AND tre.`tarea_estado` ='FINALIZADO' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

}

?>
