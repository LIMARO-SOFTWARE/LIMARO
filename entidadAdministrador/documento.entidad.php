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
    public $id_macroproceso;
    public $macroproceso;
    public $objetivo_documento;
    public $version_ante;



    /**
     * Get the value of id_documento
     */
    public function getIdDocumento()
    {
        return $this->id_documento;
    }

    /**
     * Set the value of id_documento
     */
    public function setIdDocumento($id_documento): self
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
     */
    public function setIdTipoDocumento($id_tipo_documento): self
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
     */
    public function setIdProceso($id_proceso): self
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
     */
    public function setCodigo($codigo): self
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
     */
    public function setNombreDocumento($nombre_documento): self
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
     */
    public function setIdVersionamiento($id_versionamiento): self
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
     */
    public function setNumeroVersion($numero_version): self
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
     */
    public function setDescripcionVersion($descripcion_version): self
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
     */
    public function setUsuarioCreacion($usuario_creacion): self
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
     */
    public function setFechaCreacion($fecha_creacion): self
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
     */
    public function setUsuarioRevision($usuario_revision): self
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
     */
    public function setFechaRevision($fecha_revision): self
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
     */
    public function setUsuarioAprobacion($usuario_aprobacion): self
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
     */
    public function setFechaAprobacion($fecha_aprobacion): self
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
     */
    public function setDocumento($documento): self
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
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of id_macroproceso
     */
    public function getIdMacroproceso()
    {
        return $this->id_macroproceso;
    }

    /**
     * Set the value of id_macroproceso
     */
    public function setIdMacroproceso($id_macroproceso): self
    {
        $this->id_macroproceso = $id_macroproceso;

        return $this;
    }

    /**
     * Get the value of macroproceso
     */
    public function getMacroproceso()
    {
        return $this->macroproceso;
    }

    /**
     * Set the value of macroproceso
     */
    public function setMacroproceso($macroproceso): self
    {
        $this->macroproceso = $macroproceso;

        return $this;
    }

    /**
     * Get the value of objetivo_documento
     */
    public function getObjetivoDocumento()
    {
        return $this->objetivo_documento;
    }

    /**
     * Set the value of objetivo_documento
     */
    public function setObjetivoDocumento($objetivo_documento): self
    {
        $this->objetivo_documento = $objetivo_documento;

        return $this;
    }

    /**
     * Get the value of version_ante
     */
    public function getVersionAnte()
    {
        return $this->version_ante;
    }

    /**
     * Set the value of version_ante
     */
    public function setVersionAnte($version_ante): self
    {
        $this->version_ante = $version_ante;

        return $this;
    }
}


?>