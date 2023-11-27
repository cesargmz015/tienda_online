<?php
session_start();
require_once("./modelo.php");
$registro = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
$id = $_GET["id"];
$tabla = $_GET["table"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/eliminar.css">
</head>

<body>
    <h1>realmente quiere borrar el registro <?= $id ?> de la tabla <?= $tabla ?> ?</h1>
    <form method="post" action="">
        <?php
        if (!isset($_POST["button"])) {
            echo '<a href="eliminar.php?id=' . $id . '&table=' . $tabla . '">
                <button type="submit" name="button" value="si">si</button>
            </a>
            <a href="eliminar.php?id=' . $id . '&table=' . $tabla . '">
                <button type="submit" name="button" value="no">no</button>
            </a>';
        } else {
            if ($_POST["button"] == "si") {
                $datos = $registro->eliminarDatos("DELETE from $tabla WHERE id = $id");
                echo "<p>se ha eliminado correctamente</p>";
                echo "<a href='./admin.php'>Volver</a>";
            } elseif ($_POST["button"] == "no") {
                header('Location: ./admin.php');
                exit;
            }
        }
        ?>
    </form>
</body>

</html>