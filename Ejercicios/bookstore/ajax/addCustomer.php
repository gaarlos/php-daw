<?php
  require_once('../xml/xmlLoader.php');
  decodeArray($_GET['q']);
    
  function decodeArray ($str) { addCustomer(explode('=', $str)); }

  function addCustomer ($customer) {
    require('../bbdd/connection.php');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    // customer: firstname - surname - email - tipo

    $query = "INSERT INTO customer (firstname, surname, email, tipo) 
              VALUES (:firstname, :surname, :email, :tipo);";

    try {
      $statement = $db->prepare($query);

      $statement->bindValue(':firstname', $customer[0]);
      $statement->bindValue(':surname', $customer[1]);
      $statement->bindValue(':email', $customer[2]);
      $statement->bindValue(':tipo', $customer[3]);

      $statement->execute();
      addToXML($customer[2], $customer, 'customer');      

      echo "El usuario '" . $customer[0] . " " . $customer[1] ."' se ha añadido con éxito<br>";
    } catch (PDOException $e) {
      print "No se ha podido añadir el usuario<br>Error: " . $e->getMessage()."<br>";
      die();
    }
  }
?>