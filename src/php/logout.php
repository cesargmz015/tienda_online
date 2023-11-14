<?php
session_start();

if (isset($_SESSION["id"])) {  // Suponiendo que "id" es una variable de sesión que estableces al iniciar sesión.
    session_destroy();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit; // Es importante llamar a exit después de header.
} else {
    echo "ERROR: cierre de sesion fallido";
?>
    <a href="./index.php">
        <button type="button">volver</button>
    </a>
<?php }
?>