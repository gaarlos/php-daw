<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/master.css">
    <title>Ajedrez</title>
</head>
<body>
<main>
    <table border="1">
    <?php
        $blancas = ['torre', 'caballo', 'alfil', 'reina', 'rey', 'alfil', 'caballo', 'torre'];
        $negras = ['torre', 'caballo', 'alfil', 'rey', 'reina', 'alfil', 'caballo', 'torre'];
        for($i = 0; $i < 8; $i++) {
            echo '<tr>';
            for($j = 0; $j < 8; $j++) {
                if($i == 0)
                    echo '<td><img src="images/negras/'.$blancas[$j].'.png">'; 
                elseif($i == 7)
                    echo '<td><img src="images/blancas/'.$negras[$j].'.png">'; 
                elseif($i == 1) 
                    echo '<td><img src="images/negras/peon.png">';                
                elseif($i == 6) 
                    echo '<td><img src="images/blancas/peon.png">';
                else 
                    echo '<td class="noImage">';
                echo '</td>';
            }
            echo '</tr>';
        }
    ?>
    </table>     
</main>
</body>
</html>