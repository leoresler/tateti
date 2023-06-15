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
 * Agrega datos de una nuevo juego a la coleccion de juegos
 * @param array $coleccionJuegos
 * @param array $juego
 * @return array
 */
function agregarJuego ($coleccionJuegos, $juego) {
    $n=count($coleccionJuegos);
    $coleccionJuegos[$n+1]=$juego;   
return ($coleccionJuegos); 
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
 * Dados una colección de juegos y un simbolo ingresado retorna la cantidad de juegos ganados por éste
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

/**
 * Iniciliza una estructura de datos TABLERO para jugar al tateti
 * @return array
 */
function iniciarTablero()
{
    //array $tableroTateti
    $tableroTateti =
        [  //col0  //col1 //col2
            [LIBRE, LIBRE, LIBRE], //fila 0
            [LIBRE, LIBRE, LIBRE], //fila 1
            [LIBRE, LIBRE, LIBRE]  //fila 2
        ];
    return $tableroTateti;
}

/**
 * Determina si un casillero del tablero está libre
 * @param array $tableroTateti
 * @param int $fila
 * @param int $columna
 * @return boolean
 */
function esCasilleroLibre($tableroTateti, $fila, $columna)
{
    //string $casillero
    $casillero = $tableroTateti[$fila][$columna];
    return $casillero == LIBRE;
}

/**
 * Reemplaza el simbolo de un casillero. 
 * El casillero (fila,columna) ingresado debe ser válido.
 * @param array $tableroTateti
 * @param int $fila
 * @param int $columna
 * @param string $nuevoSimbolo
 * @return array tablero con el casillero cambiado.
 */
function reemplazarSimboloCasillero($tableroTateti, $fila, $columna, $nuevoSimbolo)
{
    $tableroTateti[$fila][$columna] = $nuevoSimbolo;
    return $tableroTateti;
}

/**
 * Retorna una arreglo asociativo ["fila"=>nro de fila, "columna"=>nro de col] que representa el lugar libre.
 * @param array $tableroTateti
 * @return array 
 */
function solicitarCasilleroLibre($tableroTateti)
{
    //int $dimension, $nroFila, $nroColumna, boolean $esLibre, array $casillerolibre
    $dimension = count($tableroTateti);
    do {
        echo "Ingrese el número de FILA: ";
        $nroFila = solicitarNumeroEntre(1, $dimension);
        $nroFila = $nroFila - 1;
        echo "Ingrese el número de COLUMNA: ";
        $nroColumna = solicitarNumeroEntre(1, $dimension);
        $nroColumna = $nroColumna - 1;
        $esLibre = esCasilleroLibre($tableroTateti, $nroFila, $nroColumna);
        if (!$esLibre) {
            echo "El casillero ingresado se encuentra ocupado! Ingrese un casillero libre.\n";
        }
    } while (!$esLibre);
    $casillerolibre = ["fila" => $nroFila, "columna" => $nroColumna];
    return $casillerolibre;
}

/**
 * Retorna el número de fila que ganó el simbolo enviado por parámetro. 
 * Si el símbolo no ganó, retorna -1
 * @param array $tableroTateti
 * @param string $simbolo Debe ser distinto de LIBRE
 * @return int nro de fila ganadora. -1 si el simbolo no ganó por fila.
 */
function obtenerFilaGanadora($tableroTateti, $simbolo)
{
    //int $fila, $columna, $dimension, $filaGanadora, boolean $existeGanador
    $fila = 0;
    $dimension = count($tableroTateti);
    $existeGanador = false;
    $filaGanadora = -1;
    while ($fila < $dimension && !$existeGanador) {
        $columna = 0;
        while ($columna < $dimension && $tableroTateti[$fila][$columna] == $simbolo) {
            $columna++;
        }
        if ($columna == $dimension) {
            $existeGanador = true;
            $filaGanadora = $fila;
        } else {
            $fila++;
        }
    }
    return $filaGanadora;
}

/**
 * Retorna el número de columna que ganó el simbolo enviado por parámetro.
 * Si el símbolo no ganó, retorna -1
 * @param array $tableroTateti
 * @param string $simbolo Debe ser distinto de LIBRE
 * @return int nro de columna ganadora. -1 si el simbolo no ganó por columna.
 */
function obtenerColumnaGanadora($tableroTateti, $simbolo)
{
    //int $columna, $fila, $dimension, $columnaGanadora, boolean $existeGanador
    $columna = 0;
    $dimension = count($tableroTateti);
    $existeGanador = false;
    $columnaGanadora = -1;
    while ($columna < $dimension && !$existeGanador) {
        $fila = 0;
        while ($fila < $dimension && $tableroTateti[$fila][$columna] == $simbolo) {
            $fila++;
        }
        if ($fila == $dimension) {
            $existeGanador = true;
            $columnaGanadora = $columna;
        } else {
            $columna++;
        }
    }
    return $columnaGanadora;
}

/**
 * Determina si el simbolo enviado por parámetro ganó la primer diagonal. False caso contrario
 * @param array $tableroTateti
 * @param string $simbolo Debe ser distinto de LIBRE
 * @return boolean 
 */
function esPrimerDiagonalGanadora($tableroTateti, $simbolo)
{
    //int $fila, $dimension, boolean $ganadora
    $fila = 0;
    $dimension = count($tableroTateti);
    $ganadora = true;
    while ($fila < $dimension && $ganadora) {
        $ganadora = $tableroTateti[$fila][$fila] == $simbolo;
        $fila++;
    }
    return $ganadora;
}

/**
 * Determina si el simbolo enviado por parámetro ganó la segunda diagonal. False caso contrario
 * @param array $tableroTateti
 * @param string $simbolo Debe ser distinto de LIBRE
 * @return boolean 
 */
function esSegundaDiagonalGanadora($tableroTateti, $simbolo)
{
    //int $fila, $columna, $dimension, boolean $ganadora
    $dimension = count($tableroTateti);
    $fila = 0;
    $columna = $dimension - 1;
    $ganadora = true;
    while ($fila < $dimension && $ganadora) {
        $ganadora = $tableroTateti[$fila][$columna] == $simbolo;
        $fila++;
        $columna--;
    }
    return $ganadora;
}

/**
 * Determina si un símbolo determinado ganó. Retona true si ganó, false caso contrario
 * @param array $tableroTateti
 * @param string $simbolo Debe que ser distinto de LIBRE
 * @return boolean
 */
function determinarSiGano($tableroTateti, $simbolo)
{
    //boolean $gano, int $filaGanadora, $columnaGanadora

    //determino si ganó una fila:
    $filaGanadora = obtenerFilaGanadora($tableroTateti, $simbolo);
    $gano = $filaGanadora >= 0;
    if (!$gano) {
        //como no ganó una fila, determino si ganó una columna:
        $columnaGanadora = obtenerColumnaGanadora($tableroTateti, $simbolo);
        $gano = $columnaGanadora >= 0;
        if (!$gano) {
            //como no ganó ni fila, ni columna, determino si ganó la 1er diagonal:
            $gano = esPrimerDiagonalGanadora($tableroTateti, $simbolo);
            if (!$gano) {
                //como no ganó ni fila, ni columna, ni 1er diagonal, determino si ganó la 2da diagonal:
                $gano = esSegundaDiagonalGanadora($tableroTateti, $simbolo);
            }
        }
    }
    return $gano;
}

/**
 * Cuenta la cantidad de casilleros que contienen al simbolo ingresado por parámetro
 * @param array $tableroTateti
 * @param string $simbolo
 * @return int
 */
function contarSimbolo($tableroTateti, $simboloAContar)
{
    //int $cantidad, array $arregloFila, string $simbolo 
    $cantidad = 0;
    foreach ($tableroTateti as $arregloFila) {
        foreach ($arregloFila as $simbolo) {
            if ($simbolo == $simboloAContar) {
                $cantidad++;
            }
        }
    }
    return $cantidad;
}

/**
 * Cuenta la cantidad de casilleros libres en el tablero
 * @param array $tableroTateti
 * @return int
 */
function contarCantLibres($tableroTateti)
{
    //int cantidadLibres
    $cantidadLibres = contarSimbolo($tableroTateti, LIBRE);
    return $cantidadLibres;
}

/**
 * Determina si el tablero se completó de simbolos, es decir, no hay más espacios libres.
 * @param array $tableroTateti
 * @return boolean
 */
function estaCompleto($tableroTateti)
{
    //boolean $completo, int $fila, $dimension, $columna
    $completo = true;
    $fila = 0;
    $dimension = count($tableroTateti);
    while ($fila < $dimension && $completo) {
        $columna = 0;
        while ($columna < $dimension && $completo) {
            $completo = !esCasilleroLibre($tableroTateti, $fila, $columna);
            $columna++;
        }
        $fila++;
    }
    return $completo;
}

/**
 * Imprime en pantalla el tabler del tateti
 *  @param array $tablero
 */
function imprimirTableroTateti($tablero)
{
    //string $linea, $separador
    //int $cantFilas,$fila,$cantColumnas,$columna
    $linea     = "       - - - - - -\n";
    $separador = ' | ';

    echo "         COLUMNA \n";
    echo "        1   2   3 \n";
    echo "FILA   - - - - - -\n";

    //echo $linea; //inicio dibujo tablero
    $cantFilas = count($tablero);
    for ($fila = 0; $fila < $cantFilas; $fila++) {
        echo '  ' . ($fila + 1) . '  ';
        echo $separador; //inicio dibujo fila
        $cantColumnas = count($tablero[$fila]);
        for ($columna = 0; $columna < $cantColumnas; $columna++) {
            imprimirSimbolo($tablero[$fila][$columna]);
            echo $separador;
        }
        echo "\n";
        echo $linea; //cierro fila        
    }
}

/**
 * Permitr completar un casillero libre a un jugador determinado.
 * @param array $tableroTateti
 * @param string $nombreJugador
 * @param string $simbolo
 * @return array tablero modificado
 */
function jugarTurno($tableroTateti, $nombreJugador, $simbolo)
{
    //array $casilleroElegido
    echo "Es el turno de " . $nombreJugador . "\n";
    $casilleroElegido = solicitarCasilleroLibre($tableroTateti);
    $tableroTateti = reemplazarSimboloCasillero($tableroTateti, $casilleroElegido["fila"], $casilleroElegido["columna"], $simbolo);
    imprimirTableroTateti($tableroTateti);
    return $tableroTateti;
}

/**
 * Inicia y finaliza un juego de tateti
 * @return array Juego tateti finalizado
 */
function jugar()
{
    $tablero = iniciarTablero();
    $dimensionTablero = count($tablero);
    $cantMinimaCasillerosLlenosParaGanar = $dimensionTablero + ($dimensionTablero - 1);
    $cantCasilleroCompletos = 0;
    $esGanadorCruz = false;
    $esGanadorCirculo = false;
    $tableroCompleto = false;

    echo "Ingrese el nombre del jugador " . CRUZ . " que inicia el juego de tateti: ";
    $nombreJugadorCruz = strtoupper(trim(fgets(STDIN)));
    echo "Ingrese el nombre del jugador " . CIRCULO . " que juega en segundo lugar: ";
    $nombreJugadorCirculo = strtoupper(trim(fgets(STDIN)));

    //Imprimir el tablero inicial:
    imprimirTableroTateti($tablero);

    $tablero = jugarTurno($tablero, $nombreJugadorCruz, CRUZ);
    $cantCasilleroCompletos = 1;
    do {
        $tablero = jugarTurno($tablero, $nombreJugadorCirculo, CIRCULO);
        $tablero = jugarTurno($tablero, $nombreJugadorCruz, CRUZ);
        $cantCasilleroCompletos = $cantCasilleroCompletos + 2;
    } while ($cantCasilleroCompletos < $cantMinimaCasillerosLlenosParaGanar);

    //CRUZ tiene una jugada más que CIRCULO, determinar si es ganador:
    $esGanadorCruz = determinarSiGano($tablero, CRUZ);

    while (!$tableroCompleto && !$esGanadorCruz && !$esGanadorCirculo) {

        if (!$tableroCompleto && !$esGanadorCruz) {
            $tablero = jugarTurno($tablero, $nombreJugadorCirculo, CIRCULO);
            $esGanadorCirculo = determinarSiGano($tablero, CIRCULO);
            $tableroCompleto = estaCompleto($tablero);
        }

        if (!$tableroCompleto && !$esGanadorCirculo) {
            $tablero = jugarTurno($tablero, $nombreJugadorCruz, CRUZ);
            $esGanadorCruz = determinarSiGano($tablero, CRUZ);
            $tableroCompleto = estaCompleto($tablero);
        }
    }

    //Determinar puntajes:
    $puntosCruz = PTOS_PERDEDOR;
    $puntosCirculo = PTOS_PERDEDOR;
    if ($esGanadorCruz) {
        $puntosCruz = PTOS_GANADOR + contarCantLibres($tablero);
    } else {
        if ($esGanadorCirculo) {
            $puntosCirculo = PTOS_GANADOR + contarCantLibres($tablero);
        } else {
            $puntosCirculo = PTOS_EMPATE;
            $puntosCruz = PTOS_EMPATE;
        }
    }
    
    //armar estructura del juego
    $juego = [
        "jugadorCruz" => $nombreJugadorCruz,
        "jugadorCirculo" => $nombreJugadorCirculo,
        "puntosCruz" => $puntosCruz,
        "puntosCirculo" => $puntosCirculo
    ];

    return $juego;
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
