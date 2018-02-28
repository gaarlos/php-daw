<?php
  session_start();
  if (isset($_GET['terminar_sesion'])){ 
    //Borramos todas las variables de la sesión
    $_SESSION=array();
    //Caducamos la cookie
    setcookie('PHPSESSID','',time()-3600);
    //destruimos los datos de la sesión en el script actual
    session_destroy();
    //redirigimos a la página de acreditación
    header('Location: index.php');
  }
  if (!isset($_SESSION['nombre'])){
    header('Location: index.php');
  }
  $nombre = $_SESSION['nombre'];
  $apes = $_SESSION['apes'];
  echo '<a href="informacion.php?terminar_sesion=1">Terminar sesion</a><br />';
  echo "<div>";
  echo "<h1>HOLA $nombre $apes.</h1>";
  if(isset($_SESSION['gender'])) {
    $genero = $_SESSION['gender'];
    echo "<h2>Eres $genero </h2>";
  }
  if(isset($_SESSION['idioma'])) {
    $idioma = $_SESSION['idioma'];
    echo "<h2>Hablas: </h2>";
    foreach ($idioma as $value) {
      echo "<p> $value.</p>";
    }
  }
  if(isset($_SESSION['nacionalidad'])) {
    $nacion = $_SESSION['nacionalidad']; 
    echo "<h2>Tu nacionalidad es: $nacion. </h2>";
  }
  if(isset($_SESSION['aficiones'])) { 
    $aficiones = $_SESSION['aficiones']; 
    echo "<h2>Tus aficiones son: </h2>";
    foreach ($aficiones as $value) {
      echo "<p> $value.</p>";
    }
  }
  echo "</div>";

  echo "<style>
          div{
            padding: 2em;
            margin: 0 auto;
            background-color: darkorange;
            width:30%;
            color: white;
          }

        </style>";
?>
