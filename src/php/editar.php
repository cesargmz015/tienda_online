<?php
session_start();
require_once("./modelo.php");
$conexionBBDD = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
$id = $_GET["id"];
$tabla = $_GET["table"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/editar.css">
    <script>
        const validarFormularioUsuario = () => {
            const nombre = document.forms["form"]["nombre"].value;
            const apellidos = document.forms["form"]["apellidos"].value;
            const direccion = document.forms["form"]["direccion"].value;
            const telefono = document.forms["form"]["telefono"].value;
            const correo = document.forms["form"]["correo"].value;
            const contraseña = document.forms["form"]["contraseña"].value;
            const dni = document.forms["form"]["dni"].value;
            const rol = document.forms["form"]["rol"].value;

            if (nombre == "" || apellidos == "" || direccion == "" || telefono == "" || correo == "" || contraseña == "" || dni == "" || rol == "") {
                alert("Todos los campos deben ser llenados");
                return false;
            }

            if (isNaN(telefono)) {
                alert("El teléfono debe ser un número");
                return false;
            }

            if (rol != "0" && rol != "1") {
                alert("Rol debe ser 0 o 1");
                return false;
            }

            return true;
        }

        const validarFormularioArticulos = () => {
            const nombre = document.forms["form"]["nombre"].value;
            const descripcion = document.forms["form"]["descripcion"].value;
            const precio = document.forms["form"]["precio"].value;
            const imagen = document.forms["form"]["imagen"].value;
            const activa = document.forms["form"]["activa"].value;
            const descripcion_larga = document.forms["form"]["descripcion_larga"].value;

            if (nombre == "" || descripcion == "" || precio == "" || imagen == "" || activa == "" || descripcion_larga == "") {
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

        const validarFormulario = () => {
            const tabla = "<?php echo $tabla; ?>";
            switch (tabla) {
                case 'usuario':
                    return validarFormularioUsuario();
                case 'novedades':
                    return validarFormularioArticulos();
                case 'destacados':
                    return validarFormularioArticulos();
                case 'ofertas':
                    return validarFormularioArticulos();
            }
        }
    </script>
</head>

<body>
    <form action="" method="post" name="form" onsubmit="return validarFormulario()">
        <a href="./admin.php">
            <button type="button">Volver</button>
        </a>
        <?php
        switch ($tabla) {
            case 'usuario':
                if (isset($_POST["guardar"])) {
                    $nombre = $_POST['nombre'];
                    $apellidos = $_POST['apellidos'];
                    $direccion = $_POST['direccion'];
                    $telefono = $_POST['telefono'];
                    $correo = $_POST['correo'];
                    $contraseña = $_POST['contraseña'];
                    $dni = $_POST['dni'];
                    $rol = $_POST['rol'];

                    $datos = $conexionBBDD->insertarDatos("UPDATE usuario SET nombre='$nombre', apellidos='$apellidos', direccion='$direccion', telefono='$telefono', correo='$correo', contraseña='$contraseña', dni='$dni', rol='$rol' WHERE id = $id");
                }
                $datos = $conexionBBDD->obtenerDatos("SELECT * FROM usuario WHERE id = $id");
                $sudadera = $conexionBBDD->convertirDatos($datos);

                echo "<table class='tabla'>";
                echo "<tr>";
                echo "<th>Id</th><th>Nombre</th><th>Apellidos</th><th>Direccion</th><th>Telefono</th><th>Correo</th><th>Contraseña</th><th>DNI</th><th>Token</th><th>Rol</th>";
                echo "</tr>";

                $id = $sudadera[0]->id;
                $nombre = $sudadera[0]->nombre;
                $apellidos = $sudadera[0]->apellidos;
                $direccion = $sudadera[0]->direccion;
                $telefono = $sudadera[0]->telefono;
                $correo = $sudadera[0]->correo;
                $contraseña = $sudadera[0]->contraseña;
                $dni = $sudadera[0]->dni;
                $token = $sudadera[0]->token;
                if ($token == "") {
                    $token = "null";
                }
                $rol = $sudadera[0]->rol;

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td><input type='text' name='nombre' value='$nombre'></td>";
                echo "<td><input type='text' name='apellidos' value='$apellidos'></td>";
                echo "<td><input type='text' name='direccion' value='$direccion'></td>";
                echo "<td><input type='number' name='telefono' value='$telefono'></td>";
                echo "<td><input type='email' name='correo' value='$correo'></td>";
                echo "<td><input type='text' name='contraseña' value='$contraseña'></td>";
                echo "<td><input type='text' name='dni' value='$dni'></td>";
                echo "<td>$token</td>";
                echo "<td>
                    <select name='activa'>
                        <option value='1' " . ($rol == 1 ? "selected" : "") . ">1</option>
                        <option value='0' " . ($rol == 0 ? "selected" : "") . ">0</option>
                    </select>
                </td>";

                echo '<td><button type="submit" name="guardar">Guardar</button></td>';

                echo "</tr>";
                echo "</table>";

                if (isset($_POST["guardar"])) {
                    echo "cambios guardados correctamente";
                }

                break;

            case 'novedades':
                if (isset($_POST["guardar"])) {
                    $nombre = $_POST['nombre'];
                    $descripcion = $_POST['descripcion'];
                    $precio = $_POST['precio'];
                    $imagen = $_POST['imagen'];
                    $activa = $_POST['activa'];
                    $descripcion_larga = $_POST['descripcion_larga'];

                    $datos = $conexionBBDD->insertarDatos("UPDATE novedades SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen', activa='$activa', fecha=now(), descripcion_larga='$descripcion_larga' WHERE id = $id");
                }
                $datos = $conexionBBDD->obtenerDatos("SELECT * FROM novedades WHERE id = $id");
                $sudadera = $conexionBBDD->convertirDatos($datos);

                echo "<table class='tabla'>";
                echo "<tr>";
                echo "<th>Tabla</th><th>Id</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Imagen</th><th>Activa</th><th>Fecha modificaciones</th><th>Descripcion larga</th>";
                echo "</tr>";

                $id = $sudadera[0]->id;
                $nombre = $sudadera[0]->nombre;
                $descripcion = $sudadera[0]->descripcion;
                $precio = $sudadera[0]->precio;
                $imagen = $sudadera[0]->imagen;
                $activa = $sudadera[0]->activa;
                $fecha = $sudadera[0]->fecha;
                $descripcion_larga = $sudadera[0]->descripcion_larga;

                echo "<tr>";
                echo "<td>$tabla</td>";
                echo "<td>$id</td>";
                echo "<td><input type='text' name='nombre' value='$nombre'></td>";
                echo "<td><input type='text' name='descripcion' value='$descripcion'></td>";
                echo "<td><input type='number' name='precio' value='$precio'></td>";
                echo "<td><input type='text' name='imagen' value='$imagen'></td>";
                echo "<td>
                    <select name='activa'>
                        <option value='1' " . ($activa == 1 ? "selected" : "") . ">1</option>
                        <option value='0' " . ($activa == 0 ? "selected" : "") . ">0</option>
                    </select>
                </td>";
                echo "<td><input type='text' name='fecha' value='$fecha' readonly></td>";
                echo "<td><input type='text' name='descripcion_larga' value='$descripcion_larga'></td>";

                echo '<td><button type="submit" name="guardar">Guardar</button></td>';

                echo "</tr>";
                echo "</table>";

                if (isset($_POST["guardar"])) {
                    echo "cambios guardados correctamente";
                }

                break;

            case 'destacados':
                if (isset($_POST["guardar"])) {
                    $nombre = $_POST['nombre'];
                    $descripcion = $_POST['descripcion'];
                    $precio = $_POST['precio'];
                    $imagen = $_POST['imagen'];
                    $activa = $_POST['activa'];
                    $descripcion_larga = $_POST['descripcion_larga'];

                    $datos = $conexionBBDD->insertarDatos("UPDATE destacados SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen', activa='$activa', fecha=now(), descripcion_larga='$descripcion_larga' WHERE id = $id");
                }
                $datos = $conexionBBDD->obtenerDatos("SELECT * FROM destacados WHERE id = $id");
                $sudadera = $conexionBBDD->convertirDatos($datos);

                echo "<table class='tabla'>";
                echo "<tr>";
                echo "<th>Tabla</th><th>Id</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Imagen</th><th>Activa</th><th>Fecha modificaciones</th><th>Descripcion larga</th>";
                echo "</tr>";

                $id = $sudadera[0]->id;
                $nombre = $sudadera[0]->nombre;
                $descripcion = $sudadera[0]->descripcion;
                $precio = $sudadera[0]->precio;
                $imagen = $sudadera[0]->imagen;
                $activa = $sudadera[0]->activa;
                $fecha = $sudadera[0]->fecha;
                $descripcion_larga = $sudadera[0]->descripcion_larga;

                echo "<tr>";
                echo "<td>$tabla</td>";
                echo "<td>$id</td>";
                echo "<td><input type='text' name='nombre' value='$nombre'></td>";
                echo "<td><input type='text' name='descripcion' value='$descripcion'></td>";
                echo "<td><input type='number' name='precio' value='$precio'></td>";
                echo "<td><input type='text' name='imagen' value='$imagen'></td>";
                echo "<td>
                    <select name='activa'>
                        <option value='1' " . ($activa == 1 ? "selected" : "") . ">1</option>
                        <option value='0' " . ($activa == 0 ? "selected" : "") . ">0</option>
                    </select>
                </td>";
                echo "<td><input type='text' name='fecha' value='$fecha' readonly></td>";
                echo "<td><input type='text' name='descripcion_larga' value='$descripcion_larga'></td>";

                echo '<td><button type="submit" name="guardar">Guardar</button></td>';

                echo "</tr>";
                echo "</table>";

                if (isset($_POST["guardar"])) {
                    echo "cambios guardados correctamente";
                }

                break;

            case 'ofertas':
                if (isset($_POST["guardar"])) {
                    $nombre = $_POST['nombre'];
                    $descripcion = $_POST['descripcion'];
                    $precio = $_POST['precio'];
                    $imagen = $_POST['imagen'];
                    $activa = $_POST['activa'];
                    $descripcion_larga = $_POST['descripcion_larga'];

                    $datos = $conexionBBDD->insertarDatos("UPDATE ofertas SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen', activa='$activa', fecha=now(), descripcion_larga='$descripcion_larga' WHERE id = $id");
                }
                $datos = $conexionBBDD->obtenerDatos("SELECT * FROM ofertas WHERE id = $id");
                $sudadera = $conexionBBDD->convertirDatos($datos);

                echo "<table class='tabla'>";
                echo "<tr>";
                echo "<th>Tabla</th><th>Id</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Imagen</th><th>Activa</th><th>Fecha modificaciones</th><th>Descripcion larga</th>";
                echo "</tr>";

                $id = $sudadera[0]->id;
                $nombre = $sudadera[0]->nombre;
                $descripcion = $sudadera[0]->descripcion;
                $precio = $sudadera[0]->precio;
                $imagen = $sudadera[0]->imagen;
                $activa = $sudadera[0]->activa;
                $fecha = $sudadera[0]->fecha;
                $descripcion_larga = $sudadera[0]->descripcion_larga;

                echo "<tr>";
                echo "<td>$tabla</td>";
                echo "<td>$id</td>";
                echo "<td><input type='text' name='nombre' value='$nombre'></td>";
                echo "<td><input type='text' name='descripcion' value='$descripcion'></td>";
                echo "<td><input type='number' name='precio' value='$precio'></td>";
                echo "<td><input type='text' name='imagen' value='$imagen'></td>";
                echo "<td>
                    <select name='activa'>
                        <option value='1' " . ($activa == 1 ? "selected" : "") . ">1</option>
                        <option value='0' " . ($activa == 0 ? "selected" : "") . ">0</option>
                    </select>
                </td>";
                echo "<td><input type='text' name='fecha' value='$fecha' readonly></td>";
                echo "<td><input type='text' name='descripcion_larga' value='$descripcion_larga'></td>";

                echo '<td><button type="submit" name="guardar">Guardar</button></td>';

                echo "</tr>";
                echo "</table>";

                if (isset($_POST["guardar"])) {
                    echo "cambios guardados correctamente";
                }

                break;
        }
        ?>
    </form>
</body>

</html>