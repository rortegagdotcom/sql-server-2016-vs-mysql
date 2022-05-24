<?php
require("../conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
include("seguridad.php");//incluimos el fichero de seguridad de que puedan acceder los usuarios que han iniciado sesion
if(isset($_POST['enviar'])) {/*Si han enivado el formulario*/
// Recibimos lo datos del formulario
	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];
	$sql = "UPDATE empleados SET contrasena = CONVERT(VARCHAR(50), HASHBYTES('MD5', '$contrasena'), 2) WHERE usuario='$usuario'";/*Consulta SQL*/
	$stmt = sqlsrv_query($conn, $sql);
		if (sqlsrv_rows_affected($stmt) > 0) { /*Si se han actualizado rows con la consulta, muestro que se ha actualizado la contraseña*/
			echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Contraseña cambiada - Inmobiliaria Azteca</title>
		<link rel="stylesheet" type="text/css" href="../css/azteca.css"></link>
	</head>
	<body>
		<div class="logo">
			<a href="espacio_admin.php"><img src="../favicon.png" alt="Inmo.Azteca"></img></a>
		</div>
		<div class="menu">
			<nav>
				<ul class="nav">
					<li><a href="espacio_admin.php">Inicio</a></li>
					<li><a href="empleados.php">Empleados</a>
						<ul>
							<li><a href="crear_empleado.php">Crear empleados</a></li>
							<li><a href="modificar_empleados.php">Modificar empleados</a></li>
							<li><a href="borrar_empleado.php">Borrar empleados</a></li>
							<li><a href="cambiar_contra_empleado.php">Cambiar contraseñas</a></li>
						</ul>
					</li>
					<li><a href="clientes.php">Clientes</a>
						<ul>
							<li><a href="crear_cliente.php">Crear clientes</a></li>
							<li><a href="modificar_clientes.php">Modificar clientes</a></li>
							<li><a href="borrar_cliente.php">Borrar clientes</a></li>
							<li><a href="cambiar_contra_cliente.php">Cambiar contraseñas</a></li>
						</ul>
					</li>
					<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
				</ul>
			</nav>
		</div>
		<br />
		<div class="cuerpo">
			<h3>Contraseña cambiada</h3>
			<p><a href="cambiar_contra_empleado.php">Cambiar contraseña a otro empleado</a></p>
		</div>
		<div class="validacion">
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
			</a>
		</div>
	</body>
</html>
';
		} else { /*Si no, muestro que no se ha cambiado la contraseña*/
			echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Error - Inmobiliaria Azteca</title>
		<link rel="stylesheet" type="text/css" href="../css/azteca.css"></link>
	</head>
	<body>
		<div class="logo">
			<a href="espacio_admin.php"><img src="../favicon.png" alt="Inmo.Azteca"></img></a>
		</div>
		<div class="menu">
			<nav>
				<ul class="nav">
					<li><a href="espacio_admin.php">Inicio</a></li>
					<li><a href="empleados.php">Empleados</a>
						<ul>
							<li><a href="crear_empleado.php">Crear empleados</a></li>
							<li><a href="modificar_empleados.php">Modificar empleados</a></li>
							<li><a href="borrar_empleado.php">Borrar empleados</a></li>
							<li><a href="cambiar_contra_empleado.php">Cambiar contraseñas</a></li>
						</ul>
					</li>
					<li><a href="clientes.php">Clientes</a>
						<ul>
							<li><a href="crear_cliente.php">Crear clientes</a></li>
							<li><a href="modificar_clientes.php">Modificar clientes</a></li>
							<li><a href="borrar_cliente.php">Borrar clientes</a></li>
							<li><a href="cambiar_contra_cliente.php">Cambiar contraseñas</a></li>
						</ul>
					</li>
					<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
				</ul>
			</nav>
		</div>
		<br />
		<div class="cuerpo">
			<h3>No se pudo cambiar la contraseña al empleado</h3>
			<p><a href="cambiar_contra_empleado.php">Volver a intentarlo</a></p>
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
}
?>
