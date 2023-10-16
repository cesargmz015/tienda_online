<?php
// require("./conexionBBDD.php");

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
