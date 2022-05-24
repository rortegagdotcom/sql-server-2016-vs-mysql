<?php
require("../conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
include("seguridad.php");//incluimos el fichero de seguridad de que puedan acceder los usuarios que han iniciado sesion
if(isset($_POST['enviar'])){ /*Si han enviado el formulario*/
// Recibimos lo datos del formulario
	$descripcion=$_POST['descripcion'];
	$metros=$_POST['metros'];
	$direccion=$_POST['direccion'];
	$servicio=$_POST['servicio'];
	$sql = "INSERT INTO locales (descripcion, metros, direccion, servicio) VALUES ('$descripcion', '$metros', '$direccion', '$servicio'); SELECT SCOPE_IDENTITY();";/*Consulta SQL*/
	$stmt = sqlsrv_query($conn, $sql);
	if ($stmt) {/*Si todo es correcto en la consulta, guardo los datos en la tabla locales*/
		echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Local creado - Inmobiliaria Azteca</title>
		<link rel="stylesheet" type="text/css" href="../css/azteca.css"></link>
	</head>
	<body>
		<div class="logo">
			<a href="espacio_empleado.php"><img src="../favicon.png" alt="Inmo.Azteca"></img></a>
		</div>
		<div class="menu">
			<nav>
				<ul class="nav">
					<li><a href="espacio_empleado.php">Inicio</a></li>
					<li><a href="casas.php">Casas</a>
						<ul>
							<li><a href="crear_casa.php">Crear casas</a></li>
							<li><a href="modificar_casas.php">Modificar casas</a></li>
							<li><a href="borrar_casa.php">Borrar casas</a></li>
						</ul>
					</li>
					<li><a href="pisos.php">Pisos</a>
						<ul>
							<li><a href="crear_piso.php">Crear pisos</a></li>
							<li><a href="modificar_pisos.php">Modificar pisos</a></li>
							<li><a href="borrar_piso.php">Borrar pisos</a></li>
						</ul>
					</li>
					<li><a href="locales.php">Locales</a>
						<ul>
							<li><a href="crear_local.php">Crear locales</a></li>
							<li><a href="modificar_locales.php">Modificar locales</a></li>
							<li><a href="borrar_local.php">Borrar locales</a></li>
						</ul>
					</li>
					<li><a href="garajes.php">Garajes</a>
						<ul>
							<li><a href="crear_garaje.php">Crear garajes</a></li>
							<li><a href="modificar_garajes.php">Modificar garajes</a></li>
							<li><a href="borrar_garaje.php">Borrar garajes</a></li>
						</ul>
					</li>
					<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
				</ul>
			</nav>
		</div>
		<br />
		<div class="cuerpo">
			<form method="post" enctype="multipart/form-data" action="subir_imagen_local.php">
			Imagen:<br />
				<input type="file" name="archivo[]" multiple="multiple"><br /><br />
				<input type="submit" value="Enviar" class="boton">
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
sqlsrv_next_result($stmt);
sqlsrv_fetch($stmt);
$_SESSION['id_local']=sqlsrv_get_field($stmt, 0);/*Guardo el id del local creado en una variable de sesion*/
	} else { /*Si no, muestro un error al crear el local*/
		echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
		<title>Error - Inmobilaria Azteca</title>
		<link rel="stylesheet" type="text/css" href="../css/azteca.css"></link>
	</head>
	<body>
		<div class="logo">
			<a href="espacio_empleado.php"><img src="favicon.png" alt="Inmo.Azteca"></img></a>
		</div>
		<div class="menu">
			<nav>
				<ul class="nav">
					<li><a href="espacio_empleado.php">Inicio</a></li>
					<li><a href="casas.php">Casas</a>
						<ul>
							<li><a href="crear_casa.php">Crear casas</a></li>
							<li><a href="modificar_casas.php">Modificar casas</a></li>
							<li><a href="borrar_casa.php">Borrar casas</a></li>
						</ul>
					</li>
					<li><a href="pisos.php">Pisos</a>
						<ul>
							<li><a href="crear_piso.php">Crear pisos</a></li>
							<li><a href="modificar_pisos.php">Modificar pisos</a></li>
							<li><a href="borrar_piso.php">Borrar pisos</a></li>
						</ul>
					</li>
					<li><a href="locales.php">Locales</a>
						<ul>
							<li><a href="crear_local.php">Crear locales</a></li>
							<li><a href="modificar_locales.php">Modificar locales</a></li>
							<li><a href="borrar_local.php">Borrar locales</a></li>
						</ul>
					</li>
					<li><a href="garajes.php">Garajes</a>
						<ul>
							<li><a href="crear_garaje.php">Crear garajes</a></li>
							<li><a href="modificar_garajes.php">Modificar garajes</a></li>
							<li><a href="borrar_garaje.php">Borrar garajes</a></li>
						</ul>
					</li>
					<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
				</ul>
			</nav>
		</div>
		<br />
		<div class="cuerpo">
			<h3>No se pudo crear el local</h3>
			<p><a href="crear_piso.php">Volver a intentarlo</a></p>
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
} else { /*Muestro el formulario*/
	echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Crear local - Inmobilaria Azteca</title>
		<link rel="stylesheet" type="text/css" href="../css/azteca.css"></link>
		<script type="text/javascript" src="../js/crear_local.js"></script>
	</head>
	<body>
		<div class="logo">
			<a href="espacio_empleado.php"><img src="../favicon.png" alt="Inmo.Azteca"></img></a>
		</div>
		<div class="menu">
			<nav>
				<ul class="nav">
					<li><a href="espacio_empleado.php">Inicio</a></li>
					<li><a href="casas.php">Casas</a>
						<ul>
							<li><a href="crear_casa.php">Crear casas</a></li>
							<li><a href="modificar_casas.php">Modificar casas</a></li>
							<li><a href="borrar_casa.php">Borrar casas</a></li>
						</ul>
					</li>
					<li><a href="pisos.php">Pisos</a>
						<ul>
							<li><a href="crear_piso.php">Crear pisos</a></li>
							<li><a href="modificar_pisos.php">Modificar pisos</a></li>
							<li><a href="borrar_piso.php">Borrar pisos</a></li>
						</ul>
					</li>
					<li><a href="locales.php">Locales</a>
						<ul>
							<li><a href="crear_local.php">Crear locales</a></li>
							<li><a href="modificar_locales.php">Modificar locales</a></li>
							<li><a href="borrar_local.php">Borrar locales</a></li>
						</ul>
					</li>
					<li><a href="garajes.php">Garajes</a>
						<ul>
							<li><a href="crear_garaje.php">Crear garajes</a></li>
							<li><a href="modificar_garajes.php">Modificar garajes</a></li>
							<li><a href="borrar_garaje.php">Borrar garajes</a></li>
						</ul>
					</li>
					<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
				</ul>
			</nav>
		</div>
		<br />
		<div class="cuerpo">
			<h3>Crear nuevo local</h3>
			<form method="post" enctype="multipart/form-data" onsubmit="return crear_local();">
			Descripcion:<br />
				<textarea name="descripcion" id="descripcion" rows="10" cols="50">Escribe una descripcion del inmueble</textarea><br />
				<span id="error_descripcion" class="error"></span><br />
			Metros cuadrados:<br />
				<input type="text" name="metros" id="metros"><br />
				<span id="error_metros" class="error"></span><br />
			Direccion:<br />
				<input type="text" name="direccion" id="direccion"><br />
				<span id="error_direccion" class="error"></span><br />
			Servicio:<br />
				<input type="text" name="servicio" id="servicio"><br />
				<span id="error_servicio" class="error"></span><br />
			<input type="submit" value="Crear" name="enviar" id="enviar" class="boton">
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
