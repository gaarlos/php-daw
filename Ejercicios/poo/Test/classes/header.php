<?php
  class Header {
    private $ex;
    private $title;

    public function __construct($ex, $title) {
      $this->ex = $ex;
      $this->title = $title;
    }

    public function __toString() {
      $string = "
      <head>
        <meta charset='UTF-8'>
        <style>
          /* COLORS
            primary: {
              main: #039be5
              light: #63ccff
              dark: #006db3
              text: #000000
            }
            
            secundary: {
              main: #4caf50
              light: #80e27e
              dark: #087f23
              text: #ffffff
            }
          */

          *, ::after, ::before {
            box-sizing: border-box;
            cursor: default;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
          }
          
          ::-webkit-scrollbar {
            display: none;
          }

          .d-flex {
            display: flex;
          }

          body, h3 {
            margin: 0!important;
          }

          h3 {
            cursor: pointer;
          }

          header {
            width: 100%;
            padding: 1rem;
            background-color: #039be5;
            border-top: 1rem solid #006db3;
          }

          .head-hr {
            color: #006db3;
          }

          .ex, .title {
            padding: 0 3rem;
          }
        </style>
      </head>
      <header>
        <div class='d-flex'>
          <div class='ex'><h3>Ejercicio $this->ex</h3></div>
          <div class='title'><h3>$this->title</h3></div>
        </div>
      </header>
      ";

      return $string;
    }
  }
?>