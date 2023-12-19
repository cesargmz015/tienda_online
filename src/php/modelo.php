<?php
class conexionBBDD {
    private $conn;
    function __construct($usuario, $contra, $servidor, $bbdd) {
        $this->conn = new mysqli($servidor, $usuario, $contra, $bbdd);
    }
    function obtenerDatos($consulta, $params = []) {
        $stmt = $this->conn->prepare($consulta);
        if ($params) {
            mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
        }
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }
    function convertirDatos($respuesta) {
        $arrayDatos = array();
        while ($dato = $respuesta->fetch_object()) {
            $arrayDatos[] = $dato;
        }
        return $arrayDatos;
    }
    function insertarDatos($insercion, $params = []) {
        $stmt = $this->conn->prepare($insercion);
        if ($params) {
            mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
        }
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_affected_rows($stmt);
    }
    function eliminarDatos($eliminacion, $params = []) {
        $stmt = $this->conn->prepare($eliminacion);
        if ($params) {
            mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
        }
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_affected_rows($stmt);
    }
}