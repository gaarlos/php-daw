<?php
  function printForm ($figures) {
    require_once('utils/figure_options.php');

    echo "<div class='container'>
            <form action='index.php' method='post' class='d-flex flex-column second-form'>";

    foreach($figures as $figure) {
      setFigureOptions($figure);
    }

    echo "<input type='submit' name='print' value='PRINT'>
        </form>
      </div>";
  }
?>
