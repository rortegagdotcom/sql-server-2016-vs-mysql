<?php
require("./conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
		<title>Inicia sesión - Inmobilaria Azteca</title>
		<link rel="stylesheet" type="text/css" href="css/azteca.css"></link>
		<script type="text/javascript" src="js/iniciar_sesion.js"></script>
	</head>
	<body>
		<div class="logo">
			<a href="index.php"><img src="favicon.png" alt="RestuCars"></img></a>
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
		<br />
		<div class="login">
			<h3>Inicia sesión</h3>
			<form method="post" action="comprobarsesion.php" enctype="multipart/form-data" onsubmit="return iniciar_sesion();">
			Usuario:<br />
				<input type="text" name="usuario" id="usuario" maxlength="15"><br />
				<span id="error_usuario" class="error"></span><br />
			Contraseña:<br />
				<input type="password" name="contrasena" id="contrasena"><br />
				<span id="error_contrasena" class="error"></span><br />
			<input type="submit" value="Iniciar sesion" name="enviar" id="enviar" class="boton">
			</form>
		</div>
		<div class="validacion">
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
			</a>
		</div>
	</body>
</html>
';/*Comprobamos los datos intruducidos en comprobarsesion.php en el atributo action del <form>*/
?>
