window.onload = () => {
    const meterAlCarrito = (id_producto, id_usuario, cantidad_nueva, tabla) => {
        //COMPROBAMOS SI EL USUARIO EXISTE
        if (id_usuario == null || id_usuario === "undefined" || id_usuario == 0) {
            //COMPRUEBO SI HAY CARRITO
            if (localStorage.getItem("carrito") == null) {
                //SI NO HAY CARRITO CREO EL CARRITO Y AÑADO 1 DEL PRODUCTO
                localStorage.setItem("carrito", JSON.stringify({
                    id_producto: id_producto,
                    tabla: tabla,
                    cantidad: cantidad_nueva
                }));
                console.log("añadido correctamente");
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
                    if (producto.id_producto == id_producto && producto.tabla == tabla) {
                        // SI EXISTE SUMO 1 Y CAMBIO LA VARIABLE DE CANTIDAD
                        existe = true;
                        producto.cantidad = cantidad_nueva;
                    }
                    // AÑADO EL TEXTO DEL PRODUCTO A LA VARIABLE
                    texto += JSON.stringify(producto) + "&";
                }
                // SI NO EXISTE EL PRODUCTO
                if (!existe) {
                    // AÑADO EL PRODUCTO AL FINAL DEL STRING
                    const productoNuevo = JSON.stringify({
                        id_producto: id_producto,
                        tabla: tabla,
                        cantidad: cantidad_nueva
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
            const productos = localStorage.getItem("carrito");
            const arrayProductos = productos.split("&").reverse();

            let div = "";
            let titulo = `<h1>Carrito</h1>`;

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
                const titulo_carrito = document.querySelector(".titulo-carrito");
                titulo_carrito.innerHTML = titulo;
                const div_productos = document.querySelector(".div-productos");
                div_productos.innerHTML = div;
            });
        } else {
            fetch(`procesar-carrito.php?id_producto=${id_producto}&cantidad=${cantidad_nueva}&tabla=${tabla}`)
                .then(response => response.json())
                .then(response => {
                    if (response) {
                        let html = "";
                        let titulo = `<h1>Carrito</h1>`;

                        response.forEach(producto => {
                            const id = producto.Producto;
                            const cantidad = producto.Cantidad;
                            const tabla = producto.Tabla;
                            html += `
                                <div>
                                    <h2>Producto: ${id}</h2>
                                    <h3>Tabla: ${tabla}</h3>
                                    <h3>Cantidad: ${cantidad}</h3>
                                    </div>
                                `;
                        });
                        const div_titulo = document.querySelector(".titulo-carrito");
                        div_titulo.innerHTML = titulo;
                        const div_productos = document.querySelector(".div-productos");
                        div_productos.innerHTML = html;
                        console.log("guardado correctamente");
                    } else {
                        console.log("guardado fallido");
                    }
                });
        }

    };
    let params = new URLSearchParams(window.location.search);
    const id_producto = params.get('id');
    const id_usuario = params.get('id_usuario');
    const cantidad_nueva = params.get('cantidad');
    const tabla = params.get('tabla');
    meterAlCarrito(id_producto, id_usuario, cantidad_nueva, tabla);
};
