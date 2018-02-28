<?php 
  function createSelects ($selector) {
    $currency = file_get_contents('static/currency.json');
    $currency = json_decode($currency, true);
    echo "<select name='$selector'>";
      for($i = 0; $i < sizeof($currency); $i++) {
        echo "
          <option value='$i'>".$currency[$i][0]."</option>
        ";
      }
    echo "</select>";
  }
?>

