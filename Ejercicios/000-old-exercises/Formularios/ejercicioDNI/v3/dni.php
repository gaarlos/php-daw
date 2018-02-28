<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            :root {
                box-sizing: border-box;
                display: flex;
            }
            body {
                background-color: #CCCCCC;
            }
            h4, form, .letra {
                min-width: 30%;
                border-radius: 1em;
                padding: 1em;
                text-align: center;
                margin-top: -.25em;
            }
            .letra {
                background-color: white;
                margin-top: 1em;
                border: 1px solid black;
            }
            h4 {
                background-color: #A6A6FF;
            }
            input { 
                text-align: right;
            }
            form {
                background-color: white;
                border: 1px solid black;
                margin-top: -.75em;
            }
            label {
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <h4>INTRODUZCA SU DNI Y CALCULE SU LETRA</h4>
        <form action="" method="post">
            <label for="numeroDNI">Introduce tu número de DNI: </label>
            <input type="text" name="numeroDNI" pattern="[0-9]{1,9}" maxlength="9" size="9" placeholder="ej. 12345678" required>
            <input type="submit" value="Comprobar letra">
        </form>
        <?php //Calcula la letra del DNI
                if (isset($_REQUEST['numeroDNI'])) {
                    $letra = ["T", "R", "W", "A", "G", "M", "Y", "F", 
                            "P", "D", "X", "B", "N", "J", "Z", "S",
                            "Q", "V", "H", "L", "C", "K", "E"];

                    $DNI = $_REQUEST['numeroDNI'];
                    echo('<div class="letra">La letra de tu DNI es la '.$letra[$DNI%23]."</div>");
                }
        ?>
        </iframe>
    </body>
</html>
