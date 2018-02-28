<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/master.css">
</head>
<body>
  <?php
    $months = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                         "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $days = array("Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom");
    $today = date("j");
    $thisMonth = date("n");
    $thisYear = date("Y");

  	if (isset($_POST["get-calendar"])) {
      if ($_POST['year'] == "")
        echo "<span class='error'>Introduce un año</span>";
      else {
        echo "<h2> Calendario del año $year </h2>";
        yearCalendar($_POST['year']);
      }
    }
    if (isset($_POST["get-date"])) {
      if ($_POST['month'] == "")
        echo "<span class='error'>Introduce un mes</span>";
      else {
        if($_POST['year'] !== "") {
          echo "<h2> ".$months[$_POST['month']]." del año ".$_POST['year']."</h2>";
          monthCalendar(intval($_POST['year']), $_POST['month']);
        } else {
          echo "<h2> ".$months[$_POST['month']]." del año $thisYear</h2>";
          monthCalendar($thisYear, $_POST["month"]);
        }
      }
    }

    function yearCalendar($year) {
      $month = 1;
      echo "<table class='main-table'>";
      for ($k = 0; $k < 3; $k++) {
        echo "<tr class='main-cells'>";
        for ($j = 0; $j < 4; $j++) {
          echo "<td class='main-cells'>";
          monthCalendar($year, $month);
          echo "</td>";
          $month++;
        }
        echo "</tr>";
      }
      echo "</table>";
    }
  
    function monthCalendar($year, $month) {
      global $months, $days, $today, $thisMonth, $thisYear;
     
      $diaSemana = date("w", mktime(0, 0, 0, $month, 1, $year)) + 7;
      $ultimoDiaMes = date("d", (mktime(0, 0, 0, $month + 1, 1, $year) - 1));
      echo "
        <table class='month-table'>
          <caption> $months[$month] </caption>
          <tr>";
            foreach($days as $day) echo "<th>$day</th>";
      echo "
          </tr>
          <tr bgcolor=silver>";
          $last_cell = $diaSemana + $ultimoDiaMes;
          
          for($i = 1; $i <= 42; $i++) {
            if($i == $diaSemana)
              $day = 1;
            if($i < $diaSemana || $i >= $last_cell)
              echo "<td> &nbsp; </td>";
            else {
              if($day == $today && $month == $thisMonth && $year == $thisYear)
                echo "<td class='today'>$day</td>";
              else
                echo "<td> $day </td>";
              $day++;
            }	
            if($i % 7 == 0)
              echo "</tr><tr>\n";
          }
      echo "</tr></table>";
    }
  
  ?>
</body>
</html>
