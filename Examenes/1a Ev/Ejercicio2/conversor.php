<html>
<head>
  <link rel="stylesheet" href="css/master.css">
</head>
<body>
<div class="container d-flex">
  <?php
    if(!isset($_COOKIE['howto'])) {
      echo "
        <form action='conversor.php' method='post' class='howto'>
          <h4>How to serve the conversion</h4>
          <div>
            <input type='radio' value='screen' name='howto' checked required>
            <label for='screen'>On screen</label>
          </div>
          <div>
            <input type='radio' value='file' name='howto' required>
            <label for='file'>On file</label>
          </div>
          <input type='submit' name='choose' value='CHOOSE'>
        </form>
      ";
      if(isset($_POST['choose'])) {
        setcookie('howto', $_POST['howto']);
        header('Location: conversor.php');
      }
    }
  ?>
  <form action="result_page.php" method="post" class="d-flex flex-column signin">
    <?php
      require('utils/create_selects.php');
      echo "<div>";
      createSelects('from');
      createSelects('to');
      echo "
        </div>
        <input type='text' name='from_value' pattern='[0-9]{1-4}' maxlength='4' title='Max: 9999' placeholder='Quantity'>
        <div class='submiters d-flex'>
          <input type='submit' name='convert' value='CONVERT'>
          <input type='submit' name='signout' value='SIGN OUT'>
        </div>";
    ?>
  </form>
</div>
</body>
</html>
