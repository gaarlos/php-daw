<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/master.css">
  <title>Años</title>
</head>
<body>
<main>
  <div class="container">
    <div class="form-calendar">
      <form method="POST">
        <label for="year"> Año: </label>
        <input type="number" name="year" min="1900" max="2017" placeholder="Año">
        <label for="month"> Mes: </label>
        <select name="month">
          <option></option>
          <option value="1">Enero</option>
          <option value="2">Febrero</option>
          <option value="3">Marzo</option>
          <option value="4">Abril</option>
          <option value="5">Mayo</option>
          <option value="6">Junio</option>
          <option value="7">Julio</option>
          <option value="8">Agosto</option>
          <option value="9">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        </select>
        <input type="submit" name="see-days" value="Ver días">
        <?php
          if (isset($_POST['see-days'])) {
            require_once('dif_fechas.php');
            seeDays();
          }
        ?>
			</form>
    </div>
    <section class="calendar">
      <?php
        if (isset($_POST['get-date'])) {
          require_once('dif_fechas.php');
          dateBirth();
        }
      ?>
    </section>
  </div>
</main>
</body>
</html>