<?php
require("../conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
include("seguridad.php");//incluimos el fichero de seguridad de que puedan acceder los usuarios que han iniciado sesion
$params = array();
$options = array( "Scrollable" => 'static');
$sql = "SELECT usuario, nombre, apellidos, dni, email, telefono FROM clientes";/*Consulta SQL*/
$result = sqlsrv_query($conn, $sql, $params, $options);/*Hago la consultado y lo guardo en una variable*/
$num_fila = 0; /*Creo la variable a 0 para colorear las filas de la tabla*/
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Clientes - Inmobilaria Azteca</title>
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
		<br />
		<br />
		<div class="cuerpo">';
		if (sqlsrv_num_rows($result) > 0) { /*Si hay rows, muestro la tabla*/
			echo '<table border="1">';
			$fila = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC); /*Hago un fetch y lo guardo en la variable $fila*/
			echo '<tr class="cabecera"><th>Usuario</th><th>Nombre</th><th>Apellidos</th><th>DNI</th><th>E-Mail</th><th>Telefono</th></tr>';
			do {
				echo '<tr ';
				if ($num_fila%2==0) { /*Coloreo las filas de distinto color*/
					echo 'class="blanco"';
				} else {
					echo 'class="gris"';
				}
				echo '>';
				foreach ($fila as $valor) echo '<td>' .$valor .'</td>';
				echo '</tr>';
				$num_fila++;
			} while($fila = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)); /*Muestro todos los datos de la tabla con un bucle*/
			echo '</table>';
		} else { /*Si hay rows, digo que no hay empleados*/
			echo '<h3>No hay clientes</h3>';
		}
		echo '</div>
		<div class="validacion">
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
			</a>
		</div>
	</body>
</html>
';
?>
