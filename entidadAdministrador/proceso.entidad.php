<?php
namespace entidad;

class Proceso {

    public $id_proceso;
    public $id_macroproceso;
    public $proceso;
    public $sigla_proceso;
    public $objetivo;
    public $estado;
    public $macroproceso;

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
     * Get the value of id_macroproceso
     */
    public function getIdMacroproceso()
    {
        return $this->id_macroproceso;
    }

    /**
     * Set the value of id_macroproceso
     *
     * @return  self
     */
    public function setIdMacroproceso($id_macroproceso)
    {
        $this->id_macroproceso = $id_macroproceso;

        return $this;
    }

    /**
     * Get the value of proceso
     */
    public function getProceso()
    {
        return $this->proceso;
    }

    /**
     * Set the value of proceso
     *
     * @return  self
     */
    public function setProceso($proceso)
    {
        $this->proceso = $proceso;

        return $this;
    }

    /**
     * Get the value of sigla_proceso
     */
    public function getSiglaProceso()
    {
        return $this->sigla_proceso;
    }

    /**
     * Set the value of sigla_proceso
     *
     * @return  self
     */
    public function setSiglaProceso($sigla_proceso)
    {
        $this->sigla_proceso = $sigla_proceso;

        return $this;
    }

    /**
     * Get the value of objetivo
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set the value of objetivo
     *
     * @return  self
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;

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

    /**
     * Get the value of macroproceso
     */
    public function getMacroproceso()
    {
        return $this->macroproceso;
    }

    /**
     * Set the value of macroproceso
     *
     * @return  self
     */
    public function setMacroproceso($macroproceso)
    {
        $this->macroproceso = $macroproceso;

        return $this;
    }
}


?>