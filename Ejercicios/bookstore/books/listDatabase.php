<?php
  listDatabase($_GET['q']);

  function listDatabase ($table) {
    $table == 'book' ? listBooks() : listCustomers();
  }

  function listBooks () {
    require('../bbdd/connection.php');
    $query = "SELECT * FROM book;";
  
    $statement = $db->prepare($query);
    $statement->execute();
  
    $rows = $statement->fetchAll();
  
    echo "<table style='width: 100%;'>
        <tr>
          <th>ISBN</th>
          <th>Title</th>
          <th>Author</th>
          <th>Stock</th>       
          <th>Price (€)</th>        
        </tr>";
  
    printRows($rows);

    echo "</table>";
  }

  function listCustomers () {
    require('../bbdd/connection.php');
    $query = "SELECT * FROM customer;";
  
    $statement = $db->prepare($query);
    $statement->execute();
  
    $rows = $statement->fetchAll();
  
    echo "<table style='width: 100%;'>
        <tr>
          <th>Firstname</th>
          <th>Surname</th>
          <th>E-mail</th>
          <th>Type</th>       
        </tr>";
    
    printRows($rows);

    echo "</table>";
  }

  function printRows ($rows) {
    foreach($rows as $row) {
      echo "<tr>";
      array_shift($row);
  
      foreach($row as $field) {
        echo "<td>$field</td>";    
      }
    
      echo "</tr>";      
    }
  }
?>