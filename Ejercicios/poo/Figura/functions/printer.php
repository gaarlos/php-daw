<?php
  require_once('functions/autoload.php');

  function printRectangle ($sideA, $sideB, $color) {
    $square = new Square('Square', $color, $sideA, $sideB);
    return $square->createSquare();
  }

  function printCircle ($radio, $color) {
    $circle = new Circle('Circulo', $color, $radio);
    return $circle->createCircle();
  }
?>