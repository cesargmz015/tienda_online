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
    <script>
        const validarFormulario = () => {
            const tabla = document.forms["form"]["tabla"].value;
            const nombre = document.forms["form"]["nombre"].value;
            const descripcion = document.forms["form"]["descripcion"].value;
            const precio = document.forms["form"]["precio"].value;
            const imagen = document.forms["form"]["imagen"].value;
            const activa = document.forms["form"]["activa"].value;
            const descripcion_larga = document.forms["form"]["descripcion_larga"].value;

            if (tabla == "" || nombre == "" || descripcion == "" || precio == "" || imagen == "" || activa == "" || descripcion_larga == "") {
                alert("Todos los campos deben ser llenados");
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
        }
    </script>
</head>

<body>
    <form action="" name="form" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
        <a href="./admin.php">
            <button type="button">Volver</button>
        </a>

        <?php
        if (isset($_POST["guardar"])) {
            $tabla = $_POST['tabla'];
            $activa = $_POST['activa'];
            if ($tabla == 'novedades' || $tabla == 'destacados' || $tabla == 'ofertas' || $activa == 1 || $activa == 0 || $precio >= 1) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $descripcion_larga = $_POST['descripcion_larga'];

                // Verificar si se ha subido un archivo
                if (isset($_FILES['archivo_imagen']) && $_FILES['archivo_imagen']['error'] == 0) {
                    $file_tmp = $_FILES['archivo_imagen']['tmp_name'];
                    $file_name = $_FILES['archivo_imagen']['name'];
                    move_uploaded_file($file_tmp, "../img/" . $file_name);
                    $imagen = "../img/" . $file_name;
                } else {
                    // Si no se ha subido un archivo, usar la ruta proporcionada
                    $imagen = $_POST['imagen'];
                }
                $datos = $conexionBBDD->insertarDatos("INSERT INTO $tabla (nombre, descripcion, precio, imagen, activa, fecha, descripcion_larga) VALUES ('$nombre', '$descripcion', '$precio', '$imagen', '$activa', now(), '$descripcion_larga')");
            } else {
                $error_datos = "datos no validos";
            }
        }

        echo "<table class='tabla'>";
        echo "<tr>";
        echo "<th>Tabla a introducir</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Imagen</th><th>Activa</th><th>Descripcion larga</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>
            <select name='tabla'>
                <option value='novedades'>Novedades</option>
                <option value='destacados'>Destacados</option>
                <option value='ofertas'>Ofertas</option>
            </select>
        </td>";
        echo "<td><input type='text' name='nombre'></td>";
        echo "<td><input type='text' name='descripcion'></td>";
        echo "<td><input type='number' name='precio' min='1'></td>";
        echo "<td><input type='text' name='imagen' placeholder='ruta...'><input type='file' name='archivo_imagen' accept='image/*'></td>";
        echo "<td>
            <select name='activa'>
                <option value='0'>0</option>
                <option value='1'>1</option>
            </select>
        </td>";
        echo "<td><input type='text' name='descripcion_larga'></td>";

        echo '<td><button type="submit" name="guardar">Guardar</button></td>';

        echo "</tr>";
        echo "</table>";

        if (isset($_POST["guardar"])) {
            if (isset($error_datos)) {
                echo $error_datos;
            } else {
                echo "cambios guardados correctamente";
            }
        }
        ?>
    </form>
</body>

</html>