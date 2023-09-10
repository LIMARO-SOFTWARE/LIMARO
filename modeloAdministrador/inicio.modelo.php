<?php

namespace modelo;
use PDO;
use Exception;

include_once '../../entidadAdministrador/inicio.entidad.php';
include_once '../../entorno/conexionSingleton.php';

class Inicio{
    
     public $id_empresa;
     public $nombre_empresa;
     public $logo;
     public $mision;
     public $vision;
     public $politica_calidad;
     public $objetivos_calidad;
     public $organigrama;
     public $mapa_procesos;

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
          $this->mapa_procesos = $inicioE->getMapaProcesos();

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

     public function actualizarNombreEmpresa()
     {

          try {
               $this->sql = "UPDATE empresa SET nombre_empresa='$this->nombre_empresa' WHERE id_empresa=$this->id_empresa";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarLogo()
     {

          try {
               $this->sql = "UPDATE empresa SET logo='$this->logo' WHERE id_empresa=$this->id_empresa";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarMisionEmpresa()
     {

          try {
               $this->sql = "UPDATE empresa SET mision='$this->mision' WHERE id_empresa=$this->id_empresa";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarVisionEmpresa()
     {

          try {
               $this->sql = "UPDATE empresa SET vision='$this->vision' WHERE id_empresa=$this->id_empresa";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarPoliticaEmpresa()
     {

          try {
               $this->sql = "UPDATE empresa SET politica_calidad ='$this->politica_calidad' WHERE id_empresa=$this->id_empresa";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarObjetivosEmpresa()
     {

          try {
               $this->sql = "UPDATE empresa SET objetivos_calidad ='$this->objetivos_calidad' WHERE id_empresa=$this->id_empresa";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarOrganigrama()
     {

          try {
               $this->sql = "UPDATE empresa SET organigrama='$this->organigrama' WHERE id_empresa=$this->id_empresa";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarMapaProcesos()
     {

          try {
               $this->sql = "UPDATE empresa SET mapa_procesos='$this->mapa_procesos' WHERE id_empresa=$this->id_empresa";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }


}

?>