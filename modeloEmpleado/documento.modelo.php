<?php

namespace modelo;
use PDO;
use Exception;

include_once '../entidadEmpleado/documento.entidad.php';
include_once '../entorno/conexionSingleton.php';

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
          $this->conexion = \Conexion::singleton();
     }

     /**
     * Se realiza la consulta de los documentos vigentes para mostrar en la vistaEmpleado/consultas.frm.php
     */
     public function read()
     {
          try {
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
               ORDER BY LENGTH( doc.`codigo`), codigo ";
          $this->result = $this->conexion->query($this->sql);
          $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
               
          } catch (Exception $e) {
          $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }


}

?>