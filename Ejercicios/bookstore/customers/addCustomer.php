<?php
function addCustomer ($customer) {
  require('../bbdd/connection.php');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
  // customer: firstname - surname - email - tipo

  $table = 'customer';
  $query = "INSERT INTO $table (firstname, surname, email, tipo) 
            VALUES (:firstname, :surname, :email, :tipo);";

  try {
    $statement = $db->prepare($query);

    $statement->bindValue(':firstname',$customer[0]);
    $statement->bindValue(':surname',$customer[1]);
    $statement->bindValue(':email',$customer[2]);
    $statement->bindValue(':tipo', $customer[3]);

    $db->beginTransaction();
    $statement->execute();
    $db->commit();

    echo "El usuario '" . $customer[0] . " " . $customer[1] ."' se ha añadido con éxito<br>
    <a href='../index.php' class='back'>Volver</a>";
  } catch (PDOException $e) {
    print "No se ha podido añadir el usuario<br>Error: " . $e->getMessage()."<br>
    <a href='../index.php' class='back'>Volver</a>";
    die();
  }
}
?>