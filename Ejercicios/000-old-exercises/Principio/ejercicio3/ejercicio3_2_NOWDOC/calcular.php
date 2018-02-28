<style>
    td {
        background-color: #A1A1A1;
    }
</style>

<table border="1" cellspacing="4em" cellpadding="10">
	<?php
	$num = $_GET['numero'];

	echo<<<'EOD'
		<br><h3>TABLA DE MULTIPLICAR DEL $num</h3><br>
EOD;

	echo<<<'EOT'
		<tr>
EOT;

	for ($j = 1; $j <= 10; $j++) {
		$res = $num * $j;
		echo<<<'EDE'
			<td>$num x $j = $res</td>
EDE;

	}

	echo<<<'EDT'
		</tr>
EDT;

	?>
</table>