<?php
session_start();
require_once('./modelo.php');
$conexionBBDD = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
$id_usuario = isset($_SESSION["id"]) ? $_SESSION["id"] : null;

$carrito = $conexionBBDD->obtenerDatos("SELECT * FROM carrito WHERE id_usuario = '$id_usuario' ORDER BY id_producto_en_carrito DESC");
$carrito = $conexionBBDD->convertirDatos($carrito);

for ($i = 0; $i < count($carrito); $i++) {
    $id_producto_en_carrito = $carrito[$i]->id_producto_en_carrito;
    $id_producto_carrito = $carrito[$i]->id_producto;
    $cantidad_carrito = $carrito[$i]->cantidad;
    $tabla_carrito = $carrito[$i]->tabla;
    // imprimir el carrito
    echo "<div>
        <h2>Producto: {$id_producto_carrito}</h2>
        <h3>Tabla: {$tabla_carrito}</h3>
        <h3>Cantidad: {$cantidad_carrito}</h3>
        <button type='button' onclick='eliminarProductoBD({$id_producto_en_carrito})'>Eliminar</button>
    </div>";
}
