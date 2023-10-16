<?php

require("./token.php");
// require("./conexionBBDD.php");

$nombre = $_GET["nombre"];
$apellidos = $_GET["apellidos"];
$dni = $_GET["dni"];
$tel = $_GET["telefono"];
$email = $_GET["email"];
$password = $_GET["password"];
$direccion = $_GET["direccion"];
$terminos = isset($_GET["terminos"]);
$minimoPassword = 3;
$minimoGeneral = 9;
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

    static function comprobarLongitudGeneral($minimoGeneral, $dni, $tel, $direccion) {
        if (empty($dni) || empty($tel) || empty($direccion)) {
            echo "<h2>los siguientes campos son obligatorios: dni, telefono, direccion 1 y género</h2>";
            return false;
        } else if (strlen($dni) !== $minimoGeneral || strlen($tel) !== $minimoGeneral) {
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

$email_valido = comprobacion::comprobarEmail($email);
$password_valido = comprobacion::comprobarLongitudPassword($minimoPassword, $password);
$campos_validos = comprobacion::comprobarLongitudGeneral($minimoGeneral, $dni, $tel, $direccion);
$terminos_aceptados = comprobacion::terminos_aceptados($terminos);
