<?php
  function setFigureOptions ($figure) {
    if ($figure == 'circle') {
      $placeholder = 'Radio...';
      $name = 'radio';
    } else {
      $placeholder = 'Side length...';
      $name = 'sideA';
    }

    echo "
    <h3>".strtoupper($figure)."</h3>
    <form action='index.php' method='post' class='d-flex flex-column second-form'>
      <input type='text' name='$name' pattern='[0-9]{1-4}' maxlength='4' placeholder='$placeholder' title='Max: 9999px' required autocomplete='off'>";
      if($figure == 'rectangle') {
        echo "<input type='text' name='sideB' pattern='[0-9]{1-4}' maxlength='4' placeholder='$placeholder' title='Max: 9999px' required autocomplete='off'>";
      }
    echo "
      <div>
        <input type='color' name='color' value='#000000'>
        <label for='color'>Color</label>
      </div>
      <input type='submit' name='print' value='PRINT'>
    </form>
    ";
  }
?>