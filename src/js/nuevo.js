const validarFormulario = () => {
    const tabla = document.forms["form"]["tabla"].value;
    const nombre = document.forms["form"]["nombre"].value;
    const descripcion = document.forms["form"]["descripcion"].value;
    const precio = document.forms["form"]["precio"].value;
    const imagen = document.forms["form"]["imagen"].value;
    const archivo_imagen = document.forms["form"]["archivo_imagen"].value;
    const activa = document.forms["form"]["activa"].value;
    const descripcion_larga = document.forms["form"]["descripcion_larga"].value;

    if (tabla == "" || nombre == "" || descripcion == "" || precio == "" || activa == "" || descripcion_larga == "") {
        alert("Todos los campos deben ser llenados");
        return false;
    }

    if (imagen == "" && archivo_imagen == "") {
        alert("Debe llenar el campo de la ruta de la imagen o subir un archivo");
        return false;
    }

    if (imagen != "" && archivo_imagen != "") {
        alert("Debe rellenar solo uno de los campos de la imagen");
        return false;
    }

    if (isNaN(precio)) {
        alert("El precio debe ser un número");
        return false;
    }

    if (activa != "0" && activa != "1") {
        alert("Activa debe ser 0 o 1");
        return false;
    }

    return true;
};