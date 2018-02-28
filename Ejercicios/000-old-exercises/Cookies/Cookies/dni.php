<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    <?php
    if(isset($_COOKIE['bg-color'])) {
      $bgcolor = $_COOKIE['bg-color'];
      echo " body { background-color: " . $bgcolor . " }";
    }
    if(isset($_COOKIE['font-color'])) {
      $fontcolor = $_COOKIE['font-color'];
      echo " * { color: " . $fontcolor . " }";
    }
    ?>
    :root {
      box-sizing: border-box;
    }
    body {
      display: flex;
      flex-direction: column;
      text-align: center;
      min-width: 15em;
      max-width: 30em;
    }
    .letra {
      background-color: white;
      margin-top: 1em;
      border: 1px solid black;
    }
    h4, form, .letra {
      border-radius: 1em;
      padding: .5em;
    }
    h4 {
      background-color: #A6A6FF;
      margin: 0 0 .5em;
    }
    input { 
      text-align: right;
    }
    .num-dni {
      background-color: white;
      border: 1px solid black;
    }
  </style>
</head>
<body>
  <?php
    $lang = ['INTRODUZCA SU DNI Y CALCULE SU LETRA',
             'Cambiar estilos',
             'Introduce el número de tu DNI: ',
             'Comprobar letra',
             'Tu letra del DNI es: '];
    if ($_COOKIE['language'] == 'English'){
      $lang = ['INSERT YOUR DNI NUMBER AND GET THE LETTER',
               'Change styles',
               'Type DNI number',
               'Check letter',
               'Your DNI letter is: '];
    }
  echo "  
  <div>
    <div>
      <form method='post'>
        <h4>".$lang[0]."</h4>
        <input type='submit' name='styles' value='".$lang[1]."'>    
      </form>
    </div>
    <form action='' method='post' class='num-dni'>
      <label for='numeroDNI'>".$lang[2]."</label>
      <input type='text' name='numeroDNI' pattern='[0-9]{1,9}' maxlength='9' size='9' placeholder='ej. 12345678' required>
      <input type='submit' name='dni' value='".$lang[3]."'>
    </form>
  </div>
  ";

  if (isset($_REQUEST['numeroDNI'])) {
    $letra = ["T", "R", "W", "A", "G", "M", "Y", "F", 
      "P", "D", "X", "B", "N", "J", "Z", "S",
      "Q", "V", "H", "L", "C", "K", "E"];

    $DNI = $_REQUEST['numeroDNI'];
    echo("<div class='letra'>".$lang[4].$letra[$DNI%23]."</div>");
  }

  if (isset($_REQUEST['styles'])) {
    setcookie('language', "", time() - 3600);
    setcookie('font-color', "", time() - 3600);
    setcookie('bg-color', "", time() - 3600);
    header("Refresh: 0; index.php");
  }
  ?>
  </iframe>
</body>
</html>
