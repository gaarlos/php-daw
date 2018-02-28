<?php
  function printRectangle ($sideA, $sideB, $color) {
    $image = imagecreatetruecolor($sideA, $sideB);
    $color = imagecolorallocate(
      $image, $color[0], $color[1], $color[2]);
    imagefill($image, 0, 0, $color);
    header('Content-Type: image/png');
    imagepng($image, "img/figure.png");
  }

  function printCircle ($radio, $color) {
    $size = $radio * 2;
    $image = imagecreatetruecolor($size, $size);
    $white = imagecolorallocate($image, 224, 224, 224);
    $color = imagecolorallocate(
      $image, $color[0], $color[1], $color[2]);
    imagefill($image, 0, 0, $white);
    imagefilledellipse($image, $radio, $radio, $size, $size, $color);
    header('Content-Type: image/png');
    imagepng($image, "img/figure.png");
  }
?>