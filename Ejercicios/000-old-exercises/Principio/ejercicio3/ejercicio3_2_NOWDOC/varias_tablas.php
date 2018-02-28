<style>
    td {
        background-color: #A1A1A1;
    }
</style>

<table border="1" cellspacing="4em" cellpadding="10" >
	<?php

	echo<<<'EOD'
		<br>TABLAS DE MULTIPLICAR<br>
EOD;

	for ($i = 1; $i <= $_GET['numtablas']; $i++) {
		echo<<<'EDO'
			<tr>
EDO;
		echo<<<'EOT'
			<td>Tabla del $i</td>
EOT;
		for ($j = 1; $j <= 10; $j++) {
			$res = $i * $j;
			echo<<<EDE
				<td>$i x $j = $res</td>
EDE;
		
		}

		echo<<<'EDT'
			</tr>
EDT;

		}
	?>
</table>