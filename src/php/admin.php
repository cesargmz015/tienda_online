<?php
session_start();
require_once('./modelo.php');
if (isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {
    $conexionBBDD = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="../styles/admin.css">
        <script src="../js/admin.js"></script>
    </head>

    <body>
        <div class="div-container">
            <div class="div-botones">
                <a href="../php/index.php">
                    <button type="button">Home</button>
                </a>
                <button type="button" id="boton-usuarios"><span>Usuarios</span></button>
                <button type="button" id="boton-articulos"><span>Articulos</span></button>
                <a href="./nuevo.php">
                    <button type="button" id="boton-nuevo"><span>Nuevo Articulo</span></button>
                </a>
            </div>
            <div class="div-form">
                <form action="" method="get" class="form-usuarios" id="form-usuarios">
                    <!-- Usuarios -->
                    <h2>Usuarios</h2>
                    <?php
                    $datos = $conexionBBDD->obtenerDatos("SELECT * FROM usuario");
                    $usuarios = $conexionBBDD->convertirDatos($datos);

                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Id</th><th>Nombre</th><th>Apellidos</th><th>Direccion</th><th>Telefono</th><th>Correo</th><th>Contraseña</th><th>DNI</th><th>Token</th><th>Rol</th>";
                    echo "</tr>";

                    for ($i = 0; $i < count($usuarios); $i++) {
                        $id = $usuarios[$i]->id;
                        $nombre = $usuarios[$i]->nombre;
                        $apellidos = $usuarios[$i]->apellidos;
                        $direccion = $usuarios[$i]->direccion;
                        $telefono = $usuarios[$i]->telefono;
                        $correo = $usuarios[$i]->correo;
                        $contraseña = $usuarios[$i]->contraseña;
                        $dni = $usuarios[$i]->dni;
                        $token = $usuarios[$i]->token;
                        $rol = $usuarios[$i]->rol;
                        if ($token == "") {
                            $token = "null";
                        }
                        echo "<tr>";

                        echo "<td>$id</td>";
                        echo "<td>$nombre</td>";
                        echo "<td>$apellidos</td>";
                        echo "<td>$direccion</td>";
                        echo "<td>$telefono</td>";
                        echo "<td>$correo</td>";
                        echo "<td>$contraseña</td>";
                        echo "<td>$dni</td>";
                        echo "<td>$token</td>";
                        echo "<td>$rol</td>";

                        echo '<td><a href="editar.php?id=' . $id . '&table=usuario"><button type="button">Editar</button></a></td>';
                        echo '<td><a href="eliminar.php?id=' . $id . '&table=usuario"><button type="button">Eliminar</button></a></td>';

                        echo "</tr>";
                    }
                    echo "</table>"
                    ?>
                </form>
                <form action="" method="get" class="form-sudaderas" id="form-sudaderas">
                    <h2>Seccion novedades</h2>
                    <?php
                    $datos = $conexionBBDD->obtenerDatos("SELECT * FROM novedades");
                    $sudaderas = $conexionBBDD->convertirDatos($datos);

                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Id</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Imagen</th><th>Activa</th><th>Fecha modificaciones</th><th>Descripcion larga</th>";
                    echo "</tr>";
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $nombre = $sudaderas[$i]->nombre;
                        $descripcion = $sudaderas[$i]->descripcion;
                        $precio = $sudaderas[$i]->precio;
                        $imagen = $sudaderas[$i]->imagen;
                        $activa = $sudaderas[$i]->activa;
                        $fecha = $sudaderas[$i]->fecha;
                        $descripcion_larga = $sudaderas[$i]->descripcion_larga;
                        echo "<tr>";

                        echo "<td>$id</td>";
                        echo "<td>$nombre</td>";
                        echo "<td>$descripcion</td>";
                        echo "<td>$precio</td>";
                        echo "<td>$imagen</td>";
                        echo "<td>$activa</td>";
                        echo "<td>$fecha</td>";
                        echo "<td>$descripcion_larga</td>";

                        echo '<td><a href="editar.php?id=' . $id . '&table=novedades"><button type="button">Editar</button></a></td>';
                        echo '<td><a href="eliminar.php?id=' . $id . '&table=novedades"><button type="button">Eliminar</button></a></td>';

                        echo "</tr>";
                    }
                    echo "</table>";
                    ?>
                    <h2>Seccion destacados</h2>
                    <?php
                    $datos = $conexionBBDD->obtenerDatos("SELECT * FROM destacados");
                    $sudaderas = $conexionBBDD->convertirDatos($datos);

                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Id</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Imagen</th><th>Activa</th><th>Fecha modificaciones</th><th>Descripcion larga</th>";
                    echo "</tr>";
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $nombre = $sudaderas[$i]->nombre;
                        $descripcion = $sudaderas[$i]->descripcion;
                        $precio = $sudaderas[$i]->precio;
                        $imagen = $sudaderas[$i]->imagen;
                        $activa = $sudaderas[$i]->activa;
                        $fecha = $sudaderas[$i]->fecha;
                        $descripcion_larga = $sudaderas[$i]->descripcion_larga;
                        echo "<tr>";

                        echo "<td>$id</td>";
                        echo "<td>$nombre</td>";
                        echo "<td>$descripcion</td>";
                        echo "<td>$precio</td>";
                        echo "<td>$imagen</td>";
                        echo "<td>$activa</td>";
                        echo "<td>$fecha</td>";
                        echo "<td>$descripcion_larga</td>";

                        echo '<td><a href="editar.php?id=' . $id . '&table=destacados"><button type="button">Editar</button></a></td>';
                        echo '<td><a href="eliminar.php?id=' . $id . '&table=destacados"><button type="button">Eliminar</button></a></td>';
                        echo "</tr>";
                    }
                    echo "</table>";
                    ?>
                    <h2>Seccion ofertas</h2>
                    <?php
                    $datos = $conexionBBDD->obtenerDatos("SELECT * FROM ofertas");
                    $sudaderas = $conexionBBDD->convertirDatos($datos);

                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Id</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Imagen</th><th>Activa</th><th>Fecha modificaciones</th><th>Descripcion larga</th>";
                    echo "</tr>";
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $nombre = $sudaderas[$i]->nombre;
                        $descripcion = $sudaderas[$i]->descripcion;
                        $precio = $sudaderas[$i]->precio;
                        $imagen = $sudaderas[$i]->imagen;
                        $activa = $sudaderas[$i]->activa;
                        $fecha = $sudaderas[$i]->fecha;
                        $descripcion_larga = $sudaderas[$i]->descripcion_larga;
                        echo "<tr>";

                        echo "<td>$id</td>";
                        echo "<td>$nombre</td>";
                        echo "<td>$descripcion</td>";
                        echo "<td>$precio</td>";
                        echo "<td>$imagen</td>";
                        echo "<td>$activa</td>";
                        echo "<td>$fecha</td>";
                        echo "<td>$descripcion_larga</td>";

                        echo '<td><a href="editar.php?id=' . $id . '&table=ofertas"><button type="button">Editar</button></a></td>';
                        echo '<td><a href="eliminar.php?id=' . $id . '&table=ofertas"><button type="button">Eliminar</button></a></td>';

                        echo "</tr>";
                    }
                    echo "</table>"
                    ?>
                </form>
            </div>
        </div>
    </body>

    </html>

<?php } else { ?>
    <h1>Not Found</h1>
    <p>The requested URL was not found on this server.</p>
<?php }
