<?php
  class Header {
    private $ex;
    private $title;
    
    public function __construct($ex, $title) {
      $this->ex = $ex;
      $this->title = $title;
    }
    
    public function __toString() {
      require_once('styles.php');
      $string = "
      <head>
        <meta charset='UTF-8'>
          <style>
            $styles
          </style>
        </head>
      <header>
        <div class='d-flex'>
          <div class='ex'><h3><a href='$route'>Ejercicio $this->ex (Home)</h3></a></div>
          <div class='title'><h3>$this->title</h3></div>
        </div>
      </header>
      ";
      
      return $string;
    }
  }
?>