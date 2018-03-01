<html>
  <script src="../ajax/ajax.js"></script>
  <?php
    require_once('../styles/header.php');
    $header = new Header('Base de datos', 'Add books to database');
    echo $header;
  ?>
<main class="container">
  <form method="post" id="form" class="second-form">
    <div>
      <label for="firstname">First name</label>
      <input type="text" maxlength="255" required>
    </div>
    <div>
      <label for="lastname">Last name</label>
      <input type="text" maxlength="255" required>
    </div>
    <div>
      <label for="email">E-mail</label>
      <input type="text" maxlength="255" required>
    </div>
    <div>
      <label for="tipo">Basic</label>
      <input type="radio" name="type" value="basic" required>
    </div>
    <div>
      <label for="tipo">Premium</label>
      <input type="radio" name="type" value="premium" required>      
    </div>

    <button class="submit" onclick="addCustomer(event)">ADD CUSTOMER</button>
  </form>

  <div id="status"></div>
  <div id="table"></div>
</main>
<script>
  (function () { listDatabase('customer') })()
</script>
</html>