<style>
    td {
        background-color: #A1A1A1;
    }
</style>

<table border="1" cellspacing="4em" cellpadding="10">
	<?php

	echo("<br><h3>TABLA DE MULTIPLICAR DEL " . $_GET['numero'] . "</h3><br>");

	echo("<tr>");
	for ($j = 1; $j <= 10; $j++) {
		echo("<td>" . $_GET['numero'] . " x " . $j . "=" . $_GET['numero'] * $j . "</td>");
	}
	echo("</tr>");

	?>
</table>