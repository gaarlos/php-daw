<?php
  function convert ($from, $to, &$from_value) {
    $currency = file_get_contents('static/currency.json');
    $currency = json_decode($currency, true);

    if ($currency[$from][0] == 'EUR') {
      if ($currency[$to][0] == 'EUR') {
        return $from_value;
      } else {
        return $from_value * $currency[$to][1];
      }
    } else {
      $eurEquiv = $from_value / $currency[$from][1];

      if ($currency[$to][0] != 'EUR') {
        return $eurEquiv * $currency[$to][1];
      } else {
        return $eurEquiv;
      }
    }
  }
?>