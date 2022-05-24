<?php
require("./conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
		<title>Inmobilaria Azteca - Inmuebles a bajo precio</title>
		<link rel="stylesheet" type="text/css" href="css/azteca.css"></link>
	</head>
	<body>
		<div class="logo">
			<a href="index.php"><img src="favicon.png" alt="Inmo.Azteca"></img></a>
		</div>
		<div class="menu">
			<nav>
				<ul class="nav">
					<li><a href="index.php">Inicio</a></li>
					<li><a href="iniciar_sesion.php">Inicia sesión</a></li>
					<li><a href="registro.php">Registrate</a></li>
				</ul>
			</nav>
		</div>
		<div class="cuerpo">
		</div>
		<br />
		<div class="validacion">
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
			</a>
		</div>
	</body>
</html>
';
?>
