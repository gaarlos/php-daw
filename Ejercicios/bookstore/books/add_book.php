<html>
  <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/php-daw/Ejercicios/bookstore/styles/header.php');
    $header = new Header('Base de datos', 'Add books to database');
    echo $header;
  ?>
<main class="container">
  <form class="second-form" id="form" method="POST">
    <div>
      <label for="ISBN">ISBN</label>
      <input id="isbn" type="text" name="isbn" maxlength="13" required>
    </div>
    <div>
      <label for="title">Title</label>
      <input id="title" type="text" name="title" maxlength="255" required>
    </div>
    <div>
      <label for="author">Author</label>
      <input id="author" type="text" name="author" maxlength="255" required>
    </div>
    <div>
      <label for="stock">Stock</label>
      <input id="stock" type="text" name="stock" maxlength="5" pattern="[0-9]{1-5}" required>
    </div>
    <div>
      <label for="price">Price</label>
      <input id="price" type="text" name="price" maxlength="4" pattern="[0-9]{1-5}" required>
    </div>  

    <button class="submit" onclick="addBook(event)">ADD BOOK</button>
  </form>
  <div id="table"></div>
  <script src="listDatabase.js"></script>
  <script>
    const addBook = (e) => {
      xmlhttp = new XMLHttpRequest()

      e.preventDefault()
      var values = []
      values.push(document.getElementById('isbn').value)
      values.push(document.getElementById('title').value)
      values.push(document.getElementById('author').value)
      values.push(document.getElementById('stock').value)
      values.push(document.getElementById('price').value)

      values = values.join('=')

      xmlhttp.open("GET", "addBook.php?q=" + values, true)
      xmlhttp.send()
      document.getElementById("form").reset(); 
      listBooks('book')
    }

    (function () { listBooks('book') })()
  </script>
</main>
</html>
