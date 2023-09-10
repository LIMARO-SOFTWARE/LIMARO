<?php
namespace entidad;

class Solicitudes {

    public $id_solicitud;
    public $solicitud;
    public $id_empleado;
    public $prioridad;
    public $id_tipo_documento;
    public $tipo_documento;
    public $estado_solicitud;
    public $tipo_solicitud;
    public $documento;
    public $codigo;
    public $ruta;
    public $funcionario_asignado;
    public $id_comentarios_solicitud;
    public $comentario;
    public $usuario_comentario;
    public $fecha_comentario;

  

    /**
     * Get the value of id_solicitud
     */
    public function getIdSolicitud()
    {
        return $this->id_solicitud;
    }

    /**
     * Set the value of id_solicitud
     */
    public function setIdSolicitud($id_solicitud): self
    {
        $this->id_solicitud = $id_solicitud;

        return $this;
    }

    /**
     * Get the value of solicitud
     */
    public function getSolicitud()
    {
        return $this->solicitud;
    }

    /**
     * Set the value of solicitud
     */
    public function setSolicitud($solicitud): self
    {
        $this->solicitud = $solicitud;

        return $this;
    }

    /**
     * Get the value of id_empleado
     */
    public function getIdEmpleado()
    {
        return $this->id_empleado;
    }

    /**
     * Set the value of id_empleado
     */
    public function setIdEmpleado($id_empleado): self
    {
        $this->id_empleado = $id_empleado;

        return $this;
    }

    /**
     * Get the value of prioridad
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * Set the value of prioridad
     */
    public function setPrioridad($prioridad): self
    {
        $this->prioridad = $prioridad;

        return $this;
    }

    /**
     * Get the value of id_tipo_documento
     */
    public function getIdTipoDocumento()
    {
        return $this->id_tipo_documento;
    }

    /**
     * Set the value of id_tipo_documento
     */
    public function setIdTipoDocumento($id_tipo_documento): self
    {
        $this->id_tipo_documento = $id_tipo_documento;

        return $this;
    }

    /**
     * Get the value of tipo_documento
     */
    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }

    /**
     * Set the value of tipo_documento
     */
    public function setTipoDocumento($tipo_documento): self
    {
        $this->tipo_documento = $tipo_documento;

        return $this;
    }

    /**
     * Get the value of estado_solicitud
     */
    public function getEstadoSolicitud()
    {
        return $this->estado_solicitud;
    }

    /**
     * Set the value of estado_solicitud
     */
    public function setEstadoSolicitud($estado_solicitud): self
    {
        $this->estado_solicitud = $estado_solicitud;

        return $this;
    }

    /**
     * Get the value of tipo_solicitud
     */
    public function getTipoSolicitud()
    {
        return $this->tipo_solicitud;
    }

    /**
     * Set the value of tipo_solicitud
     */
    public function setTipoSolicitud($tipo_solicitud): self
    {
        $this->tipo_solicitud = $tipo_solicitud;

        return $this;
    }

    /**
     * Get the value of documento
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set the value of documento
     */
    public function setDocumento($documento): self
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get the value of codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     */
    public function setCodigo($codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of ruta
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set the value of ruta
     */
    public function setRuta($ruta): self
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get the value of funcionario_asignado
     */
    public function getFuncionarioAsignado()
    {
        return $this->funcionario_asignado;
    }

    /**
     * Set the value of funcionario_asignado
     */
    public function setFuncionarioAsignado($funcionario_asignado): self
    {
        $this->funcionario_asignado = $funcionario_asignado;

        return $this;
    }

    /**
     * Get the value of id_comentarios_solicitud
     */
    public function getIdComentariosSolicitud()
    {
        return $this->id_comentarios_solicitud;
    }

    /**
     * Set the value of id_comentarios_solicitud
     */
    public function setIdComentariosSolicitud($id_comentarios_solicitud): self
    {
        $this->id_comentarios_solicitud = $id_comentarios_solicitud;

        return $this;
    }

    /**
     * Get the value of comentario
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set the value of comentario
     */
    public function setComentario($comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get the value of usuario_comentario
     */
    public function getUsuarioComentario()
    {
        return $this->usuario_comentario;
    }

    /**
     * Set the value of usuario_comentario
     */
    public function setUsuarioComentario($usuario_comentario): self
    {
        $this->usuario_comentario = $usuario_comentario;

        return $this;
    }

    /**
     * Get the value of fecha_comentario
     */
    public function getFechaComentario()
    {
        return $this->fecha_comentario;
    }

    /**
     * Set the value of fecha_comentario
     */
    public function setFechaComentario($fecha_comentario): self
    {
        $this->fecha_comentario = $fecha_comentario;

        return $this;
    }
}


?>