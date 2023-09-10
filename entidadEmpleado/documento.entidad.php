<?php
namespace entidad;

class Documento {

    public $id_documento;
    public $id_tipo_documento;
    public $id_proceso;
    public $codigo;
    public $nombre_documento;
    public $id_versionamiento;
    public $numero_version;
    public $descripcion_version;
    public $usuario_creacion;
    public $fecha_creacion;
    public $usuario_revision;
    public $fecha_revision;
    public $usuario_aprobacion;
    public $fecha_aprobacion;
    public $documento;
    public $estado;
  


    /**
     * Get the value of id_documento
     */
    public function getIdDocumento()
    {
        return $this->id_documento;
    }

    /**
     * Set the value of id_documento
     *
     * @return  self
     */
    public function setIdDocumento($id_documento)
    {
        $this->id_documento = $id_documento;

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
     *
     * @return  self
     */
    public function setIdTipoDocumento($id_tipo_documento)
    {
        $this->id_tipo_documento = $id_tipo_documento;

        return $this;
    }

    /**
     * Get the value of id_proceso
     */
    public function getIdProceso()
    {
        return $this->id_proceso;
    }

    /**
     * Set the value of id_proceso
     *
     * @return  self
     */
    public function setIdProceso($id_proceso)
    {
        $this->id_proceso = $id_proceso;

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
     *
     * @return  self
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of nombre_documento
     */
    public function getNombreDocumento()
    {
        return $this->nombre_documento;
    }

    /**
     * Set the value of nombre_documento
     *
     * @return  self
     */
    public function setNombreDocumento($nombre_documento)
    {
        $this->nombre_documento = $nombre_documento;

        return $this;
    }

    /**
     * Get the value of id_versionamiento
     */
    public function getIdVersionamiento()
    {
        return $this->id_versionamiento;
    }

    /**
     * Set the value of id_versionamiento
     *
     * @return  self
     */
    public function setIdVersionamiento($id_versionamiento)
    {
        $this->id_versionamiento = $id_versionamiento;

        return $this;
    }

    /**
     * Get the value of numero_version
     */
    public function getNumeroVersion()
    {
        return $this->numero_version;
    }

    /**
     * Set the value of numero_version
     *
     * @return  self
     */
    public function setNumeroVersion($numero_version)
    {
        $this->numero_version = $numero_version;

        return $this;
    }

    /**
     * Get the value of descripcion_version
     */
    public function getDescripcionVersion()
    {
        return $this->descripcion_version;
    }

    /**
     * Set the value of descripcion_version
     *
     * @return  self
     */
    public function setDescripcionVersion($descripcion_version)
    {
        $this->descripcion_version = $descripcion_version;

        return $this;
    }

    /**
     * Get the value of usuario_creacion
     */
    public function getUsuarioCreacion()
    {
        return $this->usuario_creacion;
    }

    /**
     * Set the value of usuario_creacion
     *
     * @return  self
     */
    public function setUsuarioCreacion($usuario_creacion)
    {
        $this->usuario_creacion = $usuario_creacion;

        return $this;
    }

    /**
     * Get the value of fecha_creacion
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * Set the value of fecha_creacion
     *
     * @return  self
     */
    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }

    /**
     * Get the value of usuario_revision
     */
    public function getUsuarioRevision()
    {
        return $this->usuario_revision;
    }

    /**
     * Set the value of usuario_revision
     *
     * @return  self
     */
    public function setUsuarioRevision($usuario_revision)
    {
        $this->usuario_revision = $usuario_revision;

        return $this;
    }

    /**
     * Get the value of fecha_revision
     */
    public function getFechaRevision()
    {
        return $this->fecha_revision;
    }

    /**
     * Set the value of fecha_revision
     *
     * @return  self
     */
    public function setFechaRevision($fecha_revision)
    {
        $this->fecha_revision = $fecha_revision;

        return $this;
    }

    /**
     * Get the value of usuario_aprobacion
     */
    public function getUsuarioAprobacion()
    {
        return $this->usuario_aprobacion;
    }

    /**
     * Set the value of usuario_aprobacion
     *
     * @return  self
     */
    public function setUsuarioAprobacion($usuario_aprobacion)
    {
        $this->usuario_aprobacion = $usuario_aprobacion;

        return $this;
    }

    /**
     * Get the value of fecha_aprobacion
     */
    public function getFechaAprobacion()
    {
        return $this->fecha_aprobacion;
    }

    /**
     * Set the value of fecha_aprobacion
     *
     * @return  self
     */
    public function setFechaAprobacion($fecha_aprobacion)
    {
        $this->fecha_aprobacion = $fecha_aprobacion;

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
     *
     * @return  self
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

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