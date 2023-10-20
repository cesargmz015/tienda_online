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
    /*function modificacion($consulta){
            $consulta = mysqli_query($this->conn, $consulta);
            $lineas = $consulta->affected_rows($consulta);
            return "Se han actualizado $lineas registros";
        }*/
    function insertarDatos($insercion) {
        return mysqli_query($this->conn, $insercion);
    }
}


/*$conexion = new conexionBBDD("root", "", "127.0.0.1:3307", "resturante");
    $datosCompletos = $conexion->obtenerDatos("SELECT * FROM empleados");
    $datosConvertidos = $conexion->convertirDatos($datosCompletos);
    var_dump($datosConvertidos);*/
?>

<?php
/*
$conn = new mysqli($usuario, $contra, $servidor, $bbdd);
$respuesta = mysqli_query($conn, "SELECT * FROM usuario");
$arrayDatos = array();
while($dato = $respuesta->fetch_object()){
    $arrayDatos[] = $dato;
}

*/
?>