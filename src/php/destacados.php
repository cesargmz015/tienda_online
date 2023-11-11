<?php
session_start();
require_once('./modelo.php');
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sudadera = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
    $datos = $sudadera->obtenerDatos("SELECT * FROM destacados WHERE id = '$id'");
    $sudaderas = $sudadera->convertirDatos($datos);
} else {
    echo "error";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="../styles/articulo.css">
    <script src="../js/functions.js" defer></script>
    <link rel="shortcut icon" href="../img/logo-tienda.ico" type="image/x-icon">
    <script>
        function agregarCantidadACarrito(id, id_usuario) {
            let cantidad = document.getElementById('cantidad-carrito').value;
            if (cantidad == "" || cantidad == 0) {
                cantidad = 1;
            }
            window.location.href = `./carrito.php?id=${id}&id_usuario=${id_usuario}&cantidad=${cantidad}`;
            console.log("cantidad correcta");
        }
    </script>
</head>

<body>
    <div class="h1">
        <h1>TIENDA ONLINE</h1>
    </div class="h1">
    <header>
        <div class="div_header">
            <div>
                <a href="./index.php">
                    <img src="../img/logo-tienda.png" alt="logo_tienda" id="logo_tienda">
                </a href="./index.html">
            </div>
            <div class="input-container-search">
                <input type="search" name="text" class="input-search" placeholder="buscar...">
                <span class="icon">
                    <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </span>
            </div>
            <?php
            if (isset($_SESSION["id"])) { ?>
                <div class="botones_header">
                    <label>
                        Bienvenido <?= $_SESSION["nombre"] ?>
                    </label>
                    <button type="button" onclick="window.location.href='./logout.php'"><span>Logout</span></button>
                    <?php if ($_SESSION["rol"] > 0) { ?>
                        <button type="button" onclick="window.location.href='./admin.php'"><span>Admin</span></button>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="botones_header">
                    <button type="button" id="boton-login"><span>Login</span></button>
                    <button type="button" id="boton-registro"><span>Sign up</span></button>
                </div>
            <?php } ?>
        </div>
        <hr class="hr-header">
    </header>
    <main>
        <h2 class="seccion-articulo">de destacados</h2>
        <article>
            <section class="main-container">
                <?php
                if (count($sudaderas)) {
                    $titulo = $sudaderas[0]->nombre;
                    $precio = $sudaderas[0]->precio;
                    $descripcion = $sudaderas[0]->descripcion;
                    $descripcion_larga = $sudaderas[0]->descripcion_larga;
                } else {
                    echo "no se encuentra el producto";
                }
                /* esto es para recuperar y mostrar el indice de la imagen que se ha mostrado
                aleatoriamente en la pagina principal index.php que se ha recuperado de ella */

                if (isset($_GET['imgIndex'])) {
                    $imagen = urldecode($_GET['imgIndex']);
                } else {
                    echo "error en la imagen";
                }
                ?>
                <div class="imagen">
                    <img src="<?= $imagen ?>" alt="imagen">
                </div>

                <div class="detalles">
                    <h2><?= $titulo ?></h2>
                    <h2><?= $precio ?>€</h2>
                    <h3><?= $descripcion ?></h3>
                    <br>
                    <input type="number" name="cantidad-carrito" id="cantidad-carrito" min="1" step="1" placeholder="cantidad" oninput="validity.valid||(value='');">
                    <br>
                    <br>
                    <br>
                    <button type="button" class="carrito" onclick="agregarCantidadACarrito(<?= $id ?>, <?= $id_usuario ?>)"><span>Añadir al carrito</span></button>
                </div>
            </section>
            <section class="descripcion_larga">
                <p><?= $descripcion_larga ?>
                </p>
            </section>
        </article>
    </main>
    <br>
    <footer>
        <hr class="hr-footer">
        <nav>
            <div class="div_footer">
                <div class="div_enlaces_footer">
                    <a href="">enlace 1</a><br>
                    <a href="">enlace 2</a><br>
                    <a href="">enlace 3</a><br>
                    <a href="">enlace 4</a><br>
                    <a href="">enlace 5</a><br>
                </div>
                <div class="div_enlaces_footer">
                    <a href="">enlace 1</a><br>
                    <a href="">enlace 2</a><br>
                    <a href="">enlace 3</a><br>
                    <a href="">enlace 4</a><br>
                    <a href="">enlace 5</a><br>
                </div>
                <div class="div_enlaces_footer">
                    <a href="">enlace 1</a><br>
                    <a href="">enlace 2</a><br>
                    <a href="">enlace 3</a><br>
                    <a href="">enlace 4</a><br>
                    <a href="">enlace 5</a><br>
                </div>
                <div class="div_enlaces_footer">
                    <a href=""><img src="https://cdn-icons-png.flaticon.com/512/1384/1384031.png" alt="" class="icons_social_media"></a><br>
                    <a href=""><img src="https://cdn-icons-png.flaticon.com/512/1419/1419524.png" alt="" class="icons_social_media"></a><br>
                    <a href=""><img src="https://cdn-icons-png.flaticon.com/512/1384/1384023.png" alt="" class="icons_social_media"></a><br>
                    <a href=""><img src="https://www.svgrepo.com/show/346839/facebook-circle.svg" alt="" class="icons_social_media"></a><br>
                </div>
            </div class="div_footer">
        </nav>
        <p class="copy">&copy; César Gómez 2023</p>
        <br>
    </footer>
    <div id="login" class="oculto">
        <div class="modal">
            <form class="form" action="../php/login.php" method="get">
                <p class="form-title">Login</p>
                <div class="input-container">
                    <input id="email-login" type="email" name="email" placeholder="Enter email">
                </div>
                <div class="input-container">
                    <input id="password-login" type="password" name="password" placeholder="Enter password">
                </div>
                <button type="submit" class="submit">
                    <span>Login</span>
                </button>
            </form>
        </div>
        <div class="fondo"></div>
    </div>
    <div id="registro" class="oculto">
        <div class="modal">
            <form class="form" action="../php/signup.php" method="get">
                <p class="form-title">Sign up</p>
                <div class="input-container">
                    <input id="nombre" type="text" name="nombre" placeholder=" Enter name">
                </div>
                <div class="input-container">
                    <input id="apellidos" type="text" name="apellidos" placeholder=" Enter surnames">
                </div>
                <div class="input-container">
                    <input id="dni" type="text" name="dni" placeholder=" Enter dni">
                </div>
                <div class="input-container">
                    <input id="direccion" type="text" name="direccion" placeholder=" Enter adress">
                </div>
                <div class="input-container">
                    <input id="telefono" type="tel" name="telefono" placeholder=" Enter phone number">
                </div>
                <div class="input-container">
                    <input id="email-signup" type="email" name="email" placeholder=" Enter email">
                </div>
                <div class="input-container">
                    <input id="password-signup" type="password" name="password" placeholder="Enter password">
                </div>
                <br>
                <div class="terminos">
                    <input type="checkbox" name="terminos" id="terminos"><label for="terminos">Términos y
                        condiciones</label>
                </div>
                <br>
                <button type="submit" class="submit">
                    <span>Sign up</span>
                </button>
            </form>
        </div>
        <div class="fondo"></div>
    </div>
</body>

</html>