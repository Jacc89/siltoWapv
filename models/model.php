<?php

class Model{
    private $conexion;

    function __construct(){
        require_once 'conexion.php';
        $this->conexion = new Conexion();
        $this->conexion->conectar();
    }
    function listarDepartamentos(){
        $sql = "call SP_LISTARDEPARTAMENTOS";
        $arreglo = array();
        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    }

    function listarCiudades($iddepartamento){
        $sql = "call SP_LISTARCIUDADES('$iddepartamento')";
        $arreglo = array();
        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    }
    
}




?>