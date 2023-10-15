window.onload = () => {
    const login = document.querySelector("#login");
    const registro = document.querySelector("#registro");
    const botonLogin = document.querySelector("#boton-login");
    const botonRegistro = document.querySelector("#boton-registro");
    const fondoLogin = document.querySelector("#login .fondo");
    const fondoRegistro = document.querySelector("#registro .fondo");
    /**funcion para hacer que los forms de login y sign up
     * se superpongan al resto del contenido
    */
    botonLogin.onclick = () => {
        login.classList.remove("oculto");
    };
    fondoLogin.onclick = () => {
        login.classList.add("oculto");
    };
    botonRegistro.onclick = () => {
        registro.classList.remove("oculto");
    };
    fondoRegistro.onclick = () => {
        registro.classList.add("oculto");
    };
    /**funcion para hacer que el hr del header
     * se ajuste al hacer scroll
     */
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        const hr = document.querySelector('.hr-header');

        if (window.scrollY > 20) {  // puedes ajustar el "10" según el punto de inicio del efecto que prefieras.
            // header.style.marginBottom = '10px'; // el espacio que deseas cuando hay scroll.
            hr.style.marginTop = '0'; // si también deseas reducir el margen superior del hr.
        } else {
            header.style.marginBottom = ''; // resetea al estilo original.
            hr.style.marginTop = ''; // resetea al estilo original.
        }
    });
    window.addEventListener('mouseover', function() {
        // Selecciona todas las imágenes y párrafos
        const imagenes = document.querySelectorAll('.imagenes img');
        const parrafos = document.querySelectorAll('.div-detalles');
        // Función que cambia el ancho del párrafo correspondiente
        function aumentarAnchoParrafo() {
            // Obtiene el índice de la imagen sobre la que se pasa el cursor
            let index = Array.from(imagenes).indexOf(this);
            parrafos[index].style.width = "150px"; // Cambia el ancho a 150px
        }
        // Función que revierte el ancho del párrafo a su estado original
        function reducirAnchoParrafo() {
            // Obtiene el índice de la imagen sobre la que se pasa el cursor
            let index = Array.from(imagenes).indexOf(this);
            parrafos[index].style.width = ""; // Revierte el ancho
        }
        // Añade los oyentes de eventos a las imágenes
        imagenes.forEach(img => {
            img.addEventListener('mouseover', aumentarAnchoParrafo);
            img.addEventListener('mouseout', reducirAnchoParrafo);
        });
    });
};