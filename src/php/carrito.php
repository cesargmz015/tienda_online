<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carrito</title>
    <script>
        const meterAlCarrito = (id_producto, id_usuario) => {
            //COMPROBAMOS SI EL USUARIO EXISTE
            if (id_usuario == null || typeof id_usuario === "undefined" || id_usuario == 0) {
                //COMPRUEBO SI HAY CARRITO
                if (localStorage.getItem("carrito") == null) {
                    //SI NO HAY CARRITO CREO EL CARRITO Y AÑADO 1 DEL PRODUCTO
                    localStorage.setItem("carrito", JSON.stringify({
                        id_producto: id_producto,
                        cantidad: 1
                    }));
                    console.log("añadido correctamente")
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
                fetch(`procesar-carrito.php?id_producto=${id_producto}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log("guardado correctamente");
                        } else {
                            console.log("guardado fallido");
                        }
                    });
            }

        }
        let params = new URLSearchParams(window.location.search);

        const id_producto = params.get('id');
        const id_usuario = params.get('id_usuario');
        meterAlCarrito(id_producto, id_usuario);
    </script>
</head>

<body>
    <?php
    $paginaAnterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'default.php';

    echo '<a href="' . $paginaAnterior . '"><button type="button">Volver</button></a>';

    ?>
</body>

</html>