<?php
  decodeArray($_GET['q']);

  function decodeArray ($str) { addBook(explode('=', $str)); }

  function addBook ($book) {
    require('../bbdd/connection.php');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // book: isbn - title - author - stock - price

    $query = "INSERT INTO book (isbn, title, author, stock, price) 
              VALUES (:isbn, :title, :author, :stock, :price);";

    try {
      $statement = $db->prepare($query);

      $statement->bindValue(':isbn', $book[0]);
      $statement->bindValue(':title', $book[1]);
      $statement->bindValue(':author', $book[2]);
      $statement->bindValue(':stock', $book[3]);
      $statement->bindValue(':price', $book[4]);

      $statement->execute();

      echo "El libro '" . $book[1] . "' se ha añadido con éxito<br>";
    } catch (PDOException $e) {
      print "No se ha podido añadir el libro<br>Error: " . $e->getMessage(). "<br>";
      die();
    }
  }
?>