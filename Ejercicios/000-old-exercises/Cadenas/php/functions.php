<?php
  $pajar = test_input($_REQUEST['text-area']);
  $aguja = test_input($_REQUEST['search']);
  $aguja = "/\b$aguja\b/u";

  function existe($pajar, $aguja) {
    return preg_match($aguja, $pajar) !== 0 ? True : False;
  }

  function posiciones($pajar, $aguja) {
    preg_match_all($aguja, $pajar, $positions, PREG_OFFSET_CAPTURE);
    return $positions;
    }

  function reemplazar($pajar, $aguja) {
    $replace = prompt("Introduce el reemplazo:");
    $replace = "<b><u>$replace</u></b>";
    return preg_replace($aguja, $replace, $pajar);
  }

  if(!isset($_REQUEST['search']) or !isset($_REQUEST['text-area']))
    error();
  elseif(!isset($_REQUEST['search']) and !isset($_REQUEST['text-area']))
    error();
  else {
    if(isset($_REQUEST['exist'])) {
      echo( existe($pajar, $aguja) ? "Existe" : "No existe" );
    } elseif(isset($_REQUEST['positions'])) {
        echo "La palabra se encuentra en las posiciones:<br>";
        foreach(posiciones($pajar, $aguja) as $clave)
          foreach($clave as $posiciones => $posicion)
            echo "$posicion[1] ";
    } else
        echo(reemplazar($pajar, $aguja));
  }

  function prompt($prompt_msg){
    echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");
    $answer = "<script type='text/javascript'> document.write(answer); </script>";
    return($answer);
  }

  function test_input($data) {
    $data = trim(stripslashes(htmlspecialchars($data)));
    return $data;
  }
?>


