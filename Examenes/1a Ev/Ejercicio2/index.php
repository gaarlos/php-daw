<html>
<head>
  <link rel="stylesheet" href="css/master.css">
</head>
<body>
  <section class="container d-flex f-column">
    <div>
      <form action="index.php" method="POST">
        <div class="signin d-flex flex-column">
          <h1>CURRENCY CONVERSOR</h1>
          <?php
            session_start();

            if(!isset($_SESSION['username'])) {
              echo '
                <input type="text" class="text-field" name="username" placeholder="Username..." autocomplete="off">
                <input type="password" class="text-field" name="password" placeholder="Password...">
                <div class="d-flex">
                  <input type="submit" value="SIGN IN" name="signin">
                ';
            } else {
              echo '
                  <h1>Hello '.$_SESSION['username'].'!</h1>
                  <div class="d-flex">
                    <input type="submit" value="GO!" name="go">
                    <input type="submit" value="SIGN OUT" name="signout">
                ';
            }
          ?>
        </div>
      </form>
    </div>
  </section>
</body>
</html>

<?php
  require('utils/sessions.php');

  if(isset($_REQUEST['signin'])) {
    if(!login()) {
      echo "<div class='container'>Usuario incorrecto</div>";
    }
  }

  if(isset($_REQUEST['signout'])) {
    logout();
  }

  if(isset($_REQUEST['go'])) {
    header('Location: conversor.php');
  }
?>