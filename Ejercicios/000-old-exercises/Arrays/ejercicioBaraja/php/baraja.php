<?php
    $palo = array("oro", "copa", "basto", "espada");
    $valor = range(1, 12);
    $baraja = array();
    $numCartas = $_REQUEST['numCartas'];

    //  LLENAR LA BARAJA
    for($i = 0; $i < count($palo); $i++) {
        for($j = 0; $j < count($valor); $j++) {
            array_push($baraja, '<img src="../images/cartas/'.$palo[$i].'/'.$valor[$j].'.jpg">');
        }   
    }

    //  ELEGIR EL NÚMERO DE CARTAS A SACAR
    if (isset($_REQUEST['verBaraja'])) {
        seleccionarCartas(48, $baraja);
    }
    elseif(isset($_REQUEST['numCartas'])) {
        barajarCartas($baraja);
        seleccionarCartas($numCartas, $baraja);
    }

    //  BARAJAR
    function barajarCartas(&$baraja) {
        shuffle($baraja);
    }
    
    //  SACAR CARTAS SELECCIONADAS
    function seleccionarCartas($numCartas, $baraja) {    
        for($i = 0; $i < $numCartas; $i++) {
            echo($baraja[$i]);
        }
    }
?>