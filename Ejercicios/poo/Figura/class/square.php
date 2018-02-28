<?php
  class Square extends Figura {
    protected $image;
    
    public function __construct ($name, $color, $sideA, $sideB) {
      parent::__construct ($name, $color, $sideA, $sideB);
    }
    
    public function createSquare () {
      $image = parent::imageGenerator($this->sideA * 2, $this->sideB *2);
      $this->image = $image;
      parent::colorFill();
      $this->color = parent::getRGBColor();
      $color = parent::colorAllocate();

      imagefill($this->image, 0, 0, $color);

      ob_start();
      parent::showImg();
      return ob_get_clean();
    }
  }
?>