<html>
  <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Ejercicios/BBDD/styles/header.php');
    $header = new Header('Base de datos', 'Add books to database');
    echo $header;
  ?>
<main class="container">
  <form action="register.php" method="post" class="second-form">
    <div>
      <label for="firstname">First name</label>
      <input type="text" name="firstname" maxlength="255" required>
    </div>
    <div>
      <label for="lastname">Last name</label>
      <input type="text" name="lastname" maxlength="255" required>
    </div>
    <div>
      <label for="email">E-mail</label>
      <input type="text" name="email" maxlength="255" required>
    </div>
    <div>
      <label for="tipo">Basic</label>
      <input type="radio" name="tipo" value="basic" required>
    </div>
    <div>
      <label for="tipo">Premium</label>
      <input type="radio" name="tipo" value="premium" required>      
    </div>

    <input type="submit" name="add_customer" value="ADD CUSTOMER">
  </form>

  <?php
    if(isset($_POST['add_customer'])) {
      $customer = [$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['tipo']];

      require('../utils/addCustomer.php');
      addCustomer($customer);
    }
  ?>
</main>
</html>