<?php
    $usuario1 = ["garlos", "hola"];
    $usuario2 = ["juanhosk", "programador"];
    $usuario3 = ["manu", "pringao"];

    $usuarios = [$usuario1, $usuario2, $usuario3];
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];
    $found = false;

    if(isset($user) && isset($pass)) {
        for($i = 0; $i < count($usuarios); $i++) {
            if($user == $usuarios[$i][0]) {
                if($pass == $usuarios[$i][1]) {
                    echo('<strong>Bienvenido, @'.$user.'</strong>');
                    $found = true;
                    break;
                } else {
                    echo('<strong>Contraseña incorrecta.</strong>');
                    $found = true;
                    break;
                }
            }
        }
        if(!$found)
            echo('<strong>El usuario no existe. Acceso no autorizado.</strong>');
    }
?>