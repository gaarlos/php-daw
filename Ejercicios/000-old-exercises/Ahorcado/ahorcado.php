<?php 
  require_once('static/header/header.php');
  require('utils/startup.php');
  $header = new Header('Ahorcado', 'El juego');

  echo "
  $header
  <div class='container d-flex'>
    <section class='d-flex f-column'>
      <div class='d-flex letters'>";
    
    foreach($result as $letter) {
      echo "<div>".$letter."</div>";
    }
    
    echo "
      </div>
      <div class='used-letters'>";

    foreach($lettersUsed as $letter) {
      echo $letter;
    }
    
    echo "
      </div>
      <form action='ahorcado.php' method='POST'>
        <input type='text' name='letter' pattern='[A-Za-zñÑ]' maxlength='1' autofocus autocomplete='off' title='Must be a letter'>
      ";
      
      if($statusCode < 6) {
        if($winner) {
          echo "<input type='submit' name='restart' class='play-submit' value='RESTART GAME'>";
        } else {
          echo "<input type='submit' name='check' class='play-submit' value='CHECK'>";
        }
      } else {
        echo "<input type='submit' name='play-again' class='play-submit' value='PLAY AGAIN'>";
      }

      if(!isset($_SESSION['username'])) {
        echo "<input type='submit' name='signin' class='signin-submit' value='LOG IN'>";
      } else {
        echo "<input type='submit' name='signin' class='signin-submit' value='SIGN OUT'>";
      };

  echo "
      </form>
    </section>
    <section class='d-flex f-column'>
      Current player: $username
      Current word: $word
      <div class='hangman-image'>
        <img src='static/hangman/Hangman-$statusCode' alt='hangman'>
      </div>
      <div class='game-$statusCode'>
        $statusMessage
      </div>
    </section>
  </div>
  ";

  if(isset($_REQUEST['check'])) {
    $letter = $_REQUEST['letter'];
    $letterP = "/$letter/u";
    if($letter != '') {
      if(isLetter($word, $letterP)) {
        fillResult($word, $letter, $letterP, $result);
        header('Location: ahorcado.php');
      } else {
        incStatus();
        updateUsed($letter);
        header('Location: ahorcado.php');
      }
    }
  }

  if(isset($_REQUEST['signin'])) {
    delAnomCookie();
    header('Location: index.php');
  }

  if(isset($_REQUEST['play-again'])) {
    delAnomCookie();
    restartGame();
  }

  if(isset($_REQUEST['restart'])) {
    restartGame();
    header('Location: index.php');
  }
?>
</body>
</html>