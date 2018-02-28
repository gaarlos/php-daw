<?php
  class Circle extends Figura {
    protected $image;

    public function __construct ($name, $color, $radio) {
      parent::__construct ($name, $color, $radio);
    }

    public function createCircle () {
      $size = $this->sideA * 2;
      $image = parent::imageGenerator($this->sideA * 2, $this->sideA *2);
      $this->image = $image;
      parent::colorFill();
      $this->color = parent::getRGBColor();
      $color = parent::colorAllocate();

      imagefilledellipse($this->image, $this->sideA, $this->sideA, $size, $size, $color);

      ob_start();
      parent::showImg();
      return ob_get_clean();
    }
  }
?>