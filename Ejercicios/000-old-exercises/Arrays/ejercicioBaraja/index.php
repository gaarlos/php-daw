<!DOCTYPE html>
<head>
    <title>Barajar cartas</title>
    <meta charset="UTF-8">
    <link href="css/master.css" rel="stylesheet">
</head>
<body>
    <main>  
        <div>
            <section>
            <form action="php/baraja.php" target="baraja">
                <label for="numCartas"><h2>Número de cartas</h2></label>
                <select name="numCartas">
                    <?php
                    for ($i = 1; $i <= 48; $i++)
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    ?>
                </select>
                <input type="submit" name="barajar" value="Barajar!">
                <input type="submit" name="verBaraja" value="Ver baraja">
            </form>
            </section> 
        </div>
        <iframe name="baraja" frameborder="0"></iframe>
    </main>
</body>
</html>