const agregarCantidadACarrito = (id, id_usuario, tabla) => {
    let cantidad = document.getElementById('cantidad-carrito').value;
    if (cantidad == "" || cantidad == 0) {
        cantidad = 1;
    }
    console.log(tabla);
    alert("Se agregó al carrito correctamente");
    window.location.href = `./carrito.php?id=${id}&id_usuario=${id_usuario}&cantidad=${cantidad}&tabla=${tabla}`;
    console.log("cantidad correcta");
};