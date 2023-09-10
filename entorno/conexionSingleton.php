<?php

class Conexion extends PDO
{
    public $conn = null;
    private $ultimoId = null;
    private static $instancia = null;

    public function __construct()
    {
       // parent::__construct('mysql:dbname=limaro;host=localhost', 'root', '');
        parent::__construct('mysql:dbname=limaro22_cop;host=localhost','limaro22_edward4212','Kddbjw8b3d%');
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function ultimoId()
    {
        $sql = "SELECT LAST_INSERT_ID() as lastid";
        $this->ultimoId = $this->query($sql);
        $respuesta = $this->ultimoId->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta[0]['lastid'];
    }

    public static function singleton()
    {
        if (!self::$instancia) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    public static function cerrar()
    {
        self::$instancia = null;
    }
}

?>