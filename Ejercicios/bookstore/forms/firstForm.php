<form method="post" class="index-form">
<div>
  <input type="submit" name="book" value="Add books">
  <input type="submit" id="modify" name="modify_book" value="Modify books">
</div>
<div>
  <input type="submit" name="register" value="Register">
  <input type="submit" id="modify" name="modify_user" value="Modify user">
</div>
</form>
<hr>

<?php
  if (isset($_POST['modify_book'])) {
    echo "<form action='books/modify_book.php' method='post' class='second-form'>
      <div>
        <label for='ISBN'>ISBN</label>
        <input type='text' name='isbn' maxlength='13' required autofocus>
      </div>
  
      <input type='submit' name='modify_book' value='MODIFY BOOK'>
    </form>";
  }

  if (isset($_POST['modify_user'])) {
    echo "<form action='customers/modify_customer.php' method='post' class='second-form'>
      <div>
        <label for='email'>E-mail</label>
        <input type='text' name='email' maxlength='255' required autofocus>
      </div>
  
      <input type='submit' name='modify_customer' value='MODIFY CUSTOMER'>
    </form>";
  }
?>