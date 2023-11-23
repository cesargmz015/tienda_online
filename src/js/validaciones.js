// validacion.js
const validarFormularioLogin = () => {
    const email = document.forms["formLogin"]["email"].value;
    const password = document.forms["formLogin"]["password"].value;

    if (email == "" || password == "") {
        alert("Todos los campos deben ser llenados");
        return false;
    }

    return true;
};

const validarFormularioRegistro = () => {
    const nombre = document.forms["formRegistro"]["nombre"].value;
    const apellidos = document.forms["formRegistro"]["apellidos"].value;
    const dni = document.forms["formRegistro"]["dni"].value;
    const direccion = document.forms["formRegistro"]["direccion"].value;
    const telefono = document.forms["formRegistro"]["telefono"].value;
    const email = document.forms["formRegistro"]["email"].value;
    const password = document.forms["formRegistro"]["password"].value;
    const terminos = document.forms["formRegistro"]["terminos"].checked;

    if (nombre == "" || apellidos == "" || dni == "" || direccion == "" || telefono == "" || email == "" || password == "") {
        alert("Todos los campos deben ser llenados");
        return false;
    }
    if (!terminos) {
        alert("Debe aceptar los términos y condiciones");
        return false;
    }

    return true;
};