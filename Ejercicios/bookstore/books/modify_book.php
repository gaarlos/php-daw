<html>
<?php
  require_once('../styles/header.php');
  $header = new Header('Base de datos', 'Modify books');
  echo $header;
?>
<main class="container" style="padding-top: 1rem;">
<?php
  if(isset($_POST['modify_book'])) {
    require('../bbdd/connection.php');
    $isbn = $_POST['isbn'];

    $query = "SELECT * FROM book 
    WHERE (isbn=:isbn);";

    $statement = $db->prepare($query);    
    $statement->bindValue(':isbn',$isbn);
    $statement->execute();

    $rows = $statement->fetchAll();

    if(sizeof($rows) == 0) {
      print "No se ha encontrado ningún resultado<br>
      <a href='../index.php' class='back'>Volver</a>";
    } else {
      $rows = $rows[0];
      
      echo "
        <form action='modify_book.php' method='post' class='second-form'>
          <h4>" . $isbn . ': ' . $rows['title'] . "</h4>
          <input type='hidden' name='isbn' value='$isbn'>
          <div>
            <label for='title'>Title</label>
            <input type='text' name='title' maxlength='255' required value='" . $rows['title'] . "'>
          </div>
          <div>
            <label for='author'>Author</label>
            <input type='text' name='author' maxlength='255' required value='" . $rows['author'] . "'>
          </div>
          <div>
            <label for='stock'>Stock</label>
            <input type='text' name='stock' maxlength='5' pattern='[0-9]{1-5}' required value='" . $rows['stock'] . "'>
          </div>
          <div>
            <label for='price'>Price</label>
            <input type='text' name='price' maxlength='4' pattern='[0-9.,]{1-5}' required value='" . $rows['price'] . "'>
          </div>  
    
          <input type='submit' name='modify' value='MODIFY BOOK'>
          <input type='submit' name='delete' value='DELETE BOOK' class='delete'>
        </form>";
      }
    }
  
  if(isset($_POST['modify'])) {
    require_once('../utils/modifiers.php');
    $newData = [$_POST['title'], $_POST['author'], $_POST['stock'], $_POST['price']];
    modifyFrom($_POST['isbn'], $newData, 'book');
  }

  if(isset($_POST['delete'])) {
    require_once('../utils/modifiers.php');
    deleteFrom($_POST['isbn'], "book");
  }
?>
</main>
</html>