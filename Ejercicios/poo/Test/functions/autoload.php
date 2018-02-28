<?php
  function loader($class) {
    include 'classes/' . $class . '.php';
  }

  spl_autoload_register('loader');
?>