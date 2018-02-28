<?php
    $user = test_input($_REQUEST['user']);
    $pass = test_input($_REQUEST['pass']);
    $gendre = test_input($_REQUEST['gendre']);
    $language = test_input($_REQUEST['language']);

    echo(
        'El usuario es: <strong>'.$user.'</strong><br>
        La contraseña es: <strong>'.$pass.'</strong><br>
        El usuario es: <strong>'.ucfirst($gendre).'</strong><br>
        El idioma seleccionado es: <strong>'.ucfirst($language).'</strong><br>'
    );
    if(isset($_REQUEST['hobbies'])) {
        $hobbies = $_REQUEST['hobbies'];
        echo('Los hobbies del usuario son:<br>');
        for($i = 0; $i < count($hobbies); $i++)
            echo('<strong>'.ucfirst(test_input($hobbies[$i])).'</strong><br>');
    }
    if(isset($_REQUEST['text'])) {
        $text = test_input($_REQUEST['text']);
        echo('Tu descripción:<br><strong>'.$text.'</strong>');
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>