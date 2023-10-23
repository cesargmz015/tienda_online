<?php
session_start();
require_once('./modelo.php');
if (isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {
    $conexionBBDD = new conexionBBDD("root", "", "127.0.0.1:3307", "tienda_online");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="../style/admin.css">
        <script src="../js/admin.js"></script>
    </head>

    <body>
        <div class="div-container">
            <div class="div-botones">
                <button type="button" id="boton-usuarios"><span>Usuarios</span></button>
                <button type="button" id="boton-articulos"><span>Articulos</span></button>
                <?php
                //TODO: Aqui añadir los botones de editar o eliminar si existe algun checkbox checked
                // if (condition) {

                // }
                ?>
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
                        <p class="parrafo-datos"><input type="checkbox" name="checkbox" id="checkbox"> <?= $id ?>, <?= $nombre ?>, <?= $apellidos ?>, <?= $direccion ?>, <?= $telefono ?>, <?= $correo ?>, <?= $contraseña ?>, <?= $dni ?>, <?= $token ?>, <?= $rol ?></p>
                    <?php
                    }
                    ?>
                </form>
                <form action="" method="get" class="form-usuarios" id="form-sudaderas">
                    <?php
                    $datos = $conexionBBDD->obtenerDatos("SELECT * FROM novedades");
                    $sudaderas = $conexionBBDD->convertirDatos($datos);
                    ?>
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
                        <p class="parrafo-datos"><input type="checkbox" name="checkbox" id="checkbox-sudaderas"> <?= $id ?>, <?= $nombre ?>, <?= $descripcion ?>, <?= $precio ?>, <?= $imagen ?>, <?= $activa ?>, <?= $fecha ?>, <?= $descripcion_larga ?></p>
                    <?php
                    }
                    $datos = $conexionBBDD->obtenerDatos("SELECT * FROM destacados");
                    $sudaderas = $conexionBBDD->convertirDatos($datos);
                    ?>
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
                        <p class="parrafo-datos"><input type="checkbox" name="checkbox" id="checkbox-sudaderas"> <?= $id ?>, <?= $nombre ?>, <?= $descripcion ?>, <?= $precio ?>, <?= $imagen ?>, <?= $activa ?>, <?= $fecha ?>, <?= $descripcion_larga ?></p>
                    <?php
                    }
                    $datos = $conexionBBDD->obtenerDatos("SELECT * FROM ofertas");
                    $sudaderas = $conexionBBDD->convertirDatos($datos);
                    ?>
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
                        <p class="parrafo-datos"><input type="checkbox" name="checkbox" id="checkbox-sudaderas"> <?= $id ?>, <?= $nombre ?>, <?= $descripcion ?>, <?= $precio ?>, <?= $imagen ?>, <?= $activa ?>, <?= $fecha ?>, <?= $descripcion_larga ?></p>
                    <?php
                    }
                    // //TODO: genera un codigo para recoger todos los checkboxes vinculados a su $id que estan checked de todos articulos

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
