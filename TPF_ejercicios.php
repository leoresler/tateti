<?php
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


/**
 * EXPLICACION 3, punto 2
 * Muestra el menú, solicita un numero de opcion y lo retorna
 * @return $int
 */
function seleccionarOpcion () {
    //int $opcion
    echo "MENU DE OPCIONES: 
          1)Jugar al tateti
          2)Mostrar un juego 
          3)Mostrar el primer juego ganador 
          4)Mostrar porcentaje de juegos ganados 
          5)Mostrar resumen de jugador 
          6)Mostrar listado de juegos ordenado por jugador 
          7)Salir"
          ;
do {
    echo "\nSeleccione una opcion válida:";
    $opcion=trim(fgets(STDIN));
}
while ($opcion < 1 || $opcion > 7);          
return ($opcion);    
}

//PROGRAMA PRINCIPAL
//int $opcionSelecta
$juegosColeccion=cargarJuegos(); //Variable de prueba para ver si imprime bien el array
print_r ($juegosColeccion);
$opcionSelecta= seleccionarOpcion(); //Variable de prueba para que imprima la opcion elegida
echo $opcionSelecta;


// EXPLICACION 3, punto 3
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


// EXPLICACION 3, punto 4
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