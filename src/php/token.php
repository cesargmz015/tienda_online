<?php

/**
 * *This class allows to create a token with letters, numbers and symbols
 * @param number the length for the token
 * @return token
 */
class token {
    static function generadorDeToken($numero_caracteres) {
        $lista_caracteres = "qwertyuiopasdfghjklñzxcvbnm0123456789?-_#$&!¿¡ç";
        $token = "";
        for ($i = 0; $i < $numero_caracteres; $i++) {
            $numero_aleatorio = rand(0, strlen($lista_caracteres) - 1);
            $valor = $lista_caracteres[$numero_aleatorio];
            $token .= $valor;
        }
        return $token;
    }
}
