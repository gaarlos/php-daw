<html>
  <script src="../ajax/ajax.js"></script>
  <?php
    require_once('../styles/header.php');
    $header = new Header('Base de datos', 'Add books to database');
    echo $header;
  ?>
<main class="container">
  <form class="second-form" id="form" method="POST">
    <div>
      <label for="ISBN">ISBN</label>
      <input type="text" maxlength="13" required>
    </div>
    <div>
      <label for="title">Title</label>
      <input type="text" maxlength="255" required>
    </div>
    <div>
      <label for="author">Author</label>
      <input type="text" maxlength="255" required>
    </div>
    <div>
      <label for="stock">Stock</label>
      <input type="text" maxlength="5" pattern="[0-9]{1-5}" required>
    </div>
    <div>
      <label for="price">Price</label>
      <input type="text" maxlength="4" pattern="[0-9]{1-5}" required>
    </div>  

    <button class="submit" onclick="addBook(event)">ADD BOOK</button>
  </form>

  <div id="status"></div>
  <div id="table"></div>
</main>
<script>
  (function () { listDatabase('book') })()
</script>
</html>
