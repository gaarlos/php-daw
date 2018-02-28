<html>
  <head>
    <link rel='stylesheet' href='css/master.css'>
  </head>
  <body>
    <div class='container'>
    <form action="index.php" method="post" class="first-form d-flex flex-column flex-center">
        <h1><?php echo $_COOKIE['figure'] ?></h1>
        <div>
          <img src="img/figure.png" alt="figure">
        </div>
        <input type="submit" name="home" value="HOME">
      </form>
    </div>
  </body>
</html>