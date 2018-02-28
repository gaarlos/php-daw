<html>
    <head>
        <meta charset="UTF-8">
        <title>Notas de alumnos</title>
        <style>
            form, div {
                width: 20%;
                margin: 0 40%;
            }
            form {
                margin-bottom: 1em;
                border: 2px solid black;
                border-radius: 2em;
                padding: 0.5em;
                background-color: #A1A1A1;
            }
            .tablas {
                background-color: #A1A1A1;
                border-radius: 1em;
                display: inline-block;
                width: 10em;
                height: 1.5em;
                margin-bottom: 0.5em;
            }
            input {
                margin-bottom: 2em;
            }
            label {
                display: inline-block;
                margin-bottom: 1em;
            }
            .continue {
                float: right;
            }
            .continue_div {
                height: 2em;
                background-color: none;
            }
            a {
                text-decoration: none;
                color: black;
            }
        </style>
    </head>
    <body>
        <center>
            <form action="calcular.php" method="get">
                <label for="numero"><h3>Selecciona un número para sacar<br>su tabla de multiplicar:</h3></label>
                <input type="number" name="numero" min="1" placeholder="Elige un número"><br>

                <div class="continue_div">
                    <input class="continue" type="submit" value="Calcular">
                </div>
            </form>
                
            <form action="varias_tablas.php" method="get">
                <label for="numero"><h3>Elige el número de tablas a sacar:</h3></label>
                <input type="number" name="numtablas" min="1" placeholder="Elige un número"><br>

                <div class="continue_div">
                    <input class="continue" type="submit" value="Calcular">
                </div>
            </form>
            <?php
                for ($j = 1; $j <= 10; $j++) {

                    echo<<<EOD
                        <div class="tablas"><a href="calcular.php?numero=$j">Tabla del $j</a></div><br>
EOD;
                
                } 
            ?>
        </center>
    </body>
</html>