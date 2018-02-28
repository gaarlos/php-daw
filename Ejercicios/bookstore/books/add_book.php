<html>
  <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Ejercicios/BBDD/styles/header.php');
    $header = new Header('Base de datos', 'Add books to database');
    echo $header;
  ?>
<main class="container">
  <form action="add_book.php" method="post" class="second-form">
    <div>
      <label for="ISBN">ISBN</label>
      <input type="text" name="isbn" maxlength="13" required>
    </div>
    <div>
      <label for="title">Title</label>
      <input type="text" name="title" maxlength="255" required>
    </div>
    <div>
      <label for="author">Author</label>
      <input type="text" name="author" maxlength="255" required>
    </div>
    <div>
      <label for="stock">Stock</label>
      <input type="text" name="stock" maxlength="5" pattern="[0-9]{1-5}" required>
    </div>
    <div>
      <label for="price">Price</label>
      <input type="text" name="price" maxlength="4" pattern="[0-9.,]{1-5}" required>
    </div>  

    <input type="submit" name="add_book" value="ADD BOOK">
  </form>

  <?php
    if(isset($_POST['add_book'])) {
      $book = [$_POST['isbn'], $_POST['title'], $_POST['author'], $_POST['stock'], $_POST['price']];

      require('addBook.php');
      addBook($book);
    }
  ?>
</main>
</html>