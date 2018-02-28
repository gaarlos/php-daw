<?php
  function createTables () {
    $sql = "CREATE TABLE book (
      id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      isbn varchar(13),
      title varchar(255),
      author varchar(255),
      stock smallint(5),
      price float
    );";

    create_result($sql, 'book');

    $sql = "CREATE TABLE customer (
      id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      firstname varchar(255),
      surname varchar(255),
      email varchar(255),
      tipo enum('basic', 'premium')
    );";
    
    create_result($sql, 'customer');

    $sql = "CREATE TABLE borrowed_book (
      customer_id int(10),
      book_id int(10),
      start_dt datetime,
      end_dt datetime,
      PRIMARY KEY (customer_id, book_id),
      FOREIGN KEY (book_id) REFERENCES book(id),
      FOREIGN KEY (customer_id) REFERENCES customer(id)
    );";

    create_result($sql, 'borrowed_book');

    $sql = "CREATE TABLE sale (
      id int(10) PRIMARY KEY,
      customer_id int(10),
      date datetime,
      FOREIGN KEY (customer_id) REFERENCES customer(id)
    );";

    create_result($sql, 'sale');

    $sql = "CREATE TABLE sale_book (
      book_id int(10),
      sale_id int(10),
      amount smallint(5),
      PRIMARY KEY (book_id, sale_id),
      FOREIGN KEY (book_id) REFERENCES book(id),
      FOREIGN KEY (sale_id) REFERENCES sale(id)
    );";

    create_result($sql, 'sale_book');
  }

  function create_result ($sql, $name) {
    require('bbdd/connection.php');
    $res = $db->exec($sql);
    
    if($res === 0) {
      echo "La tabla $name se ha creado con éxito<br>";
    } else {
      echo "No se ha podido crear la tabla. ";
      table_exists($db, $name);
    }

    $db = null;
  }

  function table_exists($db, $name) {
    $results = $db->query("SHOW TABLES LIKE '$name'");
    if(!$results) {
      die(print_r($db->errorInfo(), TRUE));
    }
    if($results->rowCount()>0) {
      echo "La tabla $name ya existe<br>";
    }
  }
?>