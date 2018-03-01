<?php
  require_once('../xml/xmlLoader.php');

  function modifyFrom ($compare, $newData, $table) {
    require('../bbdd/connection.php');    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if($table == 'book') {
      $query = "UPDATE ". $table ." SET title = :field0, author = :field1, stock = :field2, price = :field3
      WHERE isbn = :compare;";
    } else {
      $query = "UPDATE ". $table ." SET firstname = :field0, surname = :field1, email = :field2, tipo = :field3
      WHERE email = :compare;";
    }

    try {
      addToXML($compare, $newData, $table);

      $statement = $db->prepare($query);

      $statement->bindValue(':field0',$newData[0]);
      $statement->bindValue(':field1',$newData[1]);
      $statement->bindValue(':field2',$newData[2]);
      $statement->bindValue(':field3', $newData[3]);
      $statement->bindValue(':compare', $compare);
      $statement->execute();

      echo "'" . $newData[0] . "' se ha actualizado con éxito<br>
      <a href='../index.php' class='back'>Volver</a>";
    } catch (PDOException $e) {
      print "No se ha podido actualizar<br>Error: "
      . $e->getMessage().
      "<br><a href='../index.php' class='back'>Volver</a>";
      die();
    }
  }

  function deleteFrom ($compare, $table) {
    require('../bbdd/connection.php');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // ON DELETE CASCADE
    
    if($table == 'book') {
      $query = "DELETE FROM ". $table ." WHERE isbn = :compare;";
    } else {
      $query = "DELETE FROM ". $table ." WHERE email = :compare;";      
    }

    try {
      $statement = $db->prepare($query);

      $statement->bindValue(':compare',$compare);
      $statement->execute();

      echo "Fila eliminada con éxito<br>
      <a href='../index.php' class='back'>Volver</a>";
    } catch (PDOException $e) {
      print "No se ha podido eliminar la fila<br>Error: "
      . $e->getMessage().
      "<br><a href='../index.php' class='back'>Volver</a>";
      die();
    }
  }
?>