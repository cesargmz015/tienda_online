window.onload = () => {
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
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        const hr = document.querySelector('.hr-header');

        if (window.scrollY > 55) {  // puedes ajustar el "10" según el punto de inicio del efecto que prefieras.
            // header.style.marginBottom = '10px'; // el espacio que deseas cuando hay scroll.
            hr.style.marginTop = '0'; // si también deseas reducir el margen superior del hr.
        } else {
            header.style.marginBottom = ''; // resetea al estilo original.
            hr.style.marginTop = ''; // resetea al estilo original.
        }
    });
};
