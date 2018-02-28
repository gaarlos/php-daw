<html>
<head>
  <style>
    form {
      display: flex;
      flex-direction: column;
      width: 25%;
      border: 1px solid black;
    }
    select, label {
      margin: .5em;
      width: 50%;
    }
    input {
      margin: .5em;
    }
    input[type=submit] {
      padding: 1em;
    }
  </style>
</head>
<body>
  <form method='post' action="index.php">
    <?php
      $languages = ['Spanish', 'English'];
      echo "
      <label for='language'>Language</label>
      <select name='language'>";
        foreach($languages as $language) {
          echo "<option>$language</option>";
        };
    ?>
    </select>
    <label for='font-color'>Font color</label>
    <input type='color' value='#000000' name='font-color'>
    <label for='bg-color'>Background color</label>
    <input type='color' value='#FFFFFF' name='bg-color'>
    <input type='submit' value='Show form' name='submit'>
  </form>
</body>
</html>

<?php
  if (sizeof($_COOKIE) != 0) {
    header("Refresh: 0; dni.php");
  } elseif(isset($_POST['submit'])) {
    cookieControl();
  }

  function cookieControl() {
    setcookie('language', $_POST['language']);
    setcookie('font-color', $_POST['font-color']);
    setcookie('bg-color', $_POST['bg-color']);
    header("Refresh: 0; dni.php");
  }
?>