<style>
    td {
        background-color: #A1A1A1;
    }
</style>

<table border="1" cellspacing="4em" cellpadding="10" >
	<?php

	echo("<br>TABLAS DE MULTIPLICAR<br>");

	for ($i = 1; $i <= $_GET['numtablas']; $i++) {
        echo("<tr>");
        echo("<td>Tabla del " . $i . "</td>");
		for ($j = 1; $j <= 10; $j++) {
			echo("<td>" . $i . " x " . $j . " = " . $i * $j . "</td>");
		}
		echo("</tr>");
	}
	?>
</table>