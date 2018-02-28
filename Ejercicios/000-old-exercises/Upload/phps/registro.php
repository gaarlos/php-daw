<?php
    $user = test_input($_REQUEST['user']);
    $pass = test_input($_REQUEST['pass']);

    echo 'El usuario es: <strong>'.$user.'</strong><br>
         La contraseña es: <strong>'.$pass.'</strong><br>';

    if (isset($_FILES['profile']['tmp_name'] )){
        $directory = "../images/";
        $fileName = $_FILES['profile']['name'];
        $ext = "." . pathinfo($fileName, PATHINFO_EXTENSION);
        $fullName = $directory.$fileName;
        if (is_dir($directory)){
            $idUnico = date('Y-m-d-H-i-s',time());
            $fileName = $user . "-" . $idUnico . $ext;
            $fullName = $directory.$fileName;
            move_uploaded_file ($_FILES['profile']['tmp_name'],$fullName);
            echo "Fichero subido con el nombre:<br><strong> $fileName</strong><br>";
        }
        else 
            echo "Directorio definitivo inválido";
        }
    else
        echo "No se ha podido subir el fichero";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>