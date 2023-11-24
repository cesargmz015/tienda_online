<?php
session_start();
require_once('./modelo.php');
$conexionBBDD = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
$id_usuario = isset($_SESSION["id"]) ? $_SESSION["id"] : null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carrito</title>
    <link rel="stylesheet" href="../styles/carrito.css">
    <script>
        window.onload = () => {
            const imprimir_carrito = () => {
                if ("<?php echo $id_usuario; ?>" == null || "<?php echo $id_usuario; ?>" == "undefined" || "<?php echo $id_usuario; ?>" == 0) {
                    const productos = localStorage.getItem("carrito");
                    let div = "";
                    let titulo = `<h1>Carrito</h1>`;

                    if (productos) {
                        const arrayProductos = productos.split("&").reverse();

                        arrayProductos.forEach(producto => {
                            const productoJSON = JSON.parse(producto);
                            const id = productoJSON.id_producto;
                            const cantidad = productoJSON.cantidad;
                            const tabla = productoJSON.tabla;
                            div += `
                            <div>
                                <h2>Producto: ${id}</h2>
                                <h3>Tabla: ${tabla}</h3>
                                <h3>Cantidad: ${cantidad}</h3>
                            </div>
                        `;
                        });
                    } else {
                        div = "<p>El carrito está vacío</p>";
                    }

                    const titulo_carrito = document.querySelector(".titulo-carrito");
                    titulo_carrito.innerHTML = titulo;
                    const div_productos = document.querySelector(".div-productos");
                    div_productos.innerHTML = div;
                } else {
                    fetch('./imprimir-carrito.php')
                        .then(response => response.text())
                        .then(data => {
                            let titulo = `<h1>Carrito</h1>`;
                            let div = data;

                            if (!data) {
                                div = "<p>El carrito está vacío</p>";
                            }

                            const titulo_carrito = document.querySelector(".titulo-carrito");
                            titulo_carrito.innerHTML = titulo;
                            const div_productos = document.querySelector(".div-productos");
                            div_productos.innerHTML = div;
                        });
                }
            }

            imprimir_carrito();
        }
    </script>
</head>

<body>
    <?php
    $paginaAnterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : './index.php';
    ?>

    <a href="<?= $paginaAnterior ?>"><button type="button">Volver</button></a>
    <div id="titulo-carrito" class="titulo-carrito"></div>
    <div class="div-productos"></div>
    </form>
</body>

</html>