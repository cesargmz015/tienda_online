window.onload = () => {
    /**funcion para hacer que los forms de login y sign up
     * se superpongan al resto del contenido
    */
    const login = document.querySelector("#login");
    const registro = document.querySelector("#registro");
    const botonLogin = document.querySelector("#boton-login");
    const botonRegistro = document.querySelector("#boton-registro");
    const fondoLogin = document.querySelector("#login .fondo");
    const fondoRegistro = document.querySelector("#registro .fondo");

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

    // Funciones para cuando el cursor hace hover
    window.addEventListener('mouseover', function() {
        // Selecciona todas las imágenes y párrafos
        const imagenes = document.querySelectorAll('.imagenes img');
        const parrafos = document.querySelectorAll('.div-detalles');

        // Función que cambia el ancho del párrafo correspondiente
        function funcion1() {
            // Obtiene el índice de la imagen sobre la que se pasa el cursor
            let index = Array.from(imagenes).indexOf(this);
            parrafos[index].style.width = "150px"; // Cambia el ancho a 150px
            /* esta parte sirve para hacer que los h2 y h3 de .div-detalles se pongan en negrita al pasar el cursor por su imagen del articulo correspondiente */
            let h2 = parrafos[index].querySelector('h2');
            let h3 = parrafos[index].querySelectorAll('h3');

            if (h2) h2.style.fontWeight = "bold";
            h3.forEach(h3 => {
                h3.style.fontWeight = "bold";
            });
        }
        // Función que revierte el ancho del párrafo a su estado original
        function funcion2() {
            // Obtiene el índice de la imagen sobre la que se pasa el cursor
            let index = Array.from(imagenes).indexOf(this);
            parrafos[index].style.width = ""; // Revierte el ancho
            // Revierte los cambios de la negrita
            let h2 = parrafos[index].querySelector('h2');
            let h3 = parrafos[index].querySelectorAll('h3');

            if (h2) h2.style.fontWeight = "normal";
            h3.forEach(h3 => {
                h3.style.fontWeight = "normal";
            });
        }
        // Añade los oyentes de eventos a las imágenes
        imagenes.forEach(img => {
            img.addEventListener('mouseover', funcion1);
            img.addEventListener('mouseout', funcion2);
        });
    });

    // Funcion para desplazar las galerias con los botones
    const galerias = document.querySelectorAll('.galeria');
    const btnPrev = document.querySelectorAll('.btn-prev');
    const btnNext = document.querySelectorAll('.btn-next');

    let indiceActual = 0; // Para rastrear la galería actual

    btnPrev.forEach(btn => btn.style.display = 'none');

    btnPrev.forEach(btn => {
        btn.addEventListener('click', function() {
            if (indiceActual > 0) {
                indiceActual--;
                actualizarCarrusel();
            }
        });
    });

    btnNext.forEach(btn => {
        btn.addEventListener('click', function() {
            if (indiceActual < 2) {
                indiceActual++;
                actualizarCarrusel();
            }
        });
    });

    function actualizarCarrusel() {
        const desplazamiento = indiceActual * 100;
        galerias.forEach(galeria => {
            galeria.style.transform = `translateX(-${desplazamiento}%)`;
        });

        // Verificar si estamos en la primera galería
        if (indiceActual === 0) {
            btnPrev.forEach(btn => btn.style.display = 'none'); // Ocultar el botón Prev
        } else {
            btnPrev.forEach(btn => btn.style.display = ''); // Mostrar el botón Prev
        }

        // Verificar si estamos en la última galería
        if (indiceActual === 2) {
            btnNext.forEach(btn => btn.style.display = 'none'); // Ocultar el botón Next
        } else {
            btnNext.forEach(btn => btn.style.display = ''); // Mostrar el botón Next
        }
    }
};