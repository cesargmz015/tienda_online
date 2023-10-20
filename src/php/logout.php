<?php
session_start();
session_destroy();
echo "has cerrado sesion correctamente";
?>
<a href="./index.php">
    <button type="button">volver</button>
</a>