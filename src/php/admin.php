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
                <button type="button" id="boton-usuarios"><span>Usuarios</span></button>
                <button type="button" id="boton-articulos"><span>Articulos</span></button>
                <button type="button" id="boton-editar"><span>Editar</span></button>
                <button type="button" id="boton-eliminar"><span>Eliminar</span></button>
            </div>
            <div class="div-form">
                <form action="" method="get" class="form-usuarios" id="form-usuarios">
                    <?php
                    $datos = $conexionBBDD->obtenerDatos("SELECT * FROM usuario");
                    $usuarios = $conexionBBDD->convertirDatos($datos);
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
                    ?>
                        <br><br>
                        <p class="parrafo-datos">
                            <input type="radio" name="seleccion_usuarios" value="<?= $id ?>">
                            <?= $id ?>, <?= $nombre ?>, <?= $apellidos ?>, <?= $direccion ?>, <?= $telefono ?>, <?= $correo ?>, <?= $contraseña ?>, <?= $dni ?>, <?= $token ?>, <?= $rol ?>
                        </p>
                    <?php
                    }
                    ?>
                </form>
                <form action="" method="get" class="form-sudaderas" id="form-sudaderas">
                    <?php
                    $datos = $conexionBBDD->obtenerDatos("SELECT * FROM novedades");
                    $sudaderas = $conexionBBDD->convertirDatos($datos);
                    ?>
                    <br>
                    <h2>Seccion novedades</h2>
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $nombre = $sudaderas[$i]->nombre;
                        $descripcion = $sudaderas[$i]->descripcion;
                        $precio = $sudaderas[$i]->precio;
                        $imagen = $sudaderas[$i]->imagen;
                        $activa = $sudaderas[$i]->activa;
                        $fecha = $sudaderas[$i]->fecha;
                        $descripcion_larga = $sudaderas[$i]->descripcion_larga;
                    ?>
                        <br>
                        <p class="parrafo-datos">
                            <input type="radio" name="seleccion_novedades" value="<?= $id ?>">
                            <?= $id ?>, <?= $nombre ?>, <?= $descripcion ?>, <?= $precio ?>, <?= $imagen ?>, <?= $activa ?>, <?= $fecha ?>, <?= $descripcion_larga ?>
                        </p>
                    <?php
                    }
                    $datos = $conexionBBDD->obtenerDatos("SELECT * FROM destacados");
                    $sudaderas = $conexionBBDD->convertirDatos($datos);
                    ?>
                    <br>
                    <h2>Seccion destacados</h2>
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $nombre = $sudaderas[$i]->nombre;
                        $descripcion = $sudaderas[$i]->descripcion;
                        $precio = $sudaderas[$i]->precio;
                        $imagen = $sudaderas[$i]->imagen;
                        $activa = $sudaderas[$i]->activa;
                        $fecha = $sudaderas[$i]->fecha;
                        $descripcion_larga = $sudaderas[$i]->descripcion_larga;
                    ?>
                        <br>
                        <p class="parrafo-datos">
                            <input type="radio" name="seleccion_destacados" value="<?= $id ?>">
                            <?= $id ?>, <?= $nombre ?>, <?= $descripcion ?>, <?= $precio ?>, <?= $imagen ?>, <?= $activa ?>, <?= $fecha ?>, <?= $descripcion_larga ?>
                        </p>
                    <?php
                    }
                    $datos = $conexionBBDD->obtenerDatos("SELECT * FROM ofertas");
                    $sudaderas = $conexionBBDD->convertirDatos($datos);
                    ?>
                    <br>
                    <h2>Seccion ofertas</h2>
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $nombre = $sudaderas[$i]->nombre;
                        $descripcion = $sudaderas[$i]->descripcion;
                        $precio = $sudaderas[$i]->precio;
                        $imagen = $sudaderas[$i]->imagen;
                        $activa = $sudaderas[$i]->activa;
                        $fecha = $sudaderas[$i]->fecha;
                        $descripcion_larga = $sudaderas[$i]->descripcion_larga;
                    ?>
                        <br>
                        <p class="parrafo-datos"><input type="radio" name="seleccion_ofertas" value="<?= $id ?>">
                            <?= $id ?>, <?= $nombre ?>, <?= $descripcion ?>, <?= $precio ?>, <?= $imagen ?>, <?= $activa ?>, <?= $fecha ?>, <?= $descripcion_larga ?></p>
                    <?php
                    }
                    //*genera un codigo para recoger todos los checkboxes vinculados a su $id que estan checked
                    if (isset($_GET['Eliminar'])) {
                        if (isset($_GET['seleccion_usuarios'])) {
                            $id_seleccionado = $_GET['seleccion_usuarios'];
                            $datos = $conexionBBDD->obtenerDatos("SELECT * FROM usuario WHERE id=$id_seleccionado");
                            $usuarios = $conexionBBDD->convertirDatos($datos);
                            var_dump($usuarios);
                        }

                        //eliminar articulos
                        //     if (isset($_GET['seleccion_usuarios'])) {
                        //         $id_seleccionado = $_GET['seleccion_usuarios'];
                        //         // Edita en la tabla de usuarios
                        //     } elseif (isset($_GET['seleccion_novedades'])) {
                        //         $id_seleccionado = $_GET['seleccion_novedades'];
                        //     } elseif (isset($_GET['seleccion_destacados'])) {
                        //         $id_seleccionado = $_GET['seleccion_destacados'];
                        //     } elseif (isset($_GET['seleccion_ofertas'])) {
                        //         $id_seleccionado = $_GET['seleccion_ofertas'];
                        //     }
                        // }
                    ?>
                </form>
            </div>
        </div>
    </body>

    </html>
    <?php



    ?>


<?php } else { ?>
    <h1>Not Found</h1>
    <p>The requested URL was not found on this server.</p>
<?php }
                }
