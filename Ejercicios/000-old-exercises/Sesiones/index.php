<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>sesiones</title>
	<style>
		h1{
			text-align: center;
		}
		.pepe{
			text-align: center;
			margin: 1em 0;
		}
		h2{
			color: antiquewhite;
		}
		form{
			background-color: darkorange;
			margin: 0 auto;
			width: 20%;
			padding: 2em;
			color: white;
		}
		hr{
			border-width: 1px;
			background-color: white;
			margin: 2em 0;
		}
	</style>
</head>
<body>
	<h1>Ingrese sus datos</h1>
	<form action="index.php" method="post">
			<h2 class="pepe">Datos Personales</h2>
			<div class="nombre">
				<h2>Nombre y apellidos:</h2>	
				<p>Nombre: <input type="text" name="nom" required></p>
				<p>Apellidos: <input type="text" name="apes" required></p>
			</div>
			<hr>
			<div class="sexo">
				<h2>Sexo:</h2>
				<p><input type="radio" name="gender" value="hombre"> Hombre</p>
				<p><input type="radio" name="gender" value="mujer"> Mujer</p>
				<p><input type="radio" name="gender" value="hibrido"> Otro</p>
			</div>
			<hr>
			<div class="idioma">
				<h2>Idiomas</h2>
				<p><input type="checkbox" name="idioma[]" value="Ingles">Inglés</p>
				<p><input type="checkbox" name="idioma[]" value="Español">Español</p>
				<p><input type="checkbox" name="idioma[]" value="Frances">Francés</p>
				<p><input type="checkbox" name="idioma[]" value="Italiano">Italiano</p>
				<p><input type="checkbox" name="idioma[]" value="Portugues">Portugués</p>
			</div>
			<hr>
			<div class="nacionalidad">
				<h2>Nacionalidad</h2>
				<select name="nacionalidad" size="1">
					<option value="Inglés">Inglés</option>
					<option value="Español">Español</option>
					<option value="Frances">Francés</option>
					<option value="Italiano">Italiano</option>
					<option value="Portugues">Portugués</option>
					<option value="Otra">Otra</option>
				</select>
			</div>
			<hr>
			<div class="aficiones">
				<h2>Aficiones</h2>
				<select multiple="multiple" name="aficiones[]" size="5">
					<option value="lectura">Lectura</option>
					<option value="musica">Musica</option>
					<option value="deportes">Deportes</option>
					<option value="tele">Televisión</option>
					<option value="otras">Otras</option>
				</select>
			</div>
			<hr>
			<div>
				<p><input type="submit" value="Enviar" name="enviar"></p>
			</div>
	</form>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['identificativo'])){//¿No está ya acreditado?
	if (isset($_POST['enviar'])) {
		function controla_entrada($entrada) {
			return trim(htmlspecialchars(strip_tags($entrada)));
		}
		$nombre = controla_entrada($_REQUEST['nom']);
		$_SESSION['nombre'] = $nombre;
		$_SESSION['apes'] = controla_entrada($_REQUEST['apes']);
		if(isset($_REQUEST['gender'])) { 
			$_SESSION['gender'] = $_REQUEST['gender']; 
		}
		if(isset($_REQUEST['idioma'])) {
			$_SESSION['idioma'] = $_REQUEST['idioma'];
		}
		if(isset($_REQUEST['nacionalidad'])) {
			$_SESSION['nacionalidad'] = $_REQUEST['nacionalidad']; 
		}
		if(isset($_REQUEST['aficiones'])) { 
			$_SESSION['aficiones'] = $_REQUEST['aficiones']; 
		}
		header('Location: informacion.php');
	}
}	else {//Sí está ya acreditado
	header('Location: informacion.php');
}
?>