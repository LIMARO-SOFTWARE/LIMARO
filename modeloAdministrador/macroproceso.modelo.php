<?php

namespace modelo;
use PDO;
use Exception;

include_once '../../entidadAdministrador/macroproceso.entidad.php';
include_once '../../entorno/conexionSingleton.php';

class macroproceso{

     public $id_macroproceso;
     public $macroproceso;
     public $objetivo;
     public $estado;

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;

     public function __construct(\entidad\Macroproceso $macroprocesoE)
     {
          $this->id_macroproceso = $macroprocesoE->getIdMacroproceso();
          $this->macroproceso = $macroprocesoE->getMacroproceso();
          $this->objetivo = $macroprocesoE->getObjetivo();
          $this->estado = $macroprocesoE->getEstado();
          $this->conexion = \Conexion::singleton();
     }

     /**
     * Se realiza la consulta de los macroprocesos vigentes para mostrar en la vistaEmpleado/consultas.frm.php
     */
     public function read()
     {
          try {
               $this->sql = "SELECT * FROM macroproceso";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
                    
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function crearmacroproceso()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO macroproceso VALUES (NULL , :macroproceso , :objetivo, 'ACTIVO')");
               $this->result->bindParam(':macroproceso', $this->macroproceso);
               $this->result->bindParam(':objetivo', $this->objetivo);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarmacroproceso()
     {

          try {
               $this->sql = "UPDATE macroproceso SET macroproceso='$this->macroproceso', objetivo='$this->objetivo' WHERE id_macroproceso=$this->id_macroproceso";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function inactivarmacroproceso()
     {

          try {
               $this->sql = "UPDATE macroproceso SET estado='$this->estado' WHERE id_macroproceso=$this->id_macroproceso";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

}

?>