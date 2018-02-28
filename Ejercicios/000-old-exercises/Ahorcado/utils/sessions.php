<?php
  require('utilities.php');
  
  function login() {
    if(!isset($_SESSION['username'])) {
      if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
        if($_REQUEST['username'] == 'test' && $_REQUEST['password'] == '1234') {
          $_SESSION['username'] = $_REQUEST['username'];
          $_SESSION['word'] = getRandomWord();
          $_SESSION['result'] = array_fill(0, strlen($_SESSION['word']), '');
          $_SESSION['lettersUsed'] = array();
          $_SESSION['statusCode'] = 0;
          header('Location: ahorcado.php');
        }
      }
    }
  }

  function logout() {
    $_SESSION = array();
    setcookie('PHPSESSID', '', time()-3600);
    session_destroy();
    header('Location: index.php');
  }

  function startupAnon () {
    setAnonWord();
    setStatus();
  }
?>