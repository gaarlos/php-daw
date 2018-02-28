<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Tablas</title>
<style>
  body {
    display: flex;
  }

  div {
    min-width: 20%;
  }

  form {
    display: flex;
    flex-direction: column;
    background-color: DarkSlateGrey;
    padding: 1em;
    color: white;
    font-size: 1.5em;
    font-family: Verdana;
  }

  select, input {
    padding: .5em;
    margin: .5em 0;
  }

  <?php 
    if (isset($_POST['submit'])) {
      $width = $_POST["width"] . "px";
      $heigh = $_POST["heigh"] . "px"; 
      $color = $_POST["color"];
      echo "
      table {
        border-collapse: collapse;
        margin: 0 auto;
        margin-top:1em;
        background-color:$color;
      }
      td {
        height: $heigh;
        width: $width;
      }";
    }
  ?>

  td {
    border: 3px solid black;
  }
</style>
</head>
<body>
  <div>
    <form method="post" action="tabla.php">
      <label>Filas</label><select class="row" name="filas"></select>
      <label>Columnas</label><select class="column" name="columnas"></select>
      <label>Ancho</label><select class="width" name="width"></select>
      <label>Alto</label><select class="heigh" name="heigh"></select> 
      <label>Color</label><input type="color" value="#FF0000" name="color">
      <input type="submit" name="submit" value="¡Pintar tabla!">
    </form>
  </div>
</body>
<script>
  getCellSize();
  getTableSize();

  function createOptions (start, max, interval, selector1, selector2) {
    var options = "";
    for(var px = start ; px <= max ; px+=interval) {
      options += '<option>'+ px +'</option>';
      selector1.value = options;
      selector2.value = options;
    }
    selector1.innerHTML = options;
    selector2.innerHTML = options;
  }

  function getCellSize () {
    width = document.querySelector('.width')
    heigh = document.querySelector('.heigh')
    createOptions (100, 2000, 100, width, heigh)
  }

  function getTableSize () {
    row = document.querySelector('.row')
    column = document.querySelector('.column')
    createOptions (1, 30, 1, row, column)
  }
</script>
</html>
<?php
  if(isset($_POST['submit'])) {
    $filas = $_POST['filas'];
    $columnas = $_POST['columnas'];
    printTable($filas, $columnas);
  }

  function printTable($filas, $columnas) {
    $alto = 100;
    echo "<table>";
    for ($i = 0; $i < $filas; $i ++){
      echo "<tr>";
      for ($j = 0; $j < $columnas; $j ++) {
          echo "<td></td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  }
?>
