<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Resler, Leandro. FAI-4275. TUDW. leandro.resler@est.fi.uncoma.edu.ar. usuario github: leoresler. */
/* Ramirez,Gloria Daniela. FAI-4280. TUDW.  gloria.ramirez@est.fi.uncoma.edu.ar. usuario github: GloriaRamirez. */



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/


/**
* Colección de datos de juegos anteriores
*@return $array
*/
function cargarJuegos () {
    //array $coleccionJuegos 
    $juego1 = ["jugadorCruz" => "MAJO", "jugadorCirculo" => "PEPE", "puntosCruz" => 5, "puntosCirculo" => 0];

    $juego2 = ["jugadorCruz" => "JUAN", "jugadorCirculo" => "MAJO", "puntosCruz" => 1, "puntosCirculo" => 1];

    $juego3 = ["jugadorCruz" => "ANA", "jugadorCirculo" => "LISA", "puntosCruz" => 1, "puntosCirculo" => 1];

    $juego4 = ["jugadorCruz" => "LISA", "jugadorCirculo" => "JUAN", "puntosCruz" => 6, "puntosCirculo" => 0];

    $juego5 = ["jugadorCruz" => "MAJO", "jugadorCirculo" => "LISA", "puntosCruz" => 1, "puntosCirculo" => 1];

    $juego6 = ["jugadorCruz" => "ANA", "jugadorCirculo" => "LUIS", "puntosCruz" => 5, "puntosCirculo" => 0];

    $juego7 = ["jugadorCruz" => "LUIS", "jugadorCirculo" => "JUAN", "puntosCruz" => 0, "puntosCirculo" => 6];

    $juego8 = ["jugadorCruz" => "ANA", "jugadorCirculo" => "JUAN", "puntosCruz" => 1, "puntosCirculo" => 1];

    $juego9 = ["jugadorCruz" => "ANA", "jugadorCirculo" => "JUAN", "puntosCruz" => 5, "puntosCirculo" => 0];

    $juego10 = ["jugadorCruz" => "PEPE", "jugadorCirculo" => "JUAN", "puntosCruz" => 0, "puntosCirculo" => 5];
    
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
 * Muestra el menú, solicita un número de opción y lo retorna
 * @return $int
 */
function seleccionarOpcion () {
    //int $opcion
    echo "\nMENU DE OPCIONES: \n 
          1)Jugar al tateti
          2)Mostrar un juego 
          3)Mostrar el primer juego ganador 
          4)Mostrar porcentaje de juegos ganados 
          5)Mostrar resumen de jugador 
          6)Mostrar listado de juegos ordenado por jugador 
          7)Salir\n";
echo "\nSeleccione una opción: ";
$opcion= solicitarNumeroEntre (1,7);        
return ($opcion);    
}

/**
 * Agrega datos de una nueva partida a la coleccion de juegos
 * @param array $coleccionJuegos
 * @param array $juego
 * @return array
 */
function agregarJuego ($coleccionJuegos, $juego) {
    //int $n
    $n=count($coleccionJuegos);   //Obtengo cuantos juegos tiene guardados el arreglo $coleccionJuegos
    $juego["jugadorCruz"]= strtoupper($juego["jugadorCruz"]);       //Con función strtolower paso nombre de jugador a minusculas
    $juego["jugadorCirculo"]=strtoupper($juego["jugadorCirculo"]);
    $coleccionJuegos[$n]=$juego;  //Agrego datos de un juego nuevo a la siguente posicion libre del arreglo  
    return ($coleccionJuegos); 
}

/**
 * Muestra los datos de un juego elegido por el usuario
 * @param array $coleccionJuegos
 */
function datosDelJuego ($coleccionJuegos) {
    //array $juegoAbuscar
    //string $jugadorX, $jugadorO
    //int $puntosX, $puntosO, $cantJuegos, $nro

    $cantJuegos= count ($coleccionJuegos);
    echo "Elija un número de juego: ";
    $nro= solicitarNumeroEntre(1,$cantJuegos);
   
    $juegoAbuscar= $coleccionJuegos[$nro-1];               //Me quedo sólo con el juego solicitado 
    $jugadorX= $juegoAbuscar["jugadorCruz"];    // Utilizo función strtoupper para guardar nombre de jugador en mayúscula
    $jugadorO= $juegoAbuscar["jugadorCirculo"];
    $puntosX=$juegoAbuscar["puntosCruz"];                  //Asigno a variable los puntos del jugador
    $puntosO=$juegoAbuscar["puntosCirculo"];
    if ($puntosX == $puntosO) {
        echo "\n***********************************\n";
        echo   "Juego TATETI: ".$nro." (empate)\n";
        echo   "Jugador X: ".$jugadorX." obtuvo ".$puntosX." puntos\n";
        echo   "Jugador O: ".$jugadorO." obtuvo ".$puntosO. " puntos\n";
        echo   "*********************************\n";
    }elseif ($puntosX > $puntosO) {
        echo   "***********************************\n";
        echo   "Juego TATETI: ".$nro." (ganó X)\n";
        echo   "Jugador X: ".$jugadorX." obtuvo ".$puntosX." puntos\n";
        echo   "Jugador O: ".$jugadorO." obtuvo ".$puntosO. " puntos\n";
        echo   "***********************************\n";
    }else {
        echo   "***********************************\n";
        echo   "Juego TATETI: ".$nro." (ganó O)\n";
        echo   "Jugador X: ".$jugadorX." obtuvo ".$puntosX." puntos\n";
        echo   "Jugador O: ".$jugadorO." obtuvo ".$puntosO. " puntos\n"; 
        echo   "************************************\n";

    }
}

/**
 * A partir de una coleccion de juegos y el jugador retorna el indice del primer juego ganado por él, si no ganó muestra -1
 * @param array $coleccionJuegos
 * @param string $jugador
 * @return int
 */
function primerJuegoGanado ($coleccionJuegos, $jugador){
    //int $n, $i, $primerVictoria, 
    $n=count($coleccionJuegos);
    $i=0;
    $primerVictoria=-1;
    while ($i<$n &&               //Con recorrido parcial busco que el jugador no haya ganado, se detiene donde no pase lo buscado
          !($coleccionJuegos[$i]["jugadorCruz"]==$jugador && $coleccionJuegos[$i]["puntosCruz"] > $coleccionJuegos[$i]["puntosCirculo"])//Tambien podria ser $coleccionJuegos[$i]["puntosCruz"]>1

          && !($coleccionJuegos[$i]["jugadorCirculo"]==$jugador && $coleccionJuegos[$i]["puntosCirculo"]>$coleccionJuegos[$i]["puntosCruz"])) //Tambien podria ser $coleccionJuegos[$i]["puntosCirculo]>1
         {
          $i++;
        }
    
    if ($i<$n){                    //Si ganó asigno el índice de ese juego a $primerVictoria
        $primerVictoria=$i;
    }
    return ($primerVictoria);
}

/**
 * Muestra el primer juego ganado por un jugador
 * @param array $coleccionJuegos 
 */
function mostrarPrimerJuegoGanado ($coleccionJuegos) {
    //string $jugador, $jugadorX, $jugadorO
    //int $laPrimerVictoria, $puntosX, $puntosO
    //array $primerJuegoGanado

    echo "Nombre del jugador: ";
    $jugador= strtoupper(trim(fgets(STDIN)));                             //Asigno a $jugador el nombre en minúsculas
    $primerVictoria= primerJuegoGanado($coleccionJuegos, $jugador);    //Obtengo el indice del juego ganado del jugador, si ganó
    if ($primerVictoria >= 0) {

        $primerJuegoGanado= $coleccionJuegos [$primerVictoria];        //Me quedo sólo con el juego en que ganó
        $jugadorX= $primerJuegoGanado["jugadorCruz"];
        $jugadorO= $primerJuegoGanado["jugadorCirculo"];
        $puntosX= $primerJuegoGanado["puntosCruz"];
        $puntosO= $primerJuegoGanado["puntosCirculo"];

        if ($puntosX > $puntosO) {
            echo "\n***********************************\n";
            echo   "Juego TATETI: ".($primerVictoria+1)." (ganó X)\n";
            echo   "Jugador X: ".$jugadorX. " obtuvo ".$puntosX." puntos\n";
            echo   "Jugador O: ".$jugadorO. " obtuvo ".$puntosO." puntos\n";
            echo   "***********************************\n" ;
        } elseif ($puntosO > $puntosX) {
            echo "\n***********************************\n";
            echo   "Juego TATETI: ".($primerVictoria+1)." (ganó O)\n";
            echo   "Jugador X: ".$jugadorX. " obtuvo ".$puntosX." puntos\n";
            echo   "Jugador O: ".$jugadorO. " obtuvo ".$puntosO." puntos\n";
            echo   "***********************************\n" ;                
        }
    }else {
            echo "\nEl jugador ". $jugador." no ganó ningún juego\n";
        }
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
 * @return string
 */
function solicitarSimbolo() {
    //string $simbolo
    $simbolo = leerLinea("Ingrese un símbolo (X u O): ");
    
    while ($simbolo !== "X" && $simbolo !== "O") {
        echo "Símbolo inválido. Intente nuevamente." . "\n";
        $simbolo = leerLinea("Ingrese un símbolo (X u O): ");
    }
    
    return $simbolo;
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
 * Dado una colección de juegos y un simbolo ingresado retorna el porcentaje de juegos ganados por el mismo
 * @param array $coleccionJuegos
 * @param string $simboloJugador
 * @return float
 */

 function porcentajeGanados ($coleccionJuegos, $simboloJugador) {

    $totalJuegos = contarJuegosGanados($coleccionJuegos);;
    $cantGanados = ganadosPorSimbolo($coleccionJuegos, $simboloJugador);
    $porcentajeGanados = ($cantGanados / $totalJuegos) * 100;
    return ($porcentajeGanados);

}

/**
 * Retorna el resumen de un jugador en especifico
 *@param array $coleccionJuegos
 *@param string $nombreJugador
 *@return array 
 */

 function obtenerResumenJugador($coleccionJuegos, $nombreJugador) {
    $resumen = [

        "nombreJugador" => $nombreJugador,
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
    echo "Perdió: " . $resumenJugador["juegosPerdidos"] . " juegos" . "\n";
    echo "Empató: " . $resumenJugador["juegosEmpatados"] . " juegos" . "\n";
    echo "Total de puntos acumulados: " . $resumenJugador["puntosAcumulados"] . " puntos" . "\n";
    echo "**********************\n";

}


/**
 * Funcion de comparacion para uasort
 * @param string $juego1
 * @param string $juego2
 * @return int
 */

function comparador ($juego1, $juego2) {
    // int $orden

    if ($juego1 > $juego2) {
        $orden = 1;
    } elseif ($juego1 < $juego2) {
        $orden = -1;
    } else {
        $orden = 0;
    }
    return ($orden);
}


/**
 * Muestra los juegos ordenados por el nombre del jugador O
 * @param array $coleccionJuegos
 * @return void
 */

 function mostrarJuegosOrdenados($coleccionJuegos) {
    
    // Ordena la colección de juegos utilizando el comparador
    uasort($coleccionJuegos, 'comparador'); // utiliza el comparador para determinar el orden de los elementos en la colección
    // uasort: Ordena los elementos usando una funcion de comparacion definida por el usuario. Lo utilizamos para mantener el orden que nosotros mismos hicimos en el comparador.
    
    print_r($coleccionJuegos);
}



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
//int $opcionMenu
//float $porcentajeGanadosPorSimbolo
//string $nombre, $simboloElegido
//array $miColeccionJuegos, $juego, $resumenPorJugador



//Inicialización de variables:
$miColeccionJuegos = cargarJuegos();


//Proceso:



//print_r($juego);
//imprimirResultado($juego);



do {
    $opcionMenu = seleccionarOpcion();
    
    switch ($opcionMenu) { /* La instruccion switch es similar a la estructura alternativa. Evalua una variable o expresión y ejecuta diferentes bloques de código según el valor que tenga  */
        case 1:
            //Inicia una partida nueva del juego 
            
            $juego = jugar();
            $miColeccionJuegos= agregarJuego($miColeccionJuegos,$juego);

            break;
        case 2:
            //Muestra datos de un juego elegido
            
            datosDelJuego($miColeccionJuegos);

            break;
        case 3: 
            //Muestra el primer juego ganado de un jugador

            mostrarPrimerJuegoGanado($miColeccionJuegos);

            break;
        case 4:
            //Muestra el porcentaje de juegos ganados por el simbolo de total de juegos ganados 
        
            $simboloElegido = solicitarSimbolo();
            $porcentajeGanadosPorSimbolo = porcentajeGanados($miColeccionJuegos, $simboloElegido);
            echo "El simbolo " . $simboloElegido . " gano el " . round($porcentajeGanadosPorSimbolo,2) . "% de los juegos ganados\n";

            break;
        case 5:
            //Muestra un resumen de los juegos en los que participó un usuario

            echo "Nombre del jugador: ";
            $nombre=strtoupper(trim(fgets(STDIN)));
            $resumenPorJugador= obtenerResumenJugador($miColeccionJuegos,$nombre);
            mostrarResumenJugador($resumenPorJugador,$nombre);

            break;
        case 6:
            //Muestra en orden alfabético los juegos del símbolo O
            
            mostrarJuegosOrdenados($miColeccionJuegos);

            break;
    }
} while ($opcionMenu != 7);
