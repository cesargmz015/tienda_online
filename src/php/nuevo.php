<?php
session_start();
require_once('./modelo.php');
$conexionBBDD = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/editar.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <a href="./admin.php">
            <button type="button">Volver</button>
        </a>

        <?php
        if (isset($_POST["guardar"])) {
            $tabla = $_POST['tabla'];
            $activa = $_POST['activa'];
            if ($tabla == 'novedades' || $tabla == 'destacados' || $tabla == 'ofertas' || $activa == 1 || $activa == 0) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $imagen = $_POST['imagen'];
                $descripcion_larga = $_POST['descripcion_larga'];

                $datos = $conexionBBDD->insertarDatos("INSERT INTO $tabla (nombre, descripcion, precio, imagen, activa, fecha, descripcion_larga) VALUES ('$nombre', '$descripcion', '$precio', '$imagen', '$activa', now(), '$descripcion_larga')");
            } else {
                echo "tabla o datos no validos";
            }
        }

        echo "<table class='tabla'>";
        echo "<tr>";
        echo "<th>Tabla a introducir</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Imagen</th><th>Activa</th><th>Descripcion larga</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><input type='text' name='tabla'></td>";
        echo "<td><input type='text' name='nombre'></td>";
        echo "<td><input type='text' name='descripcion'></td>";
        echo "<td><input type='number' name='precio'></td>";
        echo "<td><input type='text' name='imagen'><input type='file'></td>";
        echo "<td><input type='number' name='activa'></td>";
        echo "<td><input type='text' name='descripcion_larga'></td>";

        echo '<td><button type="submit" name="guardar">Guardar</button></td>';

        echo "</tr>";
        echo "</table>";

        if (isset($_POST["guardar"])) {
            echo "cambios guardados correctamente";
        }
        ?>
</body>

</html>