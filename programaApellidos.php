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
          7)Salir";
echo "\nSeleccione una opción: ";
$opcion= solicitarNumeroEntre (1,7);        
return ($opcion);    
}


/**
 * Agrega datos de una nuevo juego a la coleccion de juegos
 * @param array $coleccionJuegos
 * @param array $juego
 * @return array
 */
function agregarJuego ($coleccionJuegos, $juego) {
    $n=count($coleccionJuegos);
    $coleccionJuegos[$n]=$juego;   
    return ($coleccionJuegos); 
}

/** 
 * Convierte el nombre de un jugador en mayusculas.
 * @return string 
 */
function solicitarJugador() {
    //string $cadena

    $cadena = "";
    $auxiliar = false;

    do {
        echo "Ingrese nombre del jugador: \n";
        $jugador = trim(fgets(STDIN));
        $cadena = substr($jugador, 0, 1); /* substr devuelve una parte del string definida por los parametros $jugador, 0 (comienza desde el indice 0) y 1 (longitud y marca el limite del recorrido) */
        if (ctype_alpha($cadena)) { /* ctype_alpha verifica si todos los caracteres de una cadena son letras alfabéticas. Devuelve true si la cadena es alfabética, de lo contrario, devuelve false. */
            $jugador = strtoupper($jugador); /* strtoupper convierte a la cadena de texto en minusculas */
            $auxiliar = true;
        } else {
            echo "El nombre ingresado debe contener solamente letras del alfabeto. \n";
        }
    } while ($auxiliar == false);

    return $jugador;
}


/**
 * Muestra los datos de un juego
 * @param array $coleccionJuegos
 * @param int $nro
 * @return void
 */
function datosDelJuego ($coleccionJuegos, $nro) {
    //array $juegoAbuscar
    //string $jugadorXenMayus, $jugadorOenMayus
    $juegoAbuscar= $coleccionJuegos[$nro-1];
    $jugadorXenMayus=strtoupper($juegoAbuscar["jugadorCruz"]);
    $jugadorOenMayus= strtoupper($juegoAbuscar["jugadorCirculo"]);
    if ($juegoAbuscar["puntosCruz"] == $juegoAbuscar["puntosCirculo"]) {
        echo "\n***********************************\n";
        echo   "Juego TATETI: ".$nro." (empate)";
        echo   "Jugador X: ".$jugadorXenMayus." obtuvo ".$juegoAbuscar["puntosCruz"]." puntos\n";
        echo   "Jugador O: ".$jugadorOenMayus." obtuvo ".$juegoAbuscar["puntosCirculo"]. " puntos\n";
        echo   "*********************************\n";
    }elseif ($juegoAbuscar["puntosCruz"] > $juegoAbuscar["puntosCirculo"]) {
        echo   "***********************************\n";
        echo   "Juego TATETI: ".$nro." (ganó X)\n";
        echo   "Jugador X: ".$jugadorXenMayus." obtuvo ".$juegoAbuscar["puntosCruz"]." puntos\n";
        echo   "Jugador O: ".$jugadorOenMayus." obtuvo ".$juegoAbuscar["puntosCirculo"]. " puntos\n";
        echo   "***********************************\n";
    }else {
        echo   "***********************************\n";
        echo   "Juego TATETI: ".$nro." (ganó O)\n";
        echo   "Jugador X: ".$jugadorXenMayus." obtuvo ".$juegoAbuscar["puntosCruz"]." puntos\n";
        echo   "Jugador O: ".$jugadorOenMayus." obtuvo ".$juegoAbuscar["puntosCirculo"]. " puntos\n"; 
        echo   "************************************\n";

    }
}

/**
 * A partir de una coleccion de juegos y el nombre de un jugador retorna el indice del primer juego ganado por él, si no ganó muestra -1
 * @param array $coleccionJuegos
 * @param string $nombreJugador
 * @return int
 */
function primerJuegoGanado ($coleccionJuegos, $nombreJugador) {
    //int $primerVictoria
    $n=count($coleccionJuegos);
    $i=0;
    $primerVictoria=-1;
    while ($i<$n && 
          !($coleccionJuegos[$i]["jugadorCruz"]==$nombreJugador && $coleccionJuegos[$i]["puntosCruz"]>$coleccionJuegos[$i]["puntosCirculo"])//Tambien podria ser $coleccionJuegos[$i]["puntosCruz"]>1
          && !($coleccionJuegos[$i]["jugadorCirculo"]==$nombreJugador && $coleccionJuegos[$i]["puntosCirculo"]>$coleccionJuegos[$i]["puntosCruz"])) //Tambien podria ser $coleccionJuegos[$i]["puntosCirculo]>1
         {
          $i++;
        }
    
    if ($i<$n){
        $primerVictoria=$i;
    };
    return $primerVictoria;
}

/**
 * Muestra el primer juego ganado por un jugador
 * @param array $coleccionJuegos 
 *param int $primerVictoria
 * @param string $nombreJugador
 */
function mostrarPrimerJuegoGanado ($coleccionJuegos, $nombreJugador) {
    $laPrimerVictoria= primerJuegoGanado($coleccionJuegos, $nombreJugador);
    if ($laPrimerVictoria>=1) {
        $primerJuegoGanado= $coleccionJuegos [$laPrimerVictoria];
        if ($primerJuegoGanado["puntosCruz"] > $primerJuegoGanado["puntosCirculo"]) {
            echo "\n***********************************\n";
            echo   "Juego TATETI: ".($laPrimerVictoria+1)." (ganó X)\n";
            echo   "Jugador X: ".strtoupper($primerJuegoGanado["jugadorCruz"]). " obtuvo ".$primerJuegoGanado["puntosCruz"]." puntos\n";
            echo   "Jugador O: ".strtoupper($primerJuegoGanado["jugadorCirculo"]). " obtuvo ".$primerJuegoGanado["puntosCirculo"]." puntos\n";
            echo   "***********************************\n" ;
        } elseif ($primerJuegoGanado["puntosCirculo"] > $primerJuegoGanado["puntosCruz"]) {
            echo "\n***********************************\n";
            echo   "Juego TATETI: ".($laPrimerVictoria+1)." (ganó O)\n";
            echo   "Jugador X:".$primerJuegoGanado["jugadorCruz"]. "obtuvo ".$primerJuegoGanado["puntosCruz"]." puntos\n";
            echo   "Jugador O:".$primerJuegoGanado["jugadorCirculo"]. "obtuvo ".$primerJuegoGanado["puntosCirculo"]." puntos\n";
            echo   "***********************************\n" ;                
        }
    }else {
            echo "El jugador ". strtoupper($nombreJugador)." no ganó ningún juego\n";
        }
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
    echo "Ganó: " . $resumenJugador["juegosGanados"] . " juegos" . "\n";
    echo "Perdió " . $resumenJugador["juegosPerdidos"] . " juegos" . "\n";
    echo "Empató " . $resumenJugador["juegosEmpatados"] . " juegos" . "\n";
    echo "Total de puntos acumulados: " . $resumenJugador["puntosAcumulados"] . " puntos" . "\n";
    echo "**********************\n";

}

/**
 * Funcion de ayuda para solicitarSimbolo
 * @param string $mensaje
 * @return string
 */
function leerLinea($mensaje) {
    echo $mensaje;
    $mensaje = trim(fgets(STDIN));
    $mensaje = strtoupper($mensaje);
    return $mensaje;
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
 * Dado una colección de juegos y un simbolo ingresado retorna la cantidad de juegos ganados por el mismo
 * @param array $coleccionJuegos
 * @param string $simbolo
 * @return int
 */
function ganadosPorSimbolo ($coleccionJuegos, $simbolo) {
    //int Si, $n
    $i=0;
    $cantGanadosPorSimbolo=0;
    $n=count($coleccionJuegos);
    if ($simbolo=="X" || $simbolo=="x") {
        for ($i=0; $i<$n; $i++) {
            if ($coleccionJuegos[$i]["puntosCruz"]>$coleccionJuegos[$i]["puntosCirculo"]) {
                $cantGanadosPorSimbolo= $cantGanadosPorSimbolo+1;
            }
        }
    }elseif ($simbolo=="O" || $simbolo=="o") {
        for ($i=0; $i<$n; $i++) {
            if ($coleccionJuegos[$i]["puntosCirculo"] > $coleccionJuegos[$i]["puntosCruz"]) {
                $cantGanadosPorSimbolo= $cantGanadosPorSimbolo+1;
            }
        }
    }
    return ($cantGanadosPorSimbolo);
}


/**
 * Dado una colección de juegos y un simbolo ingresado retorna el porcentaje de juegos ganados por el mismo
 * @param array $coleccionJuegos
 * @param string $simboloJugador
 * @return float
 */

function porcentajeGanados ($coleccionJuegos, $simboloJugador) {

    $totalJuegos = count($coleccionJuegos);
    $cantGanados = ganadosPorSimbolo($coleccionJuegos, $simboloJugador);
    $porcentajeGanados = ($cantGanados / $totalJuegos) * 100;
    return ($porcentajeGanados);

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
$miColeccionJuegos = cargarJuegos();


//Proceso:



//print_r($juego);
//imprimirResultado($juego);



do {
    $opcionMenu = seleccionarOpcion();
    
    switch ($opcionMenu) { /* La instruccion switch es similar a la estructura alternativa. Evalua una variable o expresión y ejecuta diferentes bloques de código según el valor que tenga  */
        case 1:
            
            $juego = jugar();
            $miColeccionJuegos= agregarJuego ($miColeccionJuegos,$juego);
            print_r ($miColeccionJuegos);

            break;
        case 2:
            
            echo "Elija un número de juego: ";
            $nroJuego=trim(fgets(STDIN));
            datosDelJuego($miColeccionJuegos,$nroJuego);

            break;
        case 3: 
            
            $elJugador = solicitarJugador();
            mostrarPrimerJuegoGanado ($miColeccionJuegos, $elJugador);

            break;
        case 4:
        
            $simboloElegido = solicitarSimbolo();
            $porcentajeGanadosPorSimbolo = porcentajeGanados($miColeccionJuegos, $simboloElegido);
            echo "El simbolo " . $simboloElegido . " gano el " . $porcentajeGanadosPorSimbolo . "% de los juegos ganados\n";

            break;
        case 5:
            
            $nombre= solicitarJugador();
            $resumenPorJugador= obtenerResumenJugador($miColeccionJuegos,$nombre);
            mostrarResumenJugador($resumenPorJugador,$nombre);

            break;
        case 6:
            
            mostrarJuegosOrdenados($miColeccionJuegos);

            break;
    }
} while ($opcionMenu != 7);
