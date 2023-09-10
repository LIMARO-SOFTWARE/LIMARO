<?php
namespace entidad;

class Inicio {

    public $id_empresa;
    public $nombre_empresa;
    public $logo;
    public $mision;
    public $vision;
    public $politica_calidad;
    public $objetivos_calidad;
    public $organigrama;
    public $mapa_procesos;
    
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
     * Get the value of nombre_empresa
     */
    public function getNombreEmpresa()
    {
        return $this->nombre_empresa;
    }

    /**
     * Set the value of nombre_empresa
     *
     * @return  self
     */
    public function setNombreEmpresa($nombre_empresa)
    {
        $this->nombre_empresa = $nombre_empresa;

        return $this;
    }

    /**
     * Get the value of logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of logo
     *
     * @return  self
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get the value of mision
     */
    public function getMision()
    {
        return $this->mision;
    }

    /**
     * Set the value of mision
     *
     * @return  self
     */
    public function setMision($mision)
    {
        $this->mision = $mision;

        return $this;
    }

    /**
     * Get the value of vision
     */
    public function getVision()
    {
        return $this->vision;
    }

    /**
     * Set the value of vision
     *
     * @return  self
     */
    public function setVision($vision)
    {
        $this->vision = $vision;

        return $this;
    }

    /**
     * Get the value of politica_calidad
     */
    public function getPoliticaCalidad()
    {
        return $this->politica_calidad;
    }

    /**
     * Set the value of politica_calidad
     *
     * @return  self
     */
    public function setPoliticaCalidad($politica_calidad)
    {
        $this->politica_calidad = $politica_calidad;

        return $this;
    }

    /**
     * Get the value of objetivos_calidad
     */
    public function getObjetivosCalidad()
    {
        return $this->objetivos_calidad;
    }

    /**
     * Set the value of objetivos_calidad
     *
     * @return  self
     */
    public function setObjetivosCalidad($objetivos_calidad)
    {
        $this->objetivos_calidad = $objetivos_calidad;

        return $this;
    }

    /**
     * Get the value of organigrama
     */
    public function getOrganigrama()
    {
        return $this->organigrama;
    }

    /**
     * Set the value of organigrama
     *
     * @return  self
     */
    public function setOrganigrama($organigrama)
    {
        $this->organigrama = $organigrama;

        return $this;
    }

    /**
     * Get the value of mapa_procesos
     */
    public function getMapaProcesos()
    {
        return $this->mapa_procesos;
    }

    /**
     * Set the value of mapa_procesos
     *
     * @return  self
     */
    public function setMapaProcesos($mapa_procesos)
    {
        $this->mapa_procesos = $mapa_procesos;

        return $this;
    }
}


?>