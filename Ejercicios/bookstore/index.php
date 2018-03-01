<?php
  if (isset($_POST['book'])) {
    var_dump(header('Location: books/add_book.php'));
  }
  if (isset($_POST['register'])) {
    header('Location: customers/add_customer.php');
  }
?>

<html>
  <?php
    require_once('styles/header.php');
    $header = new Header('Base de datos', 'Home');
    echo $header;
  ?>
<main class="container">
  <form action="index.php" method="post"><input type="submit" name="create" value="Create BBDD"></form>
  <div class="index-form">
    <div class="operator-text">Books operations</div>
    <div class="operator-text">Customers operations</div>
  </div>
  <?php
    include_once('forms/firstForm.php');

    if(isset($_POST['create'])) {
      require('bbdd/createTables.php');
      createTables();
    }
  ?>
</main>
</html>