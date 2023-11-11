<?php
session_start();
require_once('./modelo.php');
// require_once("./carrito.php");
$conexionBBDD = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
// $id_producto = $_GET["id"];
$id_usuario = $_SESSION["id"];
$id_producto = $_GET["id_producto"];
$cantidad_nueva = $_GET["cantidad"];

$datos = $conexionBBDD->obtenerDatos("SELECT cantidad FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'");

if ($datos->num_rows <= 0) {
    // El producto no está en el carrito, así que lo añadimos
    $insercion = $conexionBBDD->insertarDatos("INSERT INTO carrito (id_producto, id_usuario, cantidad) VALUES ('$id_producto', '$id_usuario', '$cantidad_nueva')");
} else {
    // El producto ya está en el carrito, así que modificamos su cantidad
    $columna = $conexionBBDD->convertirDatos($datos);
    $cantidad = $columna[0]->cantidad;
    $cantidad = $cantidad_nueva;

    $insercion2 = $conexionBBDD->insertarDatos("UPDATE carrito SET cantidad = '$cantidad' WHERE id_producto = '$id_producto' AND id_usuario = '$id_usuario'");
}

$carrito = $conexionBBDD->obtenerDatos("SELECT * FROM carrito WHERE id_usuario = '$id_usuario'");
$carrito = $conexionBBDD->convertirDatos($carrito);

$respuesta_consulta = array();

for ($i = 0; $i < count($carrito); $i++) {
    $id_producto_carrito = $carrito[$i]->id_producto;
    $cantidad_carrito = $carrito[$i]->cantidad;

    // Crear un array asociativo para cada producto
    $producto = array(
        'Producto' => $id_producto_carrito,
        'Cantidad' => $cantidad_carrito
    );

    // Añadir el producto al array de respuesta
    array_push($respuesta_consulta, $producto);
}
echo json_encode($respuesta_consulta);
