<?php
namespace entidad;

class TipoDocumento {

    public $id_tipo_documento;
    public $tipo_documento;
    public $sigla_tipo_documento;
    public $estado;


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
     * Get the value of tipo_documento
     */
    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }

    /**
     * Set the value of tipo_documento
     *
     * @return  self
     */
    public function setTipoDocumento($tipo_documento)
    {
        $this->tipo_documento = $tipo_documento;

        return $this;
    }

    /**
     * Get the value of sigla_tipo_documento
     */
    public function getSiglaTipoDocumento()
    {
        return $this->sigla_tipo_documento;
    }

    /**
     * Set the value of sigla_tipo_documento
     *
     * @return  self
     */
    public function setSiglaTipoDocumento($sigla_tipo_documento)
    {
        $this->sigla_tipo_documento = $sigla_tipo_documento;

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