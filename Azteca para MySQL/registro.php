<?php
require("./conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
if(isset($_POST['enviar'])){/*Si han enivado el formulario*/
// Recibimos lo datos del formulario
	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$apellido2=$_POST['apellido2'];
	$dni=$_POST['dni'];
	$email=$_POST['email'];
	$telefono=$_POST['telefono'];
	$sql = "INSERT INTO clientes (usuario, contrasena, nombre, apellidos, dni, email, telefono) VALUES ('$usuario', md5('$contrasena'), '$nombre', '$apellido $apellido2', '$dni', '$email', '$telefono')"; /*Sentencia SQL*/
	if (mysqli_query($conn, $sql)) { /*Si la consulta se realiza correctamente se registra los datos introducidos del cliente*/
		echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
		<title>Registro completado - Inmobiliaria Azteca</title>
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
		<br />
		<div class="cuerpo">
			<h3>Te has registrado correctamente en Inmobiliaria Azteca</h3>
			<p><a href="iniciar_sesion.php">Iniciar sesión</a></p>
		</div>
		<div class="validacion">
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
			</a>
		</div>
	</body>
</html>
';
	} else { /*Si no, se avisa con un error*/
		echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
		<title>Error - Inmobiliaria Azteca</title>
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
		<br />
		<div class="cuerpo">
			<h3>El registro no se ha enviado correctamente</h3>
			<p><a href="registro.php">Volver a intentarlo</a></p>
		</div>
		<div class="validacion">
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
			</a>
	</body>
</html>
';
	}
} else { /*Formulario del registro*/
	echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
		<title>Registro del cliente - Inmobiliaria Azteca</title>
		<link rel="stylesheet" type="text/css" href="css/azteca.css"></link>
		<script type="text/javascript" src="js/registro.js"></script>
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
		<br />
		<div class="registro">
			<h3>Registrate en Inmobiliaria Azteca</h3>
			<form method="post" enctype="multipart/form-data" onsubmit="return registro();">
			Usuario:<br />
				<input type="text" name="usuario" id="usuario" maxlength="15"><br />
				<span id="error_usuario" class="error"></span><br />
			Contraseña:<br />
				<input type="password" name="contrasena" id="contrasena"><br />
				<span id="error_contrasena" class="error"></span><br />
			Repite la contraseña:<br />
				<input type="password" name="contrasena2" id="contrasena2"><br />
				<span id="error_contrasena2" class="error"></span><br />
			<br /><hr /><br />
			Nombre:<br />
				<input type="text" name="nombre" id="nombre"><br />
				<span id="error_nombre" class="error"></span><br />
			Primer apellido:<br />
				<input type="text" name="apellido" id="apellido"><br />
				<span id="error_apellido" class="error"></span><br />
			Segundo apellido:<br />
				<input type="text" name="apellido2" id="apellido2"><br />
				<span id="error_apellido2" class="error"></span><br />
			DNI:<br />
				<input type="text" name="dni" id="dni" maxlength="9"><br />
				<span id="error_dni" class="error"></span><br />
			Correo electrónico:<br />
				<input type="text" name="email" id="email"><br />
				<span id="error_email" class="error"></span><br />
			Telefono:<br />
				<input type="text" name="telefono" id="telefono" maxlength="9"><br />
				<span id="error_telefono" class="error"></span><br />
			<input type="submit" value="Enviar" name="enviar" id="enviar" class="boton">
			<input type="reset" value="Borrar datos" name="borrar" id="borrar" class="boton">
			</form>
		</div>
		<div class="validacion">
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
			</a>
		</div>
	</body>
</html>
	';
}
?>
