<?php
  function loader($class) {
    require_once('class/' . $class . '.php');
  }

  spl_autoload_register('loader');
?>