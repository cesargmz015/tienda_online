<?php
session_start();
require_once('./modelo.php');
$conexionBBDD = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
$id_producto = $_GET["id"];
// $id_usuario = isset($_SESSION["id"]) ? $_SESSION["id"] : "null";
$id_usuario = $_GET["id_usuario"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carrito</title>
    <script>
        const meterAlCarrito = (id_producto, id_usuario) => {
            //COMPROBAMOS SI EL USUARIO EXISTE
            if (id_usuario === null || id_usuario === "null" || typeof id_usuario === "undefined") {
                //COMPRUEBO SI HAY CARRITO
                if (localStorage.getItem("carrito") == null) {
                    //SI NO HAY CARRITO CREO EL CARRITO Y AÑADO 1 DEL PRODUCTO
                    localStorage.setItem("carrito", JSON.stringify({
                        id_producto: id_producto,
                        cantidad: 1
                    }));
                } else {
                    // SI HAY CARRITO

                    // CARGO LOS DATOS DEL CARRITO
                    const carrito = localStorage.getItem("carrito");
                    // LOS CONVIERTO A UN ARRAY
                    const productos = carrito.split("&");

                    // CREO UN TEXTO VACIO Y UNA VARIABLE DE CONTROL
                    let existe = false;
                    let texto = "";
                    // PARA CADA PRODUCTO
                    for (let i = 0; i < productos.length; i++) {
                        producto = JSON.parse(productos[i]);
                        // COMPRUEBO SI EXISTE EL PRODUCTO
                        if (producto.id_producto == id_producto) {
                            // SI EXISTE SUMO 1 Y CAMBIO LA VARIABLE DE CANTIDAD
                            existe = true;
                            producto.cantidad += 1;
                        }
                        // AÑADO EL TEXTO DEL PRODUCTO A LA VARIABLE
                        texto += JSON.stringify(producto) + "&";
                    }
                    // SI NO EXISTE EL PRODUCTO
                    if (!existe) {
                        // AÑADO EL PRODUCTO AL FINAL DEL STRING
                        const productoNuevo = JSON.stringify({
                            id_producto: id_producto,
                            cantidad: 1
                        });
                        localStorage.setItem("carrito", localStorage.getItem("carrito") + "&" + productoNuevo);
                        console.log("añadido correctamente");
                    } else {
                        // SI EXISTE EL PRODUCTO QUITO EL ÚLTIMO & DEL STRING
                        texto = texto.substr(0, texto.length - 1);
                        // REEMPLAZO LOS DATOS POR LOS ACTUALIZADOS
                        localStorage.setItem("carrito", texto);
                        console.log("añadido correctamente");
                    }
                }
            } else {
                <?php
                $datos = $conexionBBDD->obtenerDatos("SELECT cantidad FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'");

                if ($datos->num_rows <= 0) {
                    // El producto no está en el carrito, así que lo añadimos
                    $insercion = $conexionBBDD->insertarDatos("INSERT INTO carrito (id_producto, id_usuario, cantidad) VALUES ('$id_producto', '$id_usuario', 1)");
                } else {
                    // El producto ya está en el carrito, así que incrementamos su cantidad
                    $columna = $conexionBBDD->convertirDatos($datos);
                    $cantidad = $columna[0]->cantidad;
                    $cantidad++;

                    $insercion2 = $conexionBBDD->insertarDatos("UPDATE carrito SET cantidad = '$cantidad' WHERE id_producto = '$id_producto' AND id_usuario = '$id_usuario'");
                }
                ?>
                console.log("producto guardado correctamente");

            }
            /* fetch(`agregarProducto.php?id=${id}`)
                .then(respuesta => {
                    return respuesta.json();
                })
                .then(respuestaJSON => {
                    if (respuestaJSON.ok) {
                        alert("Bien");
                    } else {
                        alert("Mal");
                    }
                })
            alert(1) */

        }
        /* const boton = document.querySelector("#login");
        boton.onclick = () => {
            fetch("login.php")
                .then(() => {
                    window.location.reload();
                })

        }
        const boton2 = document.querySelector("#logout");
        boton2.onclick = () => {
            fetch("logout.php");
        } */
        meterAlCarrito(<?= $id_producto ?>, <?= $id_usuario ?>);
    </script>
</head>

<body>
    <?php
    $paginaAnterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'default.php';

    echo '<a href="' . $paginaAnterior . '"><button type="button">Volver</button></a>';

    ?>
</body>

</html>