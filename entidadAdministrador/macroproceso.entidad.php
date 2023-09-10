<?php
namespace entidad;

class Macroproceso {

    public $id_macroproceso;
    public $macroproceso;
    public $objetivo;
    public $estado;



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
}


?>