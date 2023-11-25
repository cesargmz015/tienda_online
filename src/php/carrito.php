<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carrito</title>
    <script src="../js/carrito.js"></script>
    <link rel="stylesheet" href="../styles/carrito.css">
</head>

<body>
    <?php
    $paginaAnterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : './index.php';
    ?>

    <a href="<?= $paginaAnterior ?>"><button type="button">Volver</button></a>
    <div id="titulo-carrito" class="titulo-carrito"></div>
    <div class="div-productos"></div>
</body>

</html>