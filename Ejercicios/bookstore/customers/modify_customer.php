<html>
<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Ejercicios/BBDD/styles/header.php');
  $header = new Header('Base de datos', 'Modify customers');
  echo $header;
?>
<main class="container" style="padding-top: 1rem;">
<?php
  if(isset($_POST['modify_customer'])) {
    require('../bbdd/connection.php');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $email = $_POST['email'];

    $query = "SELECT * FROM customer 
    WHERE (email=:email);";

    $statement = $db->prepare($query);    
    $statement->bindValue(':email',$email);
    try {
      $statement->execute();
    } catch (PDOException $e) {
      print "No se ha encontrado ningún resultado<br>Error: "
      . $e->getMessage().
      "<br><a href='index.php' class='back'>Volver</a>";
      die();
    }

    $rows = $statement->fetchAll();

    if(sizeof($rows) == 0) {
      print "No se ha encontrado ningún resultado<br>
      <a href='index.php' class='back'>Volver</a>";
    } else {
      $rows = $rows[0];

      echo "
      <form action='modify_customer.php' method='post' class='second-form'>
        <h4>" . $email . ': ' . $rows['firstname'] . "</h4>
        <input type='hidden' name='trueemail' value='" . $rows['email'] . "'>      
        <div>
          <label for='firstname'>First name</label>
          <input type='text' name='firstname' maxlength='255' required value='" . $rows['firstname'] . "'>
        </div>
        <div>
          <label for='surname'>Last name</label>
          <input type='text' name='surname' maxlength='255' required value='" . $rows['surname'] . "'>
        </div>
        <div>
          <label for='email'>E-mail</label>
          <input type='text' name='email' maxlength='255' required value='" . $rows['email'] . "'>
        </div>
        <div>
          <label for='tipo'>Basic</label>
          <input type='radio' name='tipo' value='basic' required " . (($rows['tipo'] == 'basic') ? 'checked' : '') . ">
        </div>
        <div>
          <label for='tipo'>Premium</label>
          <input type='radio' name='tipo' value='premium' required " . (($rows['tipo'] == 'premium') ? 'checked' : '') . ">
        </div>

        <input type='submit' name='modify' value='MODIFY CUSTOMER'>
        <input type='submit' name='delete' value='DELETE CUSTOMER' class='delete'>
      </form>";
    }
  }
  
  if(isset($_POST['modify'])) {
    require('../utils/modifiers.php');
    $newData = [$_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['tipo']];
    modifyFrom($_POST['trueemail'], $newData, 'customer');
  }

  if(isset($_POST['delete'])) {
    require('../utils/modifiers.php');
    deleteFrom($_POST['trueemail'], "customer");
  }
?>
</main>
</html>