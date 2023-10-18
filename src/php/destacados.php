<?php
require_once('./modelo.php');
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sudadera = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
    $datos = $sudadera->obtenerDatos("SELECT * FROM destacados WHERE id = '$id'");
    $sudaderas = $sudadera->convertirDatos($datos);
    if (count($sudaderas)) {
        $titulo = $sudaderas[0]->nombre;
        $precio = $sudaderas[0]->precio;
        $descripcion = $sudaderas[0]->descripcion;

        echo "<h2>$titulo</h2>";
        echo "<h3>$precio</h3>";
        echo "<h3>$descripcion</h3>";
    } else {
        echo "no se encuentra el producto";
    }
} else {
    echo "error";
}
?>
<a href="./index.php">
    <button type="button">volver</button>
</a>