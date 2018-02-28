<?php
  require_once('functions/autoload.php');

  $header = new Header("POO-1", "Un buen header");

  $customers = [];
  array_push($customers, new Customer('123456', 'Jesús', 'Calvo', 'jesusito@gmail.com'));
  array_push($customers, new Customer('645146', 'María', 'Álvarez', 'mmaalvarez@gmail.com'));
  array_push($customers, new Customer('568541', 'Luís', 'Gomez', 'gomel@gmail.com'));

  echo $header;
  foreach ($customers as $customer) {
    echo $customer;
  }
?>
