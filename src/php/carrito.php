<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carrito</title>
    <script src="../js/carrito.js"></script>
</head>

<body>
    <?php
    $paginaAnterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'default.php';
    ?>

    <a href="<?= $paginaAnterior ?>"><button type="button">Volver</button></a>
    <button type="button" id="imprimir-carrito">Imprimir carrito</button>
    <div class="div-productos"></div>
</body>

</html>