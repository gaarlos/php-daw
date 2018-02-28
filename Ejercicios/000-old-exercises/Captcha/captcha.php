<?php

  $image = imagecreatetruecolor(250, 70);
  $text_color = imagecolorallocate($image, 15,255,0); 
  $fontsdir = 'fonts';
  $fonts = scandir($fontsdir);
  $fonts = array_slice($fonts, 2);
  
  $randomFont = '';
  $palabra = captchaString($image, $text_color, $fonts);
  setcookie("palabra", $palabra, time()+360000);

  function captchaString($image, $text_color, $fonts) {
    $captcha = [];
    for ($i = 0; $i < 5; $i++) {
      $fontURL = "fonts/" . randomFonts($fonts);
      $letraRandom = randomLetters(createAbcd());
      array_push($captcha, $letraRandom);
      imagefttext($image, rand(30,40),rand(-25,25),  50+($i*30), 50, $text_color,$fontURL,$letraRandom);
    }
    imagepng($image, "image.png");
    $palabra = implode($captcha);
    return $palabra;
  }
  

  function createAbcd() {
    $abcd = [];
    foreach (range('a', 'z') as $letra) {
      array_push($abcd, $letra);
    }
    return $abcd;
  }

  function randomLetters($abcd) {
    $letra = $abcd[rand(0,sizeof($abcd)-1)];
    return $letra;
  }

  function randomFonts($fonts) {
    $randomFont = $fonts[rand(0,2)];
    return $randomFont;
  }
  



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
   
    h1{
      text-align:center;
    }
    .captcha{
      width:250px;
      height:150px;
      padding:1em;
      margin: 0 0 0 40%;
      background-color:violet;
    }
    input{
      margin:2em 0 0.5em 0;
    }
    .state{
      margin: 0 0 0 40%;
      font-weight:800;
      color:white;
    }
    
  </style>
</head>
<body>
  <h1>Ejercicio Captcha</h1>
  <div class="captcha">
    <img src="image.png">
    <form action="captcha.php" method="post">
      <input type="text" name="text">
      <input type="submit" name="enviar" value="enviar">
      <div class="state">
        <?php 
          if(isset($_POST["enviar"])) {
            if($_POST["text"] == '') {
              echo "Introduce texto";
            }else{
              if($_POST["text"] == $_COOKIE["palabra"]){
                echo "Acertaste";
              }else{
                echo "Fallaste";
              }
            }
          }
        ?>
      </div>
    </form>
  </div>

  
</body>
</html>