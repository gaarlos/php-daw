<html>
  <head>
    <link rel="stylesheet" href="css/master.css">
  </head>
</html>
<?php
  session_start();

  if (isset($_POST['signout'])) {
    header('Location: index.php');
  }
  require('utils/conversion.php');
  $currency = file_get_contents('static/currency.json');
  $currency = json_decode($currency, true);

  $howto = 'screen';
  if (isset($_COOKIE['howto'])) {
    $howto = $_COOKIE['howto'];
  }

  $from = $_POST['from'];
  $to = $_POST['to'];
  
  if ($_POST['from_value'] == '') {
    $from_value = 1;
  } else {
    $from_value = $_POST['from_value'];
  }

  $result = convert($from, $to, $from_value);

  if ($howto == 'file') {
    $date = gmdate("m-j-Y-G-i");
    $filename = $_SESSION['username']."-".$date;
    $data = $from_value." ".$currency[$from][0]." = ".$result." ".$currency[$to][0];
    file_put_contents($filename, $data);
  } else {
    echo "
      <div class='container d-flex flex-column result'>
        <h1>Gracias por utilizar nuestros servicios.</h1>
        <h1 class='result'><img src='".$currency[$from][2]."' alt='from'></img>".$from_value." ".$currency[$from][0]." 
            = <span class='to-currency'>".$result."<span> ".$currency[$to][0]."<img src='".$currency[$to][2]."' alt='to'></img><h1>
      <form action='conversor.php' method='post'>
        <input type='submit' value='HOME' name='home'>
      </form>
      </div>
    ";
  }
?>