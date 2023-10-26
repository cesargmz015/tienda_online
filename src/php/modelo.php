<?php
class conexionBBDD {
    private $conn;
    function __construct($usuario, $contra, $servidor, $bbdd) {
        $this->conn = new mysqli($servidor, $usuario, $contra, $bbdd);
    }
    function obtenerDatos($consulta) {
        return mysqli_query($this->conn, $consulta);
    }
    function convertirDatos($respuesta) {
        $arrayDatos = array();
        while ($dato = $respuesta->fetch_object()) {
            $arrayDatos[] = $dato;
        }
        return $arrayDatos;
    }
    function insertarDatos($insercion) {
        return mysqli_query($this->conn, $insercion);
    }

    function eliminarDatos($eliminacion) {
        return mysqli_query($this->conn, $eliminacion);
    }
}
