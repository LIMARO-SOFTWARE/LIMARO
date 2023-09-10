<?php

namespace modelo;
use PDO;
use Exception;

include_once '../entidadEmpleado/usuario.entidad.php';
include_once '../entorno/conexionSingleton.php';

class Usuario{

     public $id_empleado;
     public $nombre_completo;
     public $img_empleado;
     public $correo_empleado;
     public $id_cargo;
     public $id_empresa;
     public $estado_empleado;
     public $id_usuario;
     public $usuario;
     public $clave;
     public $id_rol;
     public $estado;

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;


     public function __construct(\entidad\Usuario $usuarioE)
     {
          $this->id_empleado = $usuarioE->getIdEmpleado();
          $this->nombre_completo = $usuarioE->getNombreCompleto();
          $this->img_empleado = $usuarioE->getImgEmpleado();
          $this->correo_empleado = $usuarioE->getCorreoEmpleado();
          $this->id_cargo = $usuarioE->getIdCargo();
          $this->id_empresa = $usuarioE->getIdEmpresa();
          $this->estado_empleado = $usuarioE->getEstadoEmpleado();
          $this->id_usuario = $usuarioE->getIdUsuario();
          $this->usuario = $usuarioE->getUsuario();
          $this->clave = $usuarioE->getClave();
          $this->id_rol = $usuarioE->getIdRol();
          $this->estado = $usuarioE->getEstado();

          $this->conexion = \Conexion::singleton();
     }

     /**
     * Se realiza la consulta de los procesos vigentes para mostrar en la vistaEmpleado/consultas.frm.php
     */

     public function newpass()
     {
          try {
               $this->sql="UPDATE usuario SET  clave = AES_ENCRYPT('$this->clave','kddbjw8b3d')
               WHERE id_usuario = '$this->id_usuario'";
               $this->result=$this->conexion->query($this->sql);

          } catch (Exception $e) {
               $this->retorno =$e->getMessage();
          }
          return $this->retorno;
     }

     public function updateImg()
     {
          try {
               $this->sql = "UPDATE empleado SET img_empleado = '$this->img_empleado' WHERE id_empleado = '$this->id_empleado'";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }


}

?>