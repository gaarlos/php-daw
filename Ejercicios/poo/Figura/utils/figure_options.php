<?php
  function setFigureOptions ($figure) {
    $placeholder = 'Side length...';
    
    if ($figure == 'circle') {
      $placeholder = 'Radio...';
      $name = 'radio';
    } elseif ($figure == 'square') {
      $name = 'squareSide';
    } else {
      $name = 'rectangleA';
    }

    echo "<h3>".strtoupper($figure)."</h3>
          <input type='text' name='$name' pattern='[0-9]{1-4}' maxlength='4' placeholder='$placeholder' title='Max: 9999px' required autocomplete='off'>";
      
    if($figure == 'rectangle') {
      echo "<input type='text' name='rectangleB' pattern='[0-9]{1-4}' maxlength='4' placeholder='$placeholder' title='Max: 9999px' required autocomplete='off'>";
    }

    echo "<div>
            <input type='color' name='color[]' value='#000000'>
            <label for='color'>Color</label>
          </div>";
  }
?>