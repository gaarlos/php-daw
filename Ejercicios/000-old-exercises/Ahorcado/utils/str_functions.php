<?php
  function isLetter($word, $letter) {
    return preg_match($letter, $word) !== 0 ? True : False;
  }

  function positions($word, $letter) {
    preg_match_all($letter, $word, $positions, PREG_OFFSET_CAPTURE);
    return $positions;
  }

  function arrPositions ($word, $letter) {
    $arrPositions = array();
    foreach(positions($word, $letter) as $key)
      foreach($key as $positions => $position)
        array_push($arrPositions, $position[1]);
    return $arrPositions;
  }

  function fillResult($word, $letter, $letterP, &$result) {
    foreach(arrPositions($word, $letterP) as $position) {
      $result[$position] = $letter;
    }

    if(isset($_SESSION['result'])) {
      $_SESSION['result'] = $result;
    } else {
      setcookie('result', serialize($result));
    }
  }
?>
