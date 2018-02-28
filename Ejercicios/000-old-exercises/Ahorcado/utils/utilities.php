<?php
  function getRandomWord() {
    $word = array('programador', 'desarrollo', 'empresa', 'ingles',
    'despliegue', 'php', 'servidor', 'cliente', 'parlantes');
    shuffle($word);
    return $word[0];
  }

  function setAnonWord () {
    if(!isset($_COOKIE['word'])) {
      $word = getRandomWord();
      setcookie('word', $word);
    }
  }

  function setResult () {
    if(!isset($_COOKIE['result'])) {
      $result = array_fill(0, strlen($_COOKIE['word']), '');
      setcookie('result', serialize($result));
    }
  }

  function delAnomCookie () {
    if(isset($_COOKIE['word'])) {
      unset($_COOKIE['word']);
      setcookie('word', null, -1);
      unset($_COOKIE['lettersUsed']);
      setcookie('lettersUsed', null, -1);
      unset($_COOKIE['statusCode']);
      setcookie('statusCode', null, -1);
      unset($_COOKIE['result']);
      setcookie('result', null, -1);
    }
  }

  function updateUsed ($letter) {
    $lettersUsed = array();
    if(isset($_SESSION['lettersUsed'])) {
      $lettersUsed = $_SESSION['lettersUsed'];
      array_push($lettersUsed, $letter);
      $_SESSION['lettersUsed'] = $lettersUsed;
    } else {
      $lettersUsed = unserialize($_COOKIE['lettersUsed']);
      array_push($lettersUsed, $letter);
      setcookie('lettersUsed', serialize($lettersUsed));
    }
  }

  function setStatus () {
    setcookie('statusCode', 0);
  }

  function incStatus () {
    if(isset($_SESSION['statusCode'])) {
      $_SESSION['statusCode'] = $_SESSION['statusCode'] + 1;

    } else {
      $status = $_COOKIE['statusCode'];
      $status = intval($status) + 1;
      setcookie('statusCode', $status);
    }
  }

  function test_input ($data) {
    $data = trim(stripslashes(htmlspecialchars($data)));
    return $data;
  }

  function restartGame () {
    $_SESSION['word'] = getRandomWord();
    $_SESSION['result'] = array_fill(0, strlen($_SESSION['word']), '');
    $_SESSION['lettersUsed'] = array();
    $_SESSION['statusCode'] = 0;
    header('Location: ahorcado.php');
  }
?>