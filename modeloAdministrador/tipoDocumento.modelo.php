<?php

namespace modelo;
use PDO;
use Exception;

include_once '../../entidadAdministrador/tipoDocumento.entidad.php';
include_once '../../entorno/conexionSingleton.php';

class TipoDocumento{

     public $id_tipo_documento;
     public $tipo_documento;
     public $sigla_tipo_documento;
     public $estado;

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;

     public function __construct(\entidad\TipoDocumento $tipoDocumentoE)
     {
          $this->id_tipo_documento = $tipoDocumentoE->getIdTipoDocumento();
          $this->tipo_documento = $tipoDocumentoE->getTipoDocumento();
          $this->sigla_tipo_documento = $tipoDocumentoE->getSiglaTipoDocumento();
          $this->estado = $tipoDocumentoE->getEstado();
          $this->conexion = \Conexion::singleton();
     }     

     /**
     * Se realiza la consulta de los tipoDocumentos vigentes para mostrar en la vistaEmpleado/consultas.frm.php
     */
     public function read()
     {
          try {
          $this->sql = "SELECT * FROM tipo_documento";
          $this->result = $this->conexion->query($this->sql);
          $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
               
          } catch (Exception $e) {
          $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function creartipoDocumento()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO tipo_documento VALUES (NULL , :tipo_documento , :sigla_tipo_documento, 'ACTIVO')");
               $this->result->bindParam(':tipo_documento', $this->tipo_documento);
               $this->result->bindParam(':sigla_tipo_documento', $this->sigla_tipo_documento);
               $this->result->execute();    
          } catch (Exception $e) {

               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarTipodocumento()
     {
          try {
               $this->sql = "UPDATE tipo_documento SET tipo_documento='$this->tipo_documento', sigla_tipo_documento='$this->sigla_tipo_documento' WHERE id_tipo_documento=$this->id_tipo_documento";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function inactivarTipoDocumento()
     {
          try {
               $this->sql = "UPDATE tipo_documento SET estado='$this->estado' WHERE id_tipo_documento=$this->id_tipo_documento";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

}

?>