<?php

namespace modelo;

include_once "../entidadLogin/login.entidad.php";
include_once "../entorno/conexionSingleton.php";


use PDO;

class login{

    public $idUsuario;
    public $Usuario;
    public $clave;

    // OTROS ATRIBUTOS //

    public  $result;
    public  $retorno;
    public  $respuesta;
    public  $conexion;
    public  $sql;

    public function __construct(\entidad\login $loginE)
    {
        $this->id_usuario = $loginE->getId_usuario ();
        $this->usuario = $loginE->getUsuario();
        $this->clave = $loginE->getClave();
        $this->conexion = \Conexion::singleton();
    }

    public function read()
    {
        try {
            $this->sql="SELECT 
            us.`id_usuario`,
            us.`usuario`,
            us.`estado` as estadoUsuario,
            rol.`id_rol`,
            rol.`rol`,
            rol.`estado`,
            emp.`id_empleado`,
            emp.`nombre_completo`,
            emp.`correo_empleado`,
            emp.`img_empleado`,
            car.`cargo`,
            car.`id_cargo`,
            car.`manual_funciones`,
            ems.`nombre_empresa`,
            ems.`logo`
            FROM usuario AS us
            INNER JOIN rol AS rol ON us.`id_rol` = rol.`id_rol`
            INNER JOIN empleado AS emp ON us.`id_empleado` = emp.`id_empleado`
            INNER JOIN cargo AS car ON  emp.`id_cargo` = car.`id_cargo`
            INNER JOIN empresa AS ems ON emp.`id_empresa` = ems.`id_empresa`
            WHERE usuario ='$this->usuario' AND clave = AES_ENCRYPT('$this->clave','kddbjw8b3d') ";
            $this->result = $this->conexion->query($this->sql);
            $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $this->retorno= $e->getMessage();
        }
        return $this->retorno;
        
    }
 
    public function newpass()
    {
        try {
            $this->sql="UPDATE usuario SET  clave = AES_ENCRYPT('$this->clave','kddbjw8b3d'), estado='ACTIVO'
            WHERE usuario = '$this->usuario' AND estado = 'CREADO' ";
            $this->result=$this->conexion->query($this->sql);
            $this->retorno = $this->result->rowCount();

        } catch (Exception $e) {
            $this->retorno =$e->getMessage();
        }
        return $this->retorno;
    }


} 

?>