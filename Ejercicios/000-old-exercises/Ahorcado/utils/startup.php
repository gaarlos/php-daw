<?php  
  session_start();
  require('utils/utilities.php');
  require('utils/str_functions.php');

  $winner = false;
  
  if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $word = $_SESSION['word'];
    $statusCode = $_SESSION['statusCode'];
    $result = $_SESSION['result'];

    if(!isset($_SESSION['lettersUsed'])) {
      $_SESSION['lettersUsed'] = array();
    } else {
      $letters = $_SESSION['lettersUsed'];
    }

  } else {
    $username = 'guest';
    $word = $_COOKIE['word'];
    $statusCode = $_COOKIE['statusCode'];
    if(isset($_COOKIE['result'])) {
      $result = unserialize($_COOKIE['result']);  
    } else {
      $result = array_fill(0, strlen($_COOKIE['word']), '');
      setResult();
    }

    if(!isset($_COOKIE['lettersUsed'])) {
      $letters = array();
      setcookie('lettersUsed', serialize($letters));
    } else {
      $letters = unserialize($_COOKIE['lettersUsed']);
    }
  };

  $lettersUsed = $letters;
  $statusCode == 0 ? $statusMessage = 'Just Started!' 
    : ($statusCode < 6 ? $statusMessage = 'Be carefull...' : $statusMessage = "Oh no! You're dead!");
  
  implode($result) == $word ? $winner = true && $statusMessage = "Congrats! You won this game!": false;
?>