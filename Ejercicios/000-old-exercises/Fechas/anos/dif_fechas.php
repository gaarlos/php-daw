<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/master.css">
</head>
<body>
  <?php
    function seeDays() {
      if (($_POST['year'] !== "") and ($_POST['month'] !== "")) {
        $month = $_POST['month'];
        $year = $_POST['year'];
        $maxDays = date('t', mktime(0 ,0 ,0 , $month, 1, $year));
        echo '<div class="days"><input type="number" name="day" min="1" max="'. $maxDays .'" placeholder="Día">
             <input type="submit" name="get-date" value="¿Cuántos años tengo?"></div>';
      } else echo '<div class="error">Rellena todos los campos</div>';
    }

    function dateBirth(){
      $day = $_POST['day'];
      $month = $_POST['month'];
      $year = $_POST['year'];
      $birth = new DateTime($year . '-' . $month . '-' . $day);
      $dateNow = getdate();
      $dateNow = new DateTime($dateNow['year'] .'-'. $dateNow['mon'] .'-'. $dateNow['mday']);
      $date = $birth->diff($dateNow);
      echo '<p> Tienes ';
      printf('%d años, %d meses, %d días', $date->y, $date->m, $date->d);
      echo '</p>';
    } 
  ?>
</body>
</html>
