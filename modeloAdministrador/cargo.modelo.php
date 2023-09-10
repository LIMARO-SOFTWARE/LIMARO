<?php

namespace modelo;
use PDO;
use Exception;

include_once '../../entidadAdministrador/cargo.entidad.php';
include_once '../../entorno/conexionSingleton.php';

class Cargo{

     public $id_cargo;
     public $cargo;
     public $manual_funciones;
     public $estado;  

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;

    public function __construct(\entidad\Cargo $cargoE)
    {
         $this->id_cargo = $cargoE->getIdCargo();
         $this->cargo = $cargoE->getCargo();
         $this->manual_funciones = $cargoE->getManualFunciones();
         $this->estado = $cargoE->getEstado();
         $this->conexion = \Conexion::singleton();
    }
    
     public function read()
     {
          try {
               $this->sql = "SELECT * FROM cargo";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
                    
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function creacionCargo()
     {
         try{
               
              $this->result = $this->conexion->prepare("INSERT INTO cargo VALUES (NULL , :cargo, :manual_funciones,'ACTIVO')");
              $this->result->bindParam(':cargo', $this->cargo);
              $this->result->bindParam(':manual_funciones', $this->manual_funciones);
              $this->result->execute();    
          } catch (Exception $e) {
          
              $this->retorno = $e->getMessage();
          }
              return $this->retorno;
     }

     public function actualizarcargo()
     {
  
       try {
            $this->sql = "UPDATE cargo SET cargo='$this->cargo',manual_funciones='$this->manual_funciones'  WHERE id_cargo=$this->id_cargo";
            $this->result = $this->conexion->query($this->sql);
       } catch (Exception $e) {
            $this->retorno = $e->getMessage();
       }
            return $this->retorno;
     }

     public function inactivarCargo()
     {
  
       try {
            $this->sql = "UPDATE cargo SET estado='$this->estado' WHERE id_cargo=$this->id_cargo";
            $this->result = $this->conexion->query($this->sql);
       } catch (Exception $e) {
            $this->retorno = $e->getMessage();
       }
            return $this->retorno;
     }


}

?>