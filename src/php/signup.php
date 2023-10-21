<?php
require("./token.php");
require("./modelo.php");

$nombre = $_GET["nombre"];
$apellidos = $_GET["apellidos"];
$dni = $_GET["dni"];
$telefono = $_GET["telefono"];
$correo = $_GET["email"];
$contraseña = $_GET["password"];
$direccion = $_GET["direccion"];
$terminos = isset($_GET["terminos"]);
$minimoPassword = 3;
$minimoGeneral = 9;
class comprobacion {
    static function comprobarEmail($correo) {
        if (empty($correo)) {
            echo "<h2>el correo es un campo obligatorio</h2>";
            return false;
        } else if (strtolower(strpos($correo, '@') && strpos($correo, '.'))) {
            return true;
        } else {
            echo "<h2>correo inválido</h2>";
            return false;
        }
    }

    static function comprobarLongitudPassword($minimoPassword, $contraseña) {
        if (empty($contraseña)) {
            echo "<h2>la contraseña es un campo obligatorio</h2>";
            return false;
        } else if (strlen($contraseña) < $minimoPassword) {
            echo "<h2>la contraseña no tiene la longitud minima de 3 caracteres</h2>";
            return false;
        }
        return true;
    }

    static function comprobarLongitudGeneral($minimoGeneral, $dni, $telefono, $direccion) {
        if (empty($dni) || empty($telefono) || empty($direccion)) {
            echo "<h2>los siguientes campos son obligatorios: dni, telefono, direccion 1 y género</h2>";
            return false;
        } else if (strlen($dni) !== $minimoGeneral || strlen($telefono) !== $minimoGeneral) {
            echo "<h2>DNI o Teléfono no tienen la longitud obligatoria de 9 caracteres</h2>";
            return false;
        }
        return true;
    }

    static function terminos_aceptados($terminos) {
        if ($terminos == 1) {
            return true;
        }
        echo "<h2>debe aceptar los terminos y condiciones</h2>";
        return false;
    }
}

$email_valido = comprobacion::comprobarEmail($correo);
$password_valido = comprobacion::comprobarLongitudPassword($minimoPassword, $contraseña);
$campos_validos = comprobacion::comprobarLongitudGeneral($minimoGeneral, $dni, $telefono, $direccion);
$terminos_aceptados = comprobacion::terminos_aceptados($terminos);

if ($email_valido == true && $password_valido == true && $campos_validos == true && $terminos_aceptados == true) {
    $conexion = new conexionBBDD("root", "", "127.0.0.1:3306", "tienda_online");
    $existe_usuario = $conexion->obtenerDatos("SELECT * FROM usuario WHERE correo='$correo'");
    if ($existe_usuario->num_rows >= 1) {
        echo "ERROR: Este usuario ya está registrado";
    } else {
        $token = token::generadorDeToken(15);
        $insertar_usuario = $conexion->insertarDatos("INSERT INTO usuario (nombre, apellidos, direccion, telefono, correo, contraseña, dni, token, rol) VALUES ('$nombre', '$apellidos', '$direccion', '$telefono', '$correo', '$contraseña', '$dni', '$token', '0')");
        echo "usuario registrado correctamente";
    }
}
?>
<a href="./index.php">
    <button type="button">volver</button>
</a>