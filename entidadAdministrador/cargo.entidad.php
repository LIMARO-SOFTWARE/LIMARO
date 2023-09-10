<?php
namespace entidad;

class Cargo {

    public $id_cargo;
    public $cargo;
    public $manual_funciones;
    public $estado;  

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
     * Get the value of cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set the value of cargo
     *
     * @return  self
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get the value of manual_funciones
     */
    public function getManualFunciones()
    {
        return $this->manual_funciones;
    }

    /**
     * Set the value of manual_funciones
     *
     * @return  self
     */
    public function setManualFunciones($manual_funciones)
    {
        $this->manual_funciones = $manual_funciones;

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