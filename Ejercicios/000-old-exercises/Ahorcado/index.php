  <?php
    require_once('static/header/header.php');
    $header = new Header('Ahorcado', 'El juego');

    echo $header;
  ?>
  <section class="container d-flex f-column">
    <div><h1>THE HANGMAN GAME</h1><img src="static/hangman/Hangman-6" alt="hangman"></div>
    <div>
      <form action="index.php" method="POST">
        <div class="signin d-flex f-column">
          <?php
            session_start();

            if(!isset($_SESSION['username'])) {
              echo '
                <input type="text" class="text-field" name="username" placeholder="Username...">
                <input type="password" class="text-field" name="password" placeholder="Password...">
                <div class="d-flex">
                  <input type="submit" value="SIGN IN" name="signin" class="signin-submit">
                ';
            } else {
              echo '
                  <h1>Hi '.$_SESSION['username'].'!</h1>
                  <div class="d-flex">
                    <input type="submit" value="SIGN OUT" name="signout" class="signin-submit">
                ';
            }
            echo '<input type="submit" value="PLAY" name="play" class="play-submit"></div>';
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
    login();
  }

  if(isset($_REQUEST['signout'])) {
    logout();
  }

  if(isset($_REQUEST['play'])) {
    delAnomCookie();
    startupAnon();
    header("Location: ahorcado.php");
  }
?>