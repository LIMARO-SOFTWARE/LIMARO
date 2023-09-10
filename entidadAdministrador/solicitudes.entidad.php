<?php
namespace entidad;

class Solicitudes {

    public $id_solicitud;
    public $solicitud;
    public $id_empleado;
    public $id_prioridad;
    public $prioridad;
    public $id_tipo_documento;
    public $tipo_documento;
    public $id_estatus_solicitud;
    public $estatus_solicitud;
    public $id_tipo_solicitud;
    public $tipo_solicitud;
    public $documento;
    public $codigo;
    public $carpeta;
    public $funcionario_asignado;
    public $usuario;

    public $id_comentarios_solicitud;
    public $comentario;
    public $usuario_comentario;
    public $fecha_comentario;

    public $id_tarea_estado;
    public $id_tarea;
    public $usuario_tarea_estado;
    public $fecha_tarea_estado;
    public $tarea_estado;
    public $ruta;
    public $documento_tarea;

 

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
     * Get the value of id_prioridad
     */
    public function getIdPrioridad()
    {
        return $this->id_prioridad;
    }

    /**
     * Set the value of id_prioridad
     */
    public function setIdPrioridad($id_prioridad): self
    {
        $this->id_prioridad = $id_prioridad;

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
     * Get the value of id_estatus_solicitud
     */
    public function getIdEstatusSolicitud()
    {
        return $this->id_estatus_solicitud;
    }

    /**
     * Set the value of id_estatus_solicitud
     */
    public function setIdEstatusSolicitud($id_estatus_solicitud): self
    {
        $this->id_estatus_solicitud = $id_estatus_solicitud;

        return $this;
    }

    /**
     * Get the value of estatus_solicitud
     */
    public function getEstatusSolicitud()
    {
        return $this->estatus_solicitud;
    }

    /**
     * Set the value of estatus_solicitud
     */
    public function setEstatusSolicitud($estatus_solicitud): self
    {
        $this->estatus_solicitud = $estatus_solicitud;

        return $this;
    }

    /**
     * Get the value of id_tipo_solicitud
     */
    public function getIdTipoSolicitud()
    {
        return $this->id_tipo_solicitud;
    }

    /**
     * Set the value of id_tipo_solicitud
     */
    public function setIdTipoSolicitud($id_tipo_solicitud): self
    {
        $this->id_tipo_solicitud = $id_tipo_solicitud;

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
     * Get the value of carpeta
     */
    public function getCarpeta()
    {
        return $this->carpeta;
    }

    /**
     * Set the value of carpeta
     */
    public function setCarpeta($carpeta): self
    {
        $this->carpeta = $carpeta;

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
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     */
    public function setUsuario($usuario): self
    {
        $this->usuario = $usuario;

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

    /**
     * Get the value of id_tarea_estado
     */
    public function getIdTareaEstado()
    {
        return $this->id_tarea_estado;
    }

    /**
     * Set the value of id_tarea_estado
     */
    public function setIdTareaEstado($id_tarea_estado): self
    {
        $this->id_tarea_estado = $id_tarea_estado;

        return $this;
    }

    /**
     * Get the value of id_tarea
     */
    public function getIdTarea()
    {
        return $this->id_tarea;
    }

    /**
     * Set the value of id_tarea
     */
    public function setIdTarea($id_tarea): self
    {
        $this->id_tarea = $id_tarea;

        return $this;
    }

    /**
     * Get the value of usuario_tarea_estado
     */
    public function getUsuarioTareaEstado()
    {
        return $this->usuario_tarea_estado;
    }

    /**
     * Set the value of usuario_tarea_estado
     */
    public function setUsuarioTareaEstado($usuario_tarea_estado): self
    {
        $this->usuario_tarea_estado = $usuario_tarea_estado;

        return $this;
    }

    /**
     * Get the value of fecha_tarea_estado
     */
    public function getFechaTareaEstado()
    {
        return $this->fecha_tarea_estado;
    }

    /**
     * Set the value of fecha_tarea_estado
     */
    public function setFechaTareaEstado($fecha_tarea_estado): self
    {
        $this->fecha_tarea_estado = $fecha_tarea_estado;

        return $this;
    }

    /**
     * Get the value of tarea_estado
     */
    public function getTareaEstado()
    {
        return $this->tarea_estado;
    }

    /**
     * Set the value of tarea_estado
     */
    public function setTareaEstado($tarea_estado): self
    {
        $this->tarea_estado = $tarea_estado;

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
     * Get the value of documento_tarea
     */
    public function getDocumentoTarea()
    {
        return $this->documento_tarea;
    }

    /**
     * Set the value of documento_tarea
     */
    public function setDocumentoTarea($documento_tarea): self
    {
        $this->documento_tarea = $documento_tarea;

        return $this;
    }
}


?>