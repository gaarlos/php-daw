<?php
  require_once('utils/printer.php');
  $color = str_split($_POST['color']);
  $color[0] = hexdec($color[1].$color[2]);
  $color[1] = hexdec($color[3].$color[4]);
  $color[2] = hexdec($color[5].$color[6]);

  if (isset($_POST['sideB'])) {
    $sideA = $_POST['sideA'];
    $sideB = $_POST['sideB'];
    setcookie('figure', 'RECTANGLE');
    printRectangle ($sideA, $sideB, $color);
  } elseif (isset($_POST['sideA'])) {
    $sideA = $_POST['sideA'];
    $sideB = $_POST['sideA'];
    setcookie('figure', 'SQUARE');
    printRectangle ($sideA, $sideB, $color);
  } else {
    $radio = $_POST['radio'];
    setcookie('figure', 'CIRCLE');
    printCircle ($radio, $color);
  }
?>