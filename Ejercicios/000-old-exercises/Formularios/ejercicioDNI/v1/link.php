<style>
:root {
    box-sizing: border-box;
    display: flex;
}
a {
    text-decoration: none;
    color: black;
}
div {
    background-color: white;
    text-align: center;
    padding: .25em;
    border-radius: .5em;
}
</style>

<div>
<?php //Calcula la letra del DNI
    $DNI = $_POST['numeroDNI'];
    echo('<a href="dni.php?numeroDNI='.$DNI.'" 
    target="letraDNI"><b>Obten la letra haciendo click en este texto</b></a>');
?>
</div>