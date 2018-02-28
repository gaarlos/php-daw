<?php
  require_once('functions/printer.php');
  $color = $_POST['color'];
  $control = 0;
  $images = array();

  if (isset($_POST['radio'])) {
    $cColor = $color[$control];
    $control++;
    $radio = $_POST['radio'];
    array_push($images, printCircle ($radio, $cColor));
  }

  if (isset($_POST['squareSide'])) {
    $sColor = $color[$control];
    $control++;
    $squareSide = $_POST['squareSide'];
    array_push($images, printRectangle ($squareSide, $squareSide, $sColor));
  }

  if(isset($_POST['rectangleA'])) {
    $rColor = $color[$control];
    $control++;
    $sideA = $_POST['rectangleA'];
    $sideB = $_POST['rectangleB'];
    array_push($images, printRectangle ($sideA, $sideB, $rColor));
  }

  foreach($images as $image) {
    echo "<img style='margin-right: 1rem;' src='data:image/png;base64,". base64_encode($image) ."'>";
  }
?>