<?php
  abstract class Figura {
    protected $name;
    protected $color;
    protected $sideA;
    protected $sideB;

    protected function __construct ($name, $color, $sideA, $sideB = 0) {
      $this->name = $name;
      $this->color = $color;
      $this->sideA = $sideA;
      $this->sideB = $sideB;
    }

    protected function imageGenerator ($sideA, $sideB) {
      return imagecreatetruecolor ($sideA, $sideB);
    }

    protected function getRGBColor () {
      $color = str_split($this->color);
      $color[0] = hexdec($color[1].$color[2]);
      $color[1] = hexdec($color[3].$color[4]);
      $color[2] = hexdec($color[5].$color[6]);
      return $color;
    }

    protected function colorFill () {
      $bgColor = imagecolorallocate($this->image, 224, 224, 224);
      return imagefill($this->image, 0, 0, $bgColor);
    }

    protected function colorAllocate () {
      return imagecolorallocate($this->image, $this->color[0], $this->color[1], $this->color[2]);
    }

    protected function showImg () {
      return imagepng($this->image);
    }

    protected function destroyImg () {
       return imagedestroy($this->image);
    }
  }
?>