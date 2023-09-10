<?php

namespace modelo;
use PDO;
use Exception;

include_once '../../entidadAdministrador/rol.entidad.php';
include_once '../../entorno/conexionSingleton.php';

class Rol{

     public $id_rol;
     public $rol;
     public $estado;  

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;

     public function __construct(\entidad\Rol $rolE)
     {
          $this->id_rol = $rolE->getIdRol();
          $this->rol = $rolE->getRol();
          $this->estado = $rolE->getEstado();
          $this->conexion = \Conexion::singleton();
     }

     
     public function read()
     {
          try {
               $this->sql = "SELECT * FROM rol";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
                    
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function crearRol()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO rol VALUES (NULL , :rol,'ACTIVO')");
               $this->result->bindParam(':rol', $this->rol);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarRol()
     {

          try {
               $this->sql = "UPDATE rol SET rol='$this->rol' WHERE id_rol=$this->id_rol";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function inactivarRol()
     {

          try {
               $this->sql = "UPDATE rol SET estado='$this->estado' WHERE id_rol=$this->id_rol";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }


}

?>