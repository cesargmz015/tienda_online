<?php
session_start();
require_once('./modelo.php');
// require_once("./carrito.php");
$conexionBBDD = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
// $id_producto = $_GET["id"];
$id_usuario = $_SESSION["id"];
$id_producto = $_GET["id_producto"];

$datos = $conexionBBDD->obtenerDatos("SELECT cantidad FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'");
$conexionBBDD = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
// $id_usuario = isset($_SESSION["id"]) ? $_SESSION["id"] : "null";
$datos = $conexionBBDD->obtenerDatos("SELECT cantidad FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'");

if ($datos->num_rows <= 0) {
    // El producto no está en el carrito, así que lo añadimos
    $insercion = $conexionBBDD->insertarDatos("INSERT INTO carrito (id_producto, id_usuario, cantidad) VALUES ('$id_producto', '$id_usuario', 1)");
    $response = (['success' => true]);
} else {
    // El producto ya está en el carrito, así que incrementamos su cantidad
    $columna = $conexionBBDD->convertirDatos($datos);
    $cantidad = $columna[0]->cantidad;
    $cantidad++;

    $insercion2 = $conexionBBDD->insertarDatos("UPDATE carrito SET cantidad = '$cantidad' WHERE id_producto = '$id_producto' AND id_usuario = '$id_usuario'");
    $response = (['success' => true]);
}
echo json_encode($response);
