window.onload = () => {
    const boton_usuarios = document.querySelector("#boton-usuarios");
    const boton_articulos = document.querySelector("#boton-articulos");
    const form_usuarios = document.querySelector("#form-usuarios");
    const form_sudaderas = document.querySelector("#form-sudaderas");
    const boton_eliminar = document.querySelector("#boton-eliminar");

    form_usuarios.style.display = "none";
    form_sudaderas.style.display = "none";

    boton_articulos.onclick = () => {
        form_usuarios.style.display = "none";
        form_sudaderas.style.display = "";
    };

    boton_usuarios.onclick = () => {
        form_sudaderas.style.display = "none";
        form_usuarios.style.display = "";
    };

    boton_eliminar.onclick = () => {
        form_usuarios.style.display = "none";
        console.log("cambiado correcto");
    };

};