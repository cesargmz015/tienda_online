<?php
require_once("./modelo.php");
$sudadera = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
//$datos = $sudadera->obtenerDatos("SELECT * FROM sudadera ORDER BY fecha LIMIT 4");
// $datos = $sudadera->obtenerDatos("SELECT * FROM producto WHERE oferta = 1 LIMIT 4");
// $sudaderas = $sudadera->convertirDatos($datos);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="../style/style.css">
    <script src="../js/functions.js"></script>
</head>

<body>
    <div class="h1">
        <h1>TIENDA ONLINE</h1>
    </div class="h1">
    <header>
        <div class="div_header">
            <div>
                <a href="./index.html">
                    <img src="https://static.thenounproject.com/png/127211-200.png" alt="logo_tienda" id="logo_tienda">
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
            <div class="botones_header">
                <button type="button" id="boton-login"><span>Login</span></button>
                <button type="button" id="boton-registro"><span>Sign up</span></button>
            </div>
        </div>
        <hr class="hr-header">
    </header>
    <main>
        <h1>Novedades</h1>
        <!-- carrusel1 -->
        <div class="carrusel">
            <!-- galeria1 -->
            <div class="galeria-carrusel1">
                <section class="imagenes">
                    <?php
                    $datos = $sudadera->obtenerDatos("SELECT * FROM novedades WHERE activa = 1 LIMIT 4");
                    $sudaderas = $sudadera->convertirDatos($datos);
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $indiceAleatorio = rand(0, count($sudaderas) - 1);
                        $imagen = $sudaderas[$indiceAleatorio]->imagen;
                        // Aquí se imprime solamente la imagen
                    ?>
                        <img src="<?= $imagen ?>" alt="Camiseta" onclick="window.location.href='./novedades.php?id=<?= $id ?>'">
                    <?php
                    }
                    ?>
                </section>
                <section class="detalles">
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $titulo = $sudaderas[$i]->nombre;
                        $precio = $sudaderas[$i]->precio;
                        $descripcion = $sudaderas[$i]->descripcion;
                        // Aquí se imprime solamente los detalles de la sudadera
                    ?>
                        <div class="div-detalles">
                            <h2><?= $titulo ?></h2>
                            <h2><?= $precio ?>€</h2>
                            <h3><?= $descripcion ?></h3>
                        </div>
                    <?php
                    }
                    ?>
                </section>
                <h4>1</h4>
            </div>
            <!-- galeria2 -->
            <div class="galeria-carrusel1">
                <section class="imagenes">
                    <?php
                    $datos = $sudadera->obtenerDatos("SELECT * FROM novedades WHERE activa = 1 LIMIT 4,4");
                    $sudaderas = $sudadera->convertirDatos($datos);
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $indiceAleatorio = rand(0, count($sudaderas) - 1);
                        $imagen = $sudaderas[$indiceAleatorio]->imagen;
                        // Aquí se imprime solamente la imagen
                    ?>
                        <img src="<?= $imagen ?>" alt="Camiseta" onclick="window.location.href='./novedades.php?id=<?= $id ?>'">
                    <?php
                    }
                    ?>
                </section>
                <section class="detalles">
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $titulo = $sudaderas[$i]->nombre;
                        $precio = $sudaderas[$i]->precio;
                        $descripcion = $sudaderas[$i]->descripcion;
                        // Aquí se imprime solamente los detalles de la sudadera
                    ?>
                        <div class="div-detalles">
                            <h2><?= $titulo ?></h2>
                            <h2><?= $precio ?>€</h2>
                            <h3><?= $descripcion ?></h3>
                        </div>
                    <?php
                    }
                    ?>
                </section>
                <h4>2</h4>
            </div>
            <!-- galeria3 -->
            <div class="galeria-carrusel1">
                <section class="imagenes">
                    <?php
                    $datos = $sudadera->obtenerDatos("SELECT * FROM novedades WHERE activa = 1 LIMIT 8,4");
                    $sudaderas = $sudadera->convertirDatos($datos);
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $indiceAleatorio = rand(0, count($sudaderas) - 1);
                        $imagen = $sudaderas[$indiceAleatorio]->imagen;
                        // Aquí se imprime solamente la imagen
                    ?>
                        <img src="<?= $imagen ?>" alt="Camiseta" onclick="window.location.href='./novedades.php?id=<?= $id ?>'">
                    <?php
                    }
                    ?>
                </section>
                <section class="detalles">
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $titulo = $sudaderas[$i]->nombre;
                        $precio = $sudaderas[$i]->precio;
                        $descripcion = $sudaderas[$i]->descripcion;
                        // Aquí se imprime solamente los detalles de la sudadera
                    ?>
                        <div class="div-detalles">
                            <h2><?= $titulo ?></h2>
                            <h2><?= $precio ?>€</h2>
                            <h3><?= $descripcion ?></h3>
                        </div>
                    <?php
                    }
                    ?>
                </section>
                <h4>3</h4>
            </div>
        </div>
        <div class="div-botones-galeria">
            <button class="btn-prev-carrusel1"><span>previous</span></button>
            <button class="btn-next-carrusel1"><span>next</span></button>
        </div>
        <hr class="hr-main">
        <br>
        <h1>Destacados</h1>
        <!-- carrusel2 -->
        <div class="carrusel">
            <!-- galeria1 -->
            <div class="galeria-carrusel2">
                <section class="imagenes">
                    <?php
                    $datos = $sudadera->obtenerDatos("SELECT * FROM destacados WHERE activa = 1 LIMIT 4");
                    $sudaderas = $sudadera->convertirDatos($datos);
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $indiceAleatorio = rand(0, count($sudaderas) - 1);
                        $imagen = $sudaderas[$indiceAleatorio]->imagen;
                        // Aquí se imprime solamente la imagen
                    ?>
                        <img src="<?= $imagen ?>" alt="Camiseta" onclick="window.location.href='./destacados.php?id=<?= $id ?>'">
                    <?php
                    }
                    ?>
                </section>
                <section class="detalles">
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $titulo = $sudaderas[$i]->nombre;
                        $precio = $sudaderas[$i]->precio;
                        $descripcion = $sudaderas[$i]->descripcion;
                        // Aquí se imprime solamente los detalles de la sudadera
                    ?>
                        <div class="div-detalles">
                            <h2><?= $titulo ?></h2>
                            <h2><?= $precio ?>€</h2>
                            <h3><?= $descripcion ?></h3>
                        </div>
                    <?php
                    }
                    ?>
                </section>
                <h4>1</h4>
            </div>
            <!-- galeria2 -->
            <div class="galeria-carrusel2">
                <section class="imagenes">
                    <?php
                    $datos = $sudadera->obtenerDatos("SELECT * FROM destacados WHERE activa = 1 LIMIT 4,4");
                    $sudaderas = $sudadera->convertirDatos($datos);
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $indiceAleatorio = rand(0, count($sudaderas) - 1);
                        $imagen = $sudaderas[$indiceAleatorio]->imagen;
                        // Aquí se imprime solamente la imagen
                    ?>
                        <img src="<?= $imagen ?>" alt="Camiseta" onclick="window.location.href='./destacados.php?id=<?= $id ?>'">
                    <?php
                    }
                    ?>
                </section>
                <section class="detalles">
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $titulo = $sudaderas[$i]->nombre;
                        $precio = $sudaderas[$i]->precio;
                        $descripcion = $sudaderas[$i]->descripcion;
                        // Aquí se imprime solamente los detalles de la sudadera
                    ?>
                        <div class="div-detalles">
                            <h2><?= $titulo ?></h2>
                            <h2><?= $precio ?>€</h2>
                            <h3><?= $descripcion ?></h3>
                        </div>
                    <?php
                    }
                    ?>
                </section>
                <h4>2</h4>
            </div>
            <!-- galeria3 -->
            <div class="galeria-carrusel2">
                <section class="imagenes">
                    <?php
                    $datos = $sudadera->obtenerDatos("SELECT * FROM destacados WHERE activa = 1 LIMIT 8,4");
                    $sudaderas = $sudadera->convertirDatos($datos);
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $indiceAleatorio = rand(0, count($sudaderas) - 1);
                        $imagen = $sudaderas[$indiceAleatorio]->imagen;
                        // Aquí se imprime solamente la imagen
                    ?>
                        <img src="<?= $imagen ?>" alt="Camiseta" onclick="window.location.href='./destacados.php?id=<?= $id ?>'">
                    <?php
                    }
                    ?>
                </section>
                <section class="detalles">
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $titulo = $sudaderas[$i]->nombre;
                        $precio = $sudaderas[$i]->precio;
                        $descripcion = $sudaderas[$i]->descripcion;
                        // Aquí se imprime solamente los detalles de la sudadera
                    ?>
                        <div class="div-detalles">
                            <h2><?= $titulo ?></h2>
                            <h2><?= $precio ?>€</h2>
                            <h3><?= $descripcion ?></h3>
                        </div>
                    <?php
                    }
                    ?>
                </section>
                <h4>3</h4>
            </div>
        </div>
        <div class="div-botones-galeria">
            <button class="btn-prev-carrusel2"><span>previous</span></button>
            <button class="btn-next-carrusel2"><span>next</span></button>
        </div>
        <hr class="hr-main">
        <br>
        <h1>Ofertas</h1>
        <!-- carrusel3 -->
        <div class="carrusel">
            <!-- galeria1 -->
            <div class="galeria-carrusel3">
                <section class="imagenes">
                    <?php
                    $datos = $sudadera->obtenerDatos("SELECT * FROM ofertas WHERE activa = 1 LIMIT 4");
                    $sudaderas = $sudadera->convertirDatos($datos);
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $indiceAleatorio = rand(0, count($sudaderas) - 1);
                        $imagen = $sudaderas[$indiceAleatorio]->imagen;
                        // Aquí se imprime solamente la imagen
                    ?>
                        <img src="<?= $imagen ?>" alt="Camiseta" onclick="window.location.href='./ofertas.php?id=<?= $id ?>'">
                    <?php
                    }
                    ?>
                </section>
                <section class="detalles">
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $titulo = $sudaderas[$i]->nombre;
                        $precio = $sudaderas[$i]->precio;
                        $descripcion = $sudaderas[$i]->descripcion;
                        // Aquí se imprime solamente los detalles de la sudadera
                    ?>
                        <div class="div-detalles">
                            <h2><?= $titulo ?></h2>
                            <h2><?= $precio ?>€</h2>
                            <h3><?= $descripcion ?></h3>
                        </div>
                    <?php
                    }
                    ?>
                </section>
                <h4>1</h4>
            </div>
            <!-- galeria2 -->
            <div class="galeria-carrusel3">
                <section class="imagenes">
                    <?php
                    $datos = $sudadera->obtenerDatos("SELECT * FROM ofertas WHERE activa = 1 LIMIT 4,4");
                    $sudaderas = $sudadera->convertirDatos($datos);
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $indiceAleatorio = rand(0, count($sudaderas) - 1);
                        $imagen = $sudaderas[$indiceAleatorio]->imagen;
                        // Aquí se imprime solamente la imagen
                    ?>
                        <img src="<?= $imagen ?>" alt="Camiseta" onclick="window.location.href='./ofertas.php?id=<?= $id ?>'">
                    <?php
                    }
                    ?>
                </section>
                <section class="detalles">
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $titulo = $sudaderas[$i]->nombre;
                        $precio = $sudaderas[$i]->precio;
                        $descripcion = $sudaderas[$i]->descripcion;
                        // Aquí se imprime solamente los detalles de la sudadera
                    ?>
                        <div class="div-detalles">
                            <h2><?= $titulo ?></h2>
                            <h2><?= $precio ?>€</h2>
                            <h3><?= $descripcion ?></h3>
                        </div>
                    <?php
                    }
                    ?>
                </section>
                <h4>2</h4>
            </div>
            <!-- galeria3 -->
            <div class="galeria-carrusel3">
                <section class="imagenes">
                    <?php
                    $datos = $sudadera->obtenerDatos("SELECT * FROM ofertas WHERE activa = 1 LIMIT 8,4");
                    $sudaderas = $sudadera->convertirDatos($datos);
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $id = $sudaderas[$i]->id;
                        $indiceAleatorio = rand(0, count($sudaderas) - 1);
                        $imagen = $sudaderas[$indiceAleatorio]->imagen;
                        // Aquí se imprime solamente la imagen
                    ?>
                        <img src="<?= $imagen ?>" alt="Camiseta" onclick="window.location.href='./ofertas.php?id=<?= $id ?>'">
                    <?php
                    }
                    ?>
                </section>
                <section class="detalles">
                    <?php
                    for ($i = 0; $i < count($sudaderas); $i++) {
                        $titulo = $sudaderas[$i]->nombre;
                        $precio = $sudaderas[$i]->precio;
                        $descripcion = $sudaderas[$i]->descripcion;
                        // Aquí se imprime solamente los detalles de la sudadera
                    ?>
                        <div class="div-detalles">
                            <h2><?= $titulo ?></h2>
                            <h2><?= $precio ?>€</h2>
                            <h3><?= $descripcion ?></h3>
                        </div>
                    <?php
                    }
                    ?>
                </section>
                <h4>3</h4>
            </div>
        </div>
        <div class="div-botones-galeria">
            <button class="btn-prev-carrusel3"><span>previous</span></button>
            <button class="btn-next-carrusel3"><span>next</span></button>
        </div>
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