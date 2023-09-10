<?php

namespace modelo;
use PDO;
use Exception;

include_once '../entidadEmpleado/inicio.entidad.php';
include_once '../entorno/conexionSingleton.php';

class Inicio{
    
     public $id_empresa;
     public $nombre_empresa;
     public $logo;
     public $mision;
     public $vision;
     public $politica_calidad;
     public $objetivos_calidad;
     public $organigrama;

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;

     public function __construct(\entidad\Inicio $inicioE)
     {
          $this->id_empresa = $inicioE->getIdEmpresa();
          $this->nombre_empresa = $inicioE->getNombreEmpresa();
          $this->logo = $inicioE->getLogo();
          $this->mision = $inicioE->getMision();
          $this->vision = $inicioE->getVision();
          $this->politica_calidad = $inicioE->getPoliticaCalidad();
          $this->objetivos_calidad = $inicioE->getObjetivosCalidad();
          $this->organigrama = $inicioE->getOrganigrama();
          $this->conexion = \Conexion::singleton();
     }

     public function read()
     {
          try {
               $this->sql = "SELECT * FROM empresa ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
                    
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }


}

?>