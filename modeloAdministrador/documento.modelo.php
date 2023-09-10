<?php

namespace modelo;
use PDO;
use Exception;


include_once '../../entidadAdministrador/documento.entidad.php';
include_once '../../entorno/conexionSingleton.php';

class Documento{
    
     public $id_documento;
     public $id_tipo_documento;
     public $id_proceso;
     public $codigo;
     public $nombre_documento;
     public $id_versionamiento;
     public $numero_version;
     public $descripcion_version;
     public $usuario_creacion;
     public $fecha_creacion;
     public $usuario_revision;
     public $fecha_revision;
     public $usuario_aprobacion;
     public $fecha_aprobacion;
     public $documento;
     public $estado;
     public $id_macroproceso;
     public $macroproceso;
     public $objetivo_documento;
     public $version_ante;


     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;

     public function __construct(\entidad\documento $documentoE)
     {
          $this->id_documento = $documentoE->getIdDocumento();
          $this->id_tipo_documento = $documentoE->getIdTipoDocumento();
          $this->id_proceso = $documentoE->getIdProceso();
          $this->codigo = $documentoE->getCodigo();
          $this->nombre_documento = $documentoE->getNombreDocumento();
          $this->id_versionamiento = $documentoE->getIdVersionamiento();
          $this->numero_version = $documentoE->getNumeroVersion();
          $this->descripcion_version = $documentoE->getDescripcionVersion();
          $this->usuario_creacion = $documentoE->getUsuarioCreacion();
          $this->fecha_creacion = $documentoE->getFechaCreacion();
          $this->usuario_revision = $documentoE->getUsuarioRevision();
          $this->fecha_revision = $documentoE->getFechaRevision();
          $this->usuario_aprobacion = $documentoE->getUsuarioAprobacion();
          $this->fecha_aprobacion = $documentoE->getFechaAprobacion();
          $this->documento = $documentoE->getDocumento();
          $this->estado = $documentoE->getEstado();
          $this->id_macroproceso = $documentoE->getIdMacroproceso();
          $this->macroproceso = $documentoE->getMacroproceso();
          $this->objetivo_documento = $documentoE->getObjetivoDocumento();
          $this->version_ante = $documentoE->getVersionAnte();

          $this->conexion = \Conexion::singleton();
     }

     public function creaciondocumento()
     { try {
          $this->sql = "CALL createVersionamiento(1,'$this->id_proceso','$this->id_tipo_documento', '$this->codigo',
          '$this->nombre_documento','$this->objetivo_documento','0',1,'Se asigna Codigo al Documento','$this->usuario_creacion',
          CURRENT_TIMESTAMP(),NULL,NULL,NULL,NULL,NULL,NULL,'CREADO')";
          $this->result=$this->conexion->query($this->sql);
          $this->retorno =  $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage(); 
          }
               return $this->retorno;
     }

     public function codigo()
     { try {
          $this->sql = "SELECT codigo FROM documento WHERE codigo LIKE '$this->codigo%' ORDER BY id_documento DESC LIMIT 1";
          $this->result = $this->conexion->query($this->sql);
          $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
                    
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function read()
     { try {
          $this->sql = "SELECT 
          doc.`id_documento`,
          mpr.`macroproceso`,
          doc.`codigo`,
          doc.`nombre_documento`,
          pr.`id_proceso`,
          pr.`proceso`,
          pr.`sigla_proceso`,
          tdoc.`id_tipo_documento`,
          tdoc.`tipo_documento` ,
          tdoc.`sigla_tipo_documento` ,
          vr.`id_versionamiento`,
          vr.`numero_version`,
          vr.`documento`,
          vr.`descripcion_version`,
          vr.`fecha_aprobacion`,
          vr.`estado_version`
          FROM documento AS doc
          INNER JOIN tipo_documento AS tdoc ON doc.`id_tipo_documento` = tdoc.`id_tipo_documento`
          INNER JOIN proceso AS pr ON doc.`id_proceso` = pr.`id_proceso`
          INNER JOIN macroproceso AS mpr ON pr.`id_macroproceso` = mpr.`id_macroproceso`
          INNER JOIN versionamiento AS vr ON  doc.`id_documento` = vr.`id_documento`
          WHERE vr.`estado_version` = 'VIGENTE'
          ORDER BY LENGTH( doc.`codigo`), codigo ";
          $this->result = $this->conexion->query($this->sql);
          $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
               
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function readed()
     { try {
          $this->sql = "SELECT 
          doc.`id_documento`,
          mpr.`macroproceso`,
          doc.`codigo`,
          doc.`nombre_documento`,
          doc.`objetivo_documento`,
          pr.`id_proceso`,
          pr.`proceso`,
          pr.`sigla_proceso`,
          tdoc.`id_tipo_documento`,
          tdoc.`tipo_documento` ,
          tdoc.`sigla_tipo_documento` 
          FROM documento AS doc
          INNER JOIN tipo_documento AS tdoc ON doc.`id_tipo_documento` = tdoc.`id_tipo_documento`
          INNER JOIN proceso AS pr ON doc.`id_proceso` = pr.`id_proceso`
          INNER JOIN macroproceso AS mpr ON pr.`id_macroproceso` = mpr.`id_macroproceso`
          ORDER BY LENGTH( doc.`codigo`), codigo ";
          $this->result = $this->conexion->query($this->sql);
          $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
               
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }


     public function actualizarNombreDoc()
     {
          try {
               $this->sql = "UPDATE documento SET nombre_documento='$this->nombre_documento', objetivo_documento='$this->objetivo_documento' WHERE id_documento=$this->id_documento";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function read2()
     { try {
          $this->sql = "SELECT 
          doc.`id_documento`,
          mpr.`macroproceso`,
          doc.`codigo`,
          doc.`nombre_documento`,
          pr.`id_proceso`,
          pr.`proceso`,
          pr.`objetivo`,
          pr.`sigla_proceso`,
          tdoc.`id_tipo_documento`,
          tdoc.`tipo_documento` ,
          tdoc.`sigla_tipo_documento` ,
          vr.`id_versionamiento`,
          vr.`numero_version`,
          vr.`documento`,
          vr.`descripcion_version`,
          vr.`fecha_aprobacion`,
          vr.`estado_version`
          FROM documento AS doc
          INNER JOIN tipo_documento AS tdoc ON doc.`id_tipo_documento` = tdoc.`id_tipo_documento`
          INNER JOIN proceso AS pr ON doc.`id_proceso` = pr.`id_proceso`
          INNER JOIN macroproceso AS mpr ON pr.`id_macroproceso` = mpr.`id_macroproceso`
          INNER JOIN versionamiento AS vr ON  doc.`id_documento` = vr.`id_documento`
          WHERE vr.`estado_version` = 'VIGENTE'
          ORDER BY LENGTH( doc.`codigo`), codigo";
          $this->result = $this->conexion->query($this->sql);
          $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC); 
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function autocomplete()
     {
          try {
               $this->sql = "SELECT 
                    doc.`id_documento` AS id_documento,
                    doc.`codigo` AS codigo,
                    doc.`nombre_documento` AS nombre_documento,
                    mpr.`macroproceso` AS macroproceso,
                    pr.`id_proceso`,
                    pr.`proceso` AS proceso,
                    pr.`sigla_proceso` AS sigla_proceso,
                    tdoc.`id_tipo_documento`,
                    tdoc.`tipo_documento` AS  tipo_documento,
                    tdoc.`sigla_tipo_documento` AS sigla_tipo_documento,
                    vr.`id_versionamiento`,
                    vr.`numero_version` AS version1,
                    vr.`documento`,
                    vr.`descripcion_version`,
                    vr.`fecha_aprobacion`,
                    vr.`estado_version` AS est
               FROM documento AS doc
               INNER JOIN tipo_documento AS tdoc ON doc.`id_tipo_documento` = tdoc.`id_tipo_documento`
               INNER JOIN proceso AS pr ON doc.`id_proceso` = pr.`id_proceso`
		     INNER JOIN macroproceso AS mpr ON pr.`id_macroproceso` = mpr.`id_macroproceso`
               INNER JOIN versionamiento AS vr ON  doc.`id_documento` = vr.`id_documento`
               WHERE nombre_documento LIKE  CONCAT('%','$this->nombre_documento','%')  AND vr.`estado_version` != 'OBSOLETO' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);

               foreach ($this->retorno as $key => $value) {
                    $this->informacion[] = array(
                         "nombre_documento" => $value['nombre_documento'],
                         "numero_version" =>  $value['version1'],
                         "sigla_proceso" =>  $value['sigla_proceso'],
                         "id_documento" =>  $value['id_documento'],
                         "codigo" =>  $value['codigo'],
                         "est" =>  $value['est'],
                         "macroproceso" =>  $value['macroproceso'],
                         "proceso" =>  $value['proceso'],
                         "tipo_documento" =>  $value['tipo_documento'],
                         "sigla_tipo_documento" =>  $value['sigla_tipo_documento'],
                         "label" => $value['codigo'] . ' ' . $value['nombre_documento']);
               }
          } catch (Exception $e) {
               $this->informacion = $e->getMessage();
          }
               return $this->informacion;
     }

     public function creacionVersionamiento()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO versionamiento VALUES (NULL , :numero_version , :id_documento, :descripcion_version , :usuario_creacion,
                :fecha_creacion,:usuario_revision,:fecha_revision,:usuario_aprobacion,:fecha_aprobacion,:documento, null, 'VIGENTE')");
                
               $this->result->bindParam(':numero_version', $this->numero_version);
               $this->result->bindParam(':id_documento', $this->id_documento);
               $this->result->bindParam(':descripcion_version', $this->descripcion_version);
               $this->result->bindParam(':usuario_creacion', $this->usuario_creacion);
               $this->result->bindParam(':fecha_creacion', $this->fecha_creacion);
               $this->result->bindParam(':usuario_revision', $this->usuario_revision);
               $this->result->bindParam(':fecha_revision', $this->fecha_revision);
               $this->result->bindParam(':usuario_aprobacion', $this->usuario_aprobacion);
               $this->result->bindParam(':fecha_aprobacion', $this->fecha_aprobacion);
               $this->result->bindParam(':documento', $this->documento);

               $this->result->execute();    
          } catch (Exception $e) {

               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

      public function actualizarVersionamiento()
     {

          try {
               $this->sql = "UPDATE versionamiento SET estado_version='OBSOLETO' , fecha_obsoleto= CURRENT_TIMESTAMP() WHERE id_documento = $this->id_documento AND numero_version=  $this->version_ante";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

      public function obsoletos()
     { try {
          $this->sql = "SELECT 
          doc.`id_documento`,
          doc.`codigo`,
          doc.`nombre_documento`,
          mpr.`macroproceso`,
          pr.`id_proceso`,
          pr.`proceso`,
          pr.`sigla_proceso`,
          tdoc.`id_tipo_documento`,
          tdoc.`tipo_documento` ,
          tdoc.`sigla_tipo_documento` ,
          vr.`id_versionamiento`,
          vr.`numero_version`,
          vr.`documento`,
          vr.`descripcion_version`,
          vr.`fecha_obsoleto`,
          vr.`estado_version`
          FROM documento AS doc
          INNER JOIN tipo_documento AS tdoc ON doc.`id_tipo_documento` = tdoc.`id_tipo_documento`
          INNER JOIN proceso AS pr ON doc.`id_proceso` = pr.`id_proceso`
          INNER JOIN macroproceso AS mpr ON pr.`id_macroproceso` = mpr.`id_macroproceso`
          INNER JOIN versionamiento AS vr ON  doc.`id_documento` = vr.`id_documento` 
          WHERE   vr.`estado_version` = 'OBSOLETO'";
          $this->result = $this->conexion->query($this->sql);
          $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
               
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }


      public function obsoleto()
     {

          try {
               $this->sql = "UPDATE versionamiento SET estado_version='$this->estado' , fecha_obsoleto= CURRENT_TIMESTAMP() WHERE id_documento=$this->id_documento AND estado_version != 'OBSOLETO' ";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function activarVersion()
     {

          try {
               $this->sql = "UPDATE versionamiento SET estado_version='$this->estado' , fecha_obsoleto= null  WHERE id_documento=$this->id_documento AND numero_version ='$this->version_ante' ";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     

}

?>