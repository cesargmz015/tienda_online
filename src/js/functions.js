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