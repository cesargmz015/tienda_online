window.onload = () => {
    /**funcion para hacer que los forms de login y sign up
     * se superpongan al resto del contenido
    */

    const botonLogin = document.querySelector("#boton-login");
    const botonRegistro = document.querySelector("#boton-registro");


    if (botonLogin && botonRegistro) {
        const login = document.querySelector("#login");
        const registro = document.querySelector("#registro");
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
    }
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
        const section = document.querySelectorAll('.detalles');

        // Funciones mouseover
        function funcion1() {
            // Obtiene el índice de la imagen sobre la que se pasa el cursor
            let index = Array.from(imagenes).indexOf(this);
            section.forEach(section => {
                section.style.height = "175px";
            });
            parrafos[index].classList.add("visible");
            parrafos[index].style.width = "120px"; // Cambia el ancho
            /* esta parte sirve para hacer que los h2 y h3 de .div-detalles se pongan en negrita al pasar el cursor por su imagen del articulo correspondiente */
            /* let h2 = parrafos[index].querySelector('h2');
            let h3 = parrafos[index].querySelector('h3');
            let h4 = parrafos[index].querySelector('h4');

            if (h2) h2.style.fontWeight = "bold";
            if (h3) h3.style.fontWeight = "bold";
            if (h4) h4.style.fontWeight = "bold"; */
        }
        // Funciones mouseout
        function funcion2() {
            // Obtiene el índice de la imagen sobre la que se pasa el cursor
            let index = Array.from(imagenes).indexOf(this);
            section.forEach(section => {
                section.style.height = "0";
            });
            parrafos[index].classList.remove("visible");
            parrafos[index].style.width = "0"; // Revierte el ancho
            // Revierte los cambios de la negrita
            /* let h2 = parrafos[index].querySelector('h2');
            let h3 = parrafos[index].querySelector('h3');
            let h4 = parrafos[index].querySelector('h4');

            if (h2) h2.style.fontWeight = "normal";
            if (h3) h3.style.fontWeight = "normal";
            if (h4) h4.style.fontWeight = "normal"; */
        }
        // Añade los oyentes de eventos a las imágenes
        imagenes.forEach(img => {
            img.addEventListener('mouseover', funcion1);
            img.addEventListener('mouseout', funcion2);
        });
    });

    // Funcion para desplazar las galerias con los botones
    const galeria_carrusel1 = document.querySelectorAll('.galeria-carrusel1');
    const galeria_carrusel2 = document.querySelectorAll('.galeria-carrusel2');
    const galeria_carrusel3 = document.querySelectorAll('.galeria-carrusel3');
    const btn_prev_carrusel1 = document.querySelector('.btn-prev-carrusel1');
    const btn_next_carrusel1 = document.querySelector('.btn-next-carrusel1');
    const btn_prev_carrusel2 = document.querySelector('.btn-prev-carrusel2');
    const btn_next_carrusel2 = document.querySelector('.btn-next-carrusel2');
    const btn_prev_carrusel3 = document.querySelector('.btn-prev-carrusel3');
    const btn_next_carrusel3 = document.querySelector('.btn-next-carrusel3');

    //*funcion anterior
    // btn_prev_carrusel1.style.display = 'none';
    // btn_prev_carrusel2.style.display = 'none';
    // btn_prev_carrusel3.style.display = 'none';

    btn_prev_carrusel1.style.opacity = '.7';
    btn_prev_carrusel1.style.pointerEvents = 'none';
    btn_prev_carrusel2.style.opacity = '.7';
    btn_prev_carrusel2.style.pointerEvents = 'none';
    btn_prev_carrusel3.style.opacity = '.7';
    btn_prev_carrusel3.style.pointerEvents = 'none';

    // Para rastrear la galería actual
    let indiceActualCarrusel1 = 0;
    let indiceActualCarrusel2 = 0;
    let indiceActualCarrusel3 = 0;

    btn_prev_carrusel1.addEventListener('click', function() {
        if (indiceActualCarrusel1 > 0) {
            indiceActualCarrusel1--;
            actualizarCarrusel1();
        }
    });

    btn_next_carrusel1.addEventListener('click', function() {
        if (indiceActualCarrusel1 < galeria_carrusel1.length - 1) {
            indiceActualCarrusel1++;
            actualizarCarrusel1();
        }
    });

    btn_prev_carrusel2.addEventListener('click', function() {
        if (indiceActualCarrusel2 > 0) {
            indiceActualCarrusel2--;
            actualizarCarrusel2();
        }
    });

    btn_next_carrusel2.addEventListener('click', function() {
        if (indiceActualCarrusel2 < galeria_carrusel2.length - 1) {
            indiceActualCarrusel2++;
            actualizarCarrusel2();
        }
    });

    btn_prev_carrusel3.addEventListener('click', function() {
        if (indiceActualCarrusel3 > 0) {
            indiceActualCarrusel3--;
            actualizarCarrusel3();
        }
    });

    btn_next_carrusel3.addEventListener('click', function() {
        if (indiceActualCarrusel3 < galeria_carrusel3.length - 1) {
            indiceActualCarrusel3++;
            actualizarCarrusel3();
        }
    });

    function actualizarCarrusel1() {
        const desplazamiento = indiceActualCarrusel1 * 100;
        galeria_carrusel1.forEach(galeria => {
            galeria.style.transform = `translateX(-${desplazamiento}%)`;
        });

        // Verificar si estamos en la primera galería
        if (indiceActualCarrusel1 === 0) {
            btn_prev_carrusel1.style.opacity = '.7'; // Ocultar el botón Prev
            btn_prev_carrusel1.style.pointerEvents = 'none';
        } else {
            btn_prev_carrusel1.style.opacity = '1'; // Ocultar el botón Prev
            btn_prev_carrusel1.style.pointerEvents = '';
        }

        // Verificar si estamos en la última galería
        if (indiceActualCarrusel1 === galeria_carrusel1.length - 1) {
            btn_next_carrusel1.style.opacity = '.7'; // Ocultar el botón Prev
            btn_next_carrusel1.style.pointerEvents = 'none';
        } else {
            btn_next_carrusel1.style.opacity = '1'; // Ocultar el botón Prev
            btn_next_carrusel1.style.pointerEvents = '';
        }
    }

    function actualizarCarrusel2() {
        const desplazamiento = indiceActualCarrusel2 * 100;
        galeria_carrusel2.forEach(galeria => {
            galeria.style.transform = `translateX(-${desplazamiento}%)`;
        });

        // Verificar si estamos en la primera galería
        if (indiceActualCarrusel2 === 0) {
            btn_prev_carrusel2.style.opacity = '.7'; // Ocultar el botón Prev
            btn_prev_carrusel2.style.pointerEvents = 'none';
        } else {
            btn_prev_carrusel2.style.opacity = '1'; // Ocultar el botón Prev
            btn_prev_carrusel2.style.pointerEvents = '';
        }

        // Verificar si estamos en la última galería
        if (indiceActualCarrusel2 === galeria_carrusel2.length - 1) {
            btn_next_carrusel2.style.opacity = '.7'; // Ocultar el botón Prev
            btn_next_carrusel2.style.pointerEvents = 'none';
        } else {
            btn_next_carrusel2.style.opacity = '1'; // Ocultar el botón Prev
            btn_next_carrusel2.style.pointerEvents = '';
        }
    }
    function actualizarCarrusel3() {
        const desplazamiento = indiceActualCarrusel3 * 100;
        galeria_carrusel3.forEach(galeria => {
            galeria.style.transform = `translateX(-${desplazamiento}%)`;
        });

        // Verificar si estamos en la primera galería
        if (indiceActualCarrusel3 === 0) {
            btn_prev_carrusel3.style.opacity = '.7'; // Ocultar el botón Prev
            btn_prev_carrusel3.style.pointerEvents = 'none';
        } else {
            btn_prev_carrusel3.style.opacity = '1'; // Ocultar el botón Prev
            btn_prev_carrusel3.style.pointerEvents = '';
        }

        // Verificar si estamos en la última galería
        if (indiceActualCarrusel3 === galeria_carrusel3.length - 1) {
            btn_next_carrusel3.style.opacity = '.7'; // Ocultar el botón Prev
            btn_next_carrusel3.style.pointerEvents = 'none';
        } else {
            btn_next_carrusel3.style.opacity = '1'; // Ocultar el botón Prev
            btn_next_carrusel3.style.pointerEvents = '';
        }
    }

    //* codigo antiguo

    /* btnPrev.forEach(btn => {
        btn.addEventListener('click', function () {
            if (indiceActual > 0) {
                indiceActual--;
                actualizarCarrusel();
            }
        });
    });

    btnNext.forEach(btn => {
        btn.addEventListener('click', function () {
            if (indiceActual < 2) {
                indiceActual++;
                actualizarCarrusel();
            }
        });
    }); */



    /* function actualizarCarrusel() {
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
    } */
};