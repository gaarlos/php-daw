<?php
  class Book{
    public $title;
    public $author;

    public function __construct ($title, $author) {
      $this->title = $title;
      $this->author = $author;
    }

    public function __toString () {
      
    }

    public function getPrintableTitle() {
      $result="<i>.$this->title</i>";
      
      return $result;
  }
?>