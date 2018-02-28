<?php
    if ($_POST['nota'] >= 5) {
        echo("Enhorabuena, " . $_POST['nombre'] . ", has aprobado.");
    } else {
        echo("Lo sentimos, " . $_POST['nombre'] . ", has suspendido.");
    }
?>