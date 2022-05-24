<?php
require("../conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
include("seguridad.php");//incluimos el fichero de seguridad de que puedan acceder los usuarios que han iniciado sesion
$params = array();
$options = array( "Scrollable" => 'static');
$sql = "SELECT usuario, nombre, apellidos FROM clientes";/*Consulta SQL*/
$resultado = sqlsrv_query($conn, $sql, $params, $options);/*Hago la consulta*/
	echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Borrar cliente - Inmobilaria Azteca</title>
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
			<h3>Seleccione el empleado</h3>
			<form method="post" enctype="multipart/form-data" action="bor_cli.php">
			Usuario:<br />
';
if (sqlsrv_num_rows($resultado) > 0) { /*Si hay rows en la consulta*/
	echo '<select name="usuario" id="usuario">';
    while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) { /*Hago un fetch para mostrar los empleados en el <option>*/
        echo '<option value="' .$row['usuario']. '">'.$row['nombre'].' '.$row['apellidos'].'</option>';
    }
	echo '</select>
		<br /><br />
		<input type="submit" value="Borrar" name="enviar" id="enviar" class="boton">
		</form>
		</div>';
} else { /*Si no hay rows, digo que no hay clientes*/
    echo '<p>No hay clientes</p>';
}
echo '
		<div class="validacion">
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
			</a>
		</div>
	</body>
</html>
	';
?>
