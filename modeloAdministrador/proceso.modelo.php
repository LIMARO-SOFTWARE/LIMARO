<?php

namespace modelo;
use PDO;
use Exception;

include_once '../../entidadAdministrador/proceso.entidad.php';
include_once '../../entorno/conexionSingleton.php';

class Proceso{

     public $id_proceso;
     public $id_macroproceso;
     public $proceso;
     public $sigla_proceso;
     public $objetivo;
     public $estado;
     public $macroproceso;

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;

     public function __construct(\entidad\Proceso $procesoE)
     {
          $this->id_proceso = $procesoE->getIdProceso();
          $this->proceso = $procesoE->getProceso();
          $this->id_macroproceso = $procesoE->getIdMacroproceso();
          $this->sigla_proceso = $procesoE->getSiglaProceso();
          $this->objetivo = $procesoE->getObjetivo();
          $this->estado = $procesoE->getEstado();
          $this->macroproceso = $procesoE->getMacroproceso();
          $this->conexion = \Conexion::singleton();
     }

     /**
     * Se realiza la consulta de los procesos vigentes para mostrar en la vistaEmpleado/consultas.frm.php
     */
     public function read()
     {
          try {
               $this->sql = "SELECT 
               macroproceso.`id_macroproceso`,
               macroproceso.`macroproceso`,
               proceso.`id_proceso`,
               proceso.`proceso`,
               proceso.`sigla_proceso`,
               proceso.`objetivo`,
               proceso.`estado`
               
          FROM proceso
          
          INNER JOIN macroproceso  ON  proceso.`id_macroproceso` = macroproceso.`id_macroproceso`";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
                    
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function crearProceso()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO proceso VALUES (NULL ,:id_macroproceso, :proceso , :sigla_proceso, :objetivo, 'ACTIVO')");
               $this->result->bindParam(':proceso', $this->proceso);
               $this->result->bindParam(':sigla_proceso', $this->sigla_proceso);
               $this->result->bindParam(':id_macroproceso', $this->id_macroproceso);
               $this->result->bindParam(':objetivo', $this->objetivo);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarProceso()
     {

          try {
               $this->sql = "UPDATE proceso SET id_macroproceso='$this->id_macroproceso', proceso='$this->proceso', sigla_proceso='$this->sigla_proceso', objetivo='$this->objetivo' WHERE id_proceso=$this->id_proceso";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function inactivarProceso()
     {

          try {
               $this->sql = "UPDATE proceso SET estado='$this->estado' WHERE id_proceso=$this->id_proceso";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

}

?>