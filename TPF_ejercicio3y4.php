<?php

// EJERCICIO 3 EXPLICACION 3

/**
 * Solicita al usuario un número en el rango [$min,$max]
 * @param int $min
 * @param int $max
 * @return int 
 */
function solicitarNumeroEntre($min, $max)
{
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}


// EJERCICIO 4 EXPLICACION 3

/**
 * Muestra en pantalla el resultado del juego
 * @param array $juego
 */
function imprimirResultado($juego)
{
    echo "**********************\n";
    if ($juego["puntosCruz"] > $juego["puntosCirculo"]) {
        echo $juego["jugadorCruz"] . " GANASTE " . $juego["puntosCruz"] . " puntos!!!!!\n";
    } elseif ($juego["puntosCruz"] < $juego["puntosCirculo"]) {
        echo $juego["jugadorCirculo"] . " GANASTE " . $juego["puntosCirculo"] . " puntos!!!!!\n";
    } else {
        echo "EMPATE ENTRE " . $juego["jugadorCruz"] . " y " . $juego["jugadorCirculo"] . ". " . $juego["puntosCruz"] . "  puntos para cada uno!!!!!\n";
    }
    echo "**********************\n";
}