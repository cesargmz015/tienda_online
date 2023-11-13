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
                $descripcion_larga = $_POST['descripcion_larga'];

                // Verificar si se ha subido un archivo
                if (isset($_FILES['archivo_imagen']) && $_FILES['archivo_imagen']['error'] == 0) {
                    $file_tmp = $_FILES['archivo_imagen']['tmp_name'];
                    $file_name = $_FILES['archivo_imagen']['name'];
                    move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/DAW_PHP_localhost/tienda_online/src/img/" . $file_name);
                    $imagen = "../img/" . $file_name;
                } else {
                    // Si no se ha subido un archivo, usar la ruta proporcionada
                    $imagen = $_POST['imagen'];
                }
                $datos = $conexionBBDD->insertarDatos("INSERT INTO $tabla (nombre, descripcion, precio, imagen, activa, fecha, descripcion_larga) VALUES ('$nombre', '$descripcion', '$precio', '$imagen', '$activa', now(), '$descripcion_larga')");
            } else {
                $error_datos = "tabla o activa no validos";
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
        echo "<td><input type='text' name='imagen' placeholder='../img/nombreImagen.png'><input type='file' name='archivo_imagen' accept='image/*'></td>";
        echo "<td><input type='number' name='activa'></td>";
        echo "<td><input type='text' name='descripcion_larga'></td>";

        echo '<td><button type="submit" name="guardar">Guardar</button></td>';

        echo "</tr>";
        echo "</table>";

        if (isset($_POST["guardar"])) {
            if ($error_datos != '') {
                echo $error_datos;
            } else {
                echo "cambios guardados correctamente";
            }
        }
        ?>
</body>

</html>