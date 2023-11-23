const agregarComentario = (id, id_usuario, tabla) => {
    const comentario = document.getElementById('comentario').value;
    if (comentario.trim() === '') {
        alert('El comentario no puede estar vacío');
        return false;
    }

    if (id_usuario == 0) {
        alert('Debes iniciar sesión para poder comentar');
        return false;
    }

    alert('Comentario añadido correctamente');
    return true;
}