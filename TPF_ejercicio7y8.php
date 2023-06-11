<?php

// EXPLICACION 3, punto 7
/**
 * Se solicita un nombre de un jugador y retorna el resumen del mismo
 * @param string $nombreJugador
 * @return array
 */

function resumenJugador ($nombreJugador) {
    
    // array $jugador

    echo "Ingrese nombre de un jugador:";
    $nombreJugador = trim(fgets(STDIN));

    echo "**********************\n";
    $jugador = [];
    echo $jugador ["nombre"] = "jugador " . $nombreJugador;
    echo $jugador ["juegosGanados"] = "gano: " .  . "juegos";
    echo $jugador ["juegosPerdidos"] = "perdio: " .  . "juegos";
    echo $jugador ["juegosEmpatados"] = "empato: " .  . "juegos" ;
    echo $jugador ["puntosAcumulados"] = "total de puntos acumulados: " .  . "puntos";
    echo "**********************\n";
}


/**
* EXPLICACION 3, punto 1
*Inicializa datos de juegos, retorna colección de juegos
*@return $array
*/
function cargarJuegos () {
    //array $coleccionJuegos 
    $juego1 = ["jugadorCruz" => "majo", "jugadorCirculo" => "pepe", "puntosCruz" => 5, "puntosCirculo" => 0];

    $juego2 = ["jugadorCruz" => "juan", "jugadorCirculo" => "majo", "puntosCruz" => 1, "puntosCirculo" => 1];

    $juego3 = ["jugadorCruz" => "ana", "jugadorCirculo" => "lisa", "puntosCruz" => 1, "puntosCirculo" => 1];

    $juego4 = ["jugadorCruz" => "lisa", "jugadorCirculo" => "juan", "puntosCruz" => 6, "puntosCirculo" => 0];

    $juego5 = ["jugadorCruz" => "majo", "jugadorCirculo" => "lisa", "puntosCruz" => 1, "puntosCirculo" => 1];

    $juego6 = ["jugadorCruz" => "ana", "jugadorCirculo" => "luis", "puntosCruz" => 5, "puntosCirculo" => 0];

    $juego7 = ["jugadorCruz" => "luis", "jugadorCirculo" => "juan", "puntosCruz" => 0, "puntosCirculo" => 6];

    $juego8 = ["jugadorCruz" => "ana", "jugadorCirculo" => "juan", "puntosCruz" => 1, "puntosCirculo" => 1];

    $juego9 = ["jugadorCruz" => "ana", "jugadorCirculo" => "juan", "puntosCruz" => 5, "puntosCirculo" => 0];

    $juego10 = ["jugadorCruz" => "pepe", "jugadorCirculo" => "juan", "puntosCruz" => 0, "puntosCirculo" => 5];
    
    $coleccionJuegos =[];
    $coleccionJuegos [0] = $juego1;
    $coleccionJuegos [1] = $juego2;
    $coleccionJuegos [2] = $juego3;
    $coleccionJuegos [3] = $juego4;
    $coleccionJuegos [4] = $juego5;
    $coleccionJuegos [5] = $juego6;
    $coleccionJuegos [6] = $juego7;
    $coleccionJuegos [7] = $juego8;
    $coleccionJuegos [8] = $juego9;
    $coleccionJuegos [9] = $juego10;

return ($coleccionJuegos);
}