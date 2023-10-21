<?php
require("./modelo.php");

$email = $_GET["email"];
$password = $_GET["password"];
$minimo = 3;
class comprobacion {
    static function comprobarEmail($email) {
        if (empty($email)) {
            echo "<h2>el email es un campo obligatorio</h2>";
            return false;
        } else if (strtolower(strpos($email, '@') && strpos($email, '.'))) {
            return true;
        } else {
            echo "<h2>email inválido</h2>";
            return false;
        }
    }

    static function comprobarLongitudPassword($minimoPassword, $password) {
        if (empty($password)) {
            echo "<h2>la contraseña es un campo obligatorio</h2>";
            return false;
        } else if (strlen($password) < $minimoPassword) {
            echo "<h2>la contraseña no tiene la longitud minima de 3 caracteres</h2>";
            return false;
        }
        return true;
    }
}

$email_valido = comprobacion::comprobarEmail($email);
$password_valido = comprobacion::comprobarLongitudPassword($minimo, $password);

if ($email_valido == true && $password_valido == true) {
    session_start();
    $conexion = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
    $datos = $conexion->obtenerDatos("SELECT * FROM usuario WHERE correo='$email' AND contraseña='$password'");
    if ($datos->num_rows < 1) {
        echo "ERROR: correo o contraseña incorrectos";
?>
        <a href="./index.php">
            <button type="button">volver</button>
        </a>
<?php
    } else {
        $usuario = $conexion->convertirDatos($datos);
        session_start();
        $_SESSION["id"] = $usuario[0]->id;
        $_SESSION["nombre"] = $usuario[0]->nombre;
        $_SESSION["rol"] = $usuario[0]->rol;
        header('Location: ./index.php');
        exit; // Es importante llamar a exit después de header para asegurarte de que no se ejecute más código después de la redirección.
    }
}
