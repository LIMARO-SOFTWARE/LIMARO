<?php
namespace entidad;

class Usuario {

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

  /**
   * Get the value of id_empleado
   */
  public function getIdEmpleado()
  {
    return $this->id_empleado;
  }

  /**
   * Set the value of id_empleado
   *
   * @return  self
   */
  public function setIdEmpleado($id_empleado)
  {
    $this->id_empleado = $id_empleado;

    return $this;
  }

  /**
   * Get the value of nombre_completo
   */
  public function getNombreCompleto()
  {
    return $this->nombre_completo;
  }

  /**
   * Set the value of nombre_completo
   *
   * @return  self
   */
  public function setNombreCompleto($nombre_completo)
  {
    $this->nombre_completo = $nombre_completo;

    return $this;
  }

  /**
   * Get the value of img_empleado
   */
  public function getImgEmpleado()
  {
    return $this->img_empleado;
  }

  /**
   * Set the value of img_empleado
   *
   * @return  self
   */
  public function setImgEmpleado($img_empleado)
  {
    $this->img_empleado = $img_empleado;

    return $this;
  }

  /**
   * Get the value of correo_empleado
   */
  public function getCorreoEmpleado()
  {
    return $this->correo_empleado;
  }

  /**
   * Set the value of correo_empleado
   *
   * @return  self
   */
  public function setCorreoEmpleado($correo_empleado)
  {
    $this->correo_empleado = $correo_empleado;

    return $this;
  }

  /**
   * Get the value of id_cargo
   */
  public function getIdCargo()
  {
    return $this->id_cargo;
  }

  /**
   * Set the value of id_cargo
   *
   * @return  self
   */
  public function setIdCargo($id_cargo)
  {
    $this->id_cargo = $id_cargo;

    return $this;
  }

  /**
   * Get the value of id_empresa
   */
  public function getIdEmpresa()
  {
    return $this->id_empresa;
  }

  /**
   * Set the value of id_empresa
   *
   * @return  self
   */
  public function setIdEmpresa($id_empresa)
  {
    $this->id_empresa = $id_empresa;

    return $this;
  }

  /**
   * Get the value of estado_empleado
   */
  public function getEstadoEmpleado()
  {
    return $this->estado_empleado;
  }

  /**
   * Set the value of estado_empleado
   *
   * @return  self
   */
  public function setEstadoEmpleado($estado_empleado)
  {
    $this->estado_empleado = $estado_empleado;

    return $this;
  }

  /**
   * Get the value of id_usuario
   */
  public function getIdUsuario()
  {
    return $this->id_usuario;
  }

  /**
   * Set the value of id_usuario
   *
   * @return  self
   */
  public function setIdUsuario($id_usuario)
  {
    $this->id_usuario = $id_usuario;

    return $this;
  }

  /**
   * Get the value of usuario
   */
  public function getUsuario()
  {
    return $this->usuario;
  }

  /**
   * Set the value of usuario
   *
   * @return  self
   */
  public function setUsuario($usuario)
  {
    $this->usuario = $usuario;

    return $this;
  }

  /**
   * Get the value of clave
   */
  public function getClave()
  {
    return $this->clave;
  }

  /**
   * Set the value of clave
   *
   * @return  self
   */
  public function setClave($clave)
  {
    $this->clave = $clave;

    return $this;
  }

  /**
   * Get the value of id_rol
   */
  public function getIdRol()
  {
    return $this->id_rol;
  }

  /**
   * Set the value of id_rol
   *
   * @return  self
   */
  public function setIdRol($id_rol)
  {
    $this->id_rol = $id_rol;

    return $this;
  }

  /**
   * Get the value of estado
   */
  public function getEstado()
  {
    return $this->estado;
  }

  /**
   * Set the value of estado
   *
   * @return  self
   */
  public function setEstado($estado)
  {
    $this->estado = $estado;

    return $this;
  }
}
?>