<?php 
require("./conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
/*Recibimos los datos introducidos en iniciar_sesion.php*/
$usuario=$_POST["usuario"];
$contrasena=$_POST["contrasena"];
$md5pass=$contrasena;
$params = array();
$options = array( "Scrollable" => 'static');
$sqlcliente = "SELECT * FROM clientes WHERE usuario = '$usuario' AND contrasena = CONVERT(VARCHAR(50), HASHBYTES('MD5', '$contrasena'), 2)";/*Sentencia SQL que comprueba el usuario y contraseña en la tabla clientes*/
$sqlempleado = "SELECT * FROM empleados WHERE usuario = '$usuario' AND contrasena = CONVERT(VARCHAR(50), HASHBYTES('MD5', '$contrasena'), 2)";/*Sentencia SQL que comprueba el usuario y contraseña en la tabla empleados*/
$sqladministracion = "SELECT * FROM administradores WHERE usuario = '$usuario' AND contrasena = CONVERT(VARCHAR(50), HASHBYTES('MD5', '$contrasena'), 2)";/*Sentencia SQL que comprueba el usuario y contraseña en la tabla administradores*/
$cliente = sqlsrv_query($conn, $sqlcliente, $params, $options);/*Guardamos la consulta realizada en la variable $cliente*/
$empleado = sqlsrv_query($conn, $sqlempleado, $params, $options);/*Guardamos la consulta realizada en la variable $empleado*/
$administracion = sqlsrv_query($conn, $sqladministracion, $params, $options);/*Guardamos la consulta realizada en la variable $administracion*/
if(sqlsrv_num_rows($cliente)!=0) {/*Si hay rows de la consulta $cliente*/
    session_start();/*Inicio session_start()*/
    $_SESSION['cliente']="$usuario";/*Guardo en una variable de sesion en nombre del usuario*/
    if (sqlsrv_num_rows($cliente) > 0) {
		while($row = sqlsrv_fetch_array($cliente, SQLSRV_FETCH_ASSOC)) {/*Saco los datos del usuario*/
			$_SESSION['id_cliente']=$row['id_cliente'];/*Guardo en una variable de session el id del cliente*/
			$_SESSION['nombre_cliente']=$row['nombre'];/*Guardo en una variable de session el nombre del cliente*/
			$_SESSION['apellidos_cliente']=$row['apellidos'];/*Guardo en una variable de session los apellidos del cliente*/
		}
	}
	$_SESSION['autentificado']= "si"; /*Creo la variable $_SESSION['autentificado'] para comprbacion de seguridad*/
    header("Location: clientes/espacio_cliente.php"); /*Le llevo a la página principal de los clientes si inician sesion*/
}
else if(sqlsrv_num_rows($empleado)!=0) {/*Si no hay rows de la consulta $cliente, compruebo con $empleado*/
    session_start();/*Inicio session_start()*/
    $_SESSION['empleado']="$usuario";/*Guardo en una variable de sesion en nombre del usuario*/
    if (sqlsrv_num_rows($empleado) > 0) {
		while($row = sqlsrv_fetch_array($empleado, SQLSRV_FETCH_ASSOC)) {/*Saco los datos del usuario*/
			$_SESSION['id_empleado']=$row['id_empleado'];/*Guardo en una variable de session el id del empleado*/
			$_SESSION['nombre_empleado']=$row['nombre'];/*Guardo en una variable de session el nombre del empleado*/
			$_SESSION['apellidos_empleado']=$row['apellidos'];/*Guardo en una variable de session los apellidos del empleado*/
		}
	}
	$_SESSION['autentificado']= "si"; /*Creo la variable $_SESSION['autentificado'] para comprbacion de seguridad*/
    header("Location: empleados/espacio_empleado.php"); /*Le llevo a la página principal de los empleados si inician sesion*/
}
else if(sqlsrv_num_rows($administracion)!=0) { /*Si no hay rows de la consulta $cliente ni $empleado, compruebo con $administracion*/
    session_start();/*Inicio session_start()*/
    $_SESSION['administracion']="$usuario";/*Guardo en una variable de sesion en nombre del usuario*/
    if (sqlsrv_num_rows($administracion) > 0) {
		while($row = sqlsrv_fetch_array($administracion, SQLSRV_FETCH_ASSOC)) {/*Saco los datos del usuario*/
			$_SESSION['id_admin']=$row['id_admin'];/*Guardo en una variable de session el id del administrador*/
			$_SESSION['nombre_admin']=$row['nombre'];/*Guardo en una variable de session el nombre del administrador*/
			$_SESSION['apellidos_admin']=$row['apellidos'];/*Guardo en una variable de session los apellidos del administrador*/
		}
	}
	$_SESSION['autentificado']= "si";/*Creo la variable $_SESSION['autentificado'] para comprbacion de seguridad*/
    header("Location: administracion/espacio_admin.php");/*Le llevo a la página principal de administracion si inician sesion*/
} else { /*Si no hay rows de la consulta $cliente ni $empleado ni $administracion, le muestro que el usuario y/o contraseña son incorrectos*/
	echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
		<title>Error - Inmobilaria Azteca</title>
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
			<h3>Usuario y/o contraseña incorrectos</h3>
			<p><a href="iniciar_sesion.php">Volver a intentarlo</a></p>
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
