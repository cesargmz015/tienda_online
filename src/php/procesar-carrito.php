<?php
session_start();
require_once('./modelo.php');
// require_once("./carrito.php");
$conexionBBDD = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
// $id_producto = $_GET["id"];
$id_usuario = $_SESSION["id"];
$id_producto = $_GET["id_producto"];
$cantidad_nueva = $_GET["cantidad"];
$tabla = $_GET["tabla"];

$datos = $conexionBBDD->obtenerDatos("SELECT * FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto' AND tabla = '$tabla'");

if ($datos->num_rows <= 0) {
    // El producto no está en el carrito, así que lo añadimos
    $insercion = $conexionBBDD->insertarDatos("INSERT INTO carrito (id_producto, id_usuario, cantidad, tabla) VALUES ('$id_producto', '$id_usuario', '$cantidad_nueva', '$tabla')");
} else {
    // El producto ya está en el carrito, así que modificamos su cantidad
    $columna = $conexionBBDD->convertirDatos($datos);
    $cantidad = $columna[0]->cantidad;
    $cantidad = $cantidad_nueva;

    $insercion2 = $conexionBBDD->insertarDatos("UPDATE carrito SET cantidad = '$cantidad' WHERE id_producto = '$id_producto' AND id_usuario = '$id_usuario' AND tabla = '$tabla'");
}

$carrito = $conexionBBDD->obtenerDatos("SELECT * FROM carrito WHERE id_usuario = '$id_usuario' ORDER BY id_producto_en_carrito DESC");
$carrito = $conexionBBDD->convertirDatos($carrito);

$respuesta_consulta = array();

for ($i = 0; $i < count($carrito); $i++) {
    $id_producto_carrito = $carrito[$i]->id_producto;
    $cantidad_carrito = $carrito[$i]->cantidad;
    $tabla_carrito = $carrito[$i]->tabla;

    // Crear un array asociativo para cada producto
    $producto = array(
        'Producto' => $id_producto_carrito,
        'Cantidad' => $cantidad_carrito,
        'Tabla' => $tabla_carrito
    );

    // Añadir el producto al array de respuesta
    array_push($respuesta_consulta, $producto);
}
echo json_encode($respuesta_consulta);
