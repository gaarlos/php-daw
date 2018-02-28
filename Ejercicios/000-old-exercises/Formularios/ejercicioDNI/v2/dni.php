<style>
    :root {
        box-sizing: border-box;
        display: flex;
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
        $letra = ["T", "R", "W", "A", "G", "M", "Y", "F", 
                "P", "D", "X", "B", "N", "J", "Z", "S",
                "Q", "V", "H", "L", "C", "K", "E"];

        $DNI = $_POST['numeroDNI'];
        echo("<b>La letra de tu DNI es la ".$letra[$DNI%23]."</b>");
    ?>
</div>