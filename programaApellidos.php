<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Resler, Leandro. FAI-4275. TUDW. leandro.resler@est.fi.uncoma.edu.ar. usuario github: leoresler. */
/* Gloria Daniela, Ramirez. FAI-4280. TUDW.  gloria.ramirez@est.fi.uncoma.edu.ar. usuario github: GloriaRamirez. */



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/


/**
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
 * Funcion para armar arreglo asociativo de juego
 * @param string $nombreJugadorCruz
 * @param string $nombreJugadorCirculo
 * @param int $puntosCruz
 * @param int $puntosCirculo
 * @return array
 */
function arregloJuego($nombreJugadorCruz, $nombreJugadorCirculo, $puntosCruz, $puntosCirculo) {
    $juego= ["jugadorCruz" => "$nombreJugadorCruz", "jugadorCirculo" => "$nombreJugadorCirculo", "puntosCruz" => $puntosCruz, "puntosCirculo" => $puntosCirculo];
return ($juego);
}


/**
 * Retorna el resumen de un jugador en especifico
 *@param array $coleccionJuegos
 *@param string $nombreJugador
 *@return array 
 */

 function obtenerResumenJugador($coleccionJuegos, $nombreJugador) {

    $resumen = [

        "juegosGanados" => 0,
        "juegosPerdidos" => 0,
        "juegosEmpatados" => 0,
        "puntosAcumulados" => 0
    ];
    
    foreach ($coleccionJuegos as $juego) { /* se recorre cada elemento del array $coleccionJuegos */ 
        if ($juego["jugadorCruz"] == $nombreJugador) {
            if ($juego["puntosCruz"] > $juego["puntosCirculo"]) {
                $resumen["juegosGanados"]++;
            } elseif ($juego["puntosCruz"] < $juego["puntosCirculo"]) {
                $resumen["juegosPerdidos"]++;
            } else {
                $resumen["juegosEmpatados"]++; /* "++" es igual a escribir $resumen["juegosEmpatados"] = $resumen["juegosEmpatados"] + 1 */
            }
            $resumen["puntosAcumulados"] += $juego["puntosCruz"]; /* "+=" es igual a escribir $resumen["puntosAcumulados"] = $resumen["puntosAcumulados"] + $juego["puntosCruz"] */
        } elseif ($juego["jugadorCirculo"] == $nombreJugador) {
            if ($juego["puntosCirculo"] > $juego["puntosCruz"]) {
                $resumen["juegosGanados"]++;
            } elseif ($juego["puntosCirculo"] < $juego["puntosCruz"]) {
                $resumen["juegosPerdidos"]++;
            } else {
                $resumen["juegosEmpatados"]++;
            }
            $resumen["puntosAcumulados"] += $juego["puntosCirculo"];
        }
    }
    
    return $resumen;
}

/**
 * Muestra el resumen del jugador en pantalla
 * @param array $resumenJugador
 * @param string $nombreJugador
 * @return void
 */
function mostrarResumenJugador($resumenJugador, $nombreJugador) { /* $resumenJugador va a ser el retorno de la funcion obtenerResumenJugador */

    echo "**********************\n";
    echo "Jugador: " . $nombreJugador . "\n";
    echo "Juegos Ganados: " . $resumenJugador["juegosGanados"] . " juegos" . "\n";
    echo "juegos Perdidos " . $resumenJugador["juegosPerdidos"] . " juegos" . "\n";
    echo "Juegos Empatados " . $resumenJugador["juegosEmpatados"] . " juegos" . "\n";
    echo "Total de puntos acumulados: " . $resumenJugador["puntosAcumulados"] . " puntos" . "\n";
    echo "**********************\n";

}



/**
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


/**
 * Cuenta los juegos ganados, sin importar el simbolo
 * @param array $coleccionJuegos
 * @return int
 */

 function contarJuegosGanados($coleccionJuegos) {
    // int $ganados

    $ganados = 0;

    foreach ($coleccionJuegos as $juego) {
        if ($juego["puntosCruz"] > 1 || $juego["puntosCirculo"] > 1) {
            $ganados++;
        }
    }

    return $ganados;
}



/**
 * Solicita un simbolo (X u O) 
 * @return array
 */
function solicitarSimbolo() {
    $simbolo = leerLinea("Ingrese un símbolo (X u O): ");
    
    while ($simbolo !== "X" && $simbolo !== "O") {
        echo "Símbolo inválido. Intente nuevamente." . "\n";
        $simbolo = leerLinea("Ingrese un símbolo (X u O): ");
    }
    
    return $simbolo;
}

/**
 * Funcion de ayuda para solicitarSimbolo
 * @param string $mensaje
 * @return string
 */
function leerLinea($mensaje) {
    echo $mensaje;
    $mensaje = trim(fgets(STDIN));
    return $mensaje;
}



/**
 * Muestra los juegos ordenados por el nombre del jugador O
 * @param array $coleccionJuegos
 * @return void
 */

 function mostrarJuegosOrdenados($coleccionJuegos) {
    // Función de comparacion
    $comparador = function($juego1, $juego2) {
        return strcmp($juego1["jugadorCirculo"], $juego2["jugadorCirculo"]);
        /* Compara dos string y determina si son iguales o cuál es mayor o menor alfabéticamente. En este caso se utiliza para comparar los nombres de los jugadores de círculo.
        La función strcmp devuelve un número negativo si $juego1 es menor que $juego2, cero si son iguales y un número positivo si $juego1 es mayor que $juego2. */
    };
    
    // Ordena la colección de juegos utilizando el comparador
    uasort($coleccionJuegos, $comparador); // utiliza el comparador para determinar el orden de los elementos en la colección
    // uasort: Ordena los elementos usando una funcion de comparacion definida por el usuario. Lo utilizamos para mantener el orden que nosotros mismos hicimos en el comparador.
    
    print_r($coleccionJuegos);
}



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:



//Inicialización de variables:



//Proceso:

$juego = jugar();

//print_r($juego);
//imprimirResultado($juego);



do {
    seleccionarOpcion ();
    echo "Seleccione una opcion:";
    $opcion = seleccionarOpcion();
    
    switch ($opcion) { /* La instruccion switch es similar a la estructura alternativa. Evalua una variable o expresión y ejecuta diferentes bloques de código según el valor que tenga  */
        case 1:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 4:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 4
        
            break;
        case 5:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 5

            break;
        case 6:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 6

            break;
        case 7:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 7

            break;
    }
} while ($opcion != 7);
