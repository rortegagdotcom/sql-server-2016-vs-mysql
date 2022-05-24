<?php
require("../conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
include("seguridad.php");//incluimos el fichero de seguridad de que puedan acceder los usuarios que han iniciado sesion
if (isset($_POST["modificar"])) {
	$cuales=$_POST["modifica"];
	$id_casa=$cuales[0];
	$sql="SELECT id_local, descripcion, metros, direccion, servicio FROM locales WHERE id_local='$id_local'";
	$resultado = mysqli_query($conn, $sql);
	if (mysqli_num_rows($resultado) > 0) {
		$fila = mysqli_fetch_assoc($resultado);
		$id_local=$fila["id_local"];
		$descripcion=$fila["descripcion"];
		$metros=$fila["metros"];
		$direccion=$fila["direccion"];
		$servicio=$fila["servicio"];
		echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Modificar local seleccionado - Inmobilaria Azteca</title>
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
		<h3>Modificar local</h3>
			<form method="post" enctype="multipart/form-data" action="mod_local.php" onsubmit="return modificar_local();">
			Id Local:<br />
				<input type="text" name="id_local" id="id_local" value="' .$id_local. '" readonly><br />
				<span></span><br />
			Descripcion:<br />
				<textarea name="descripcion" id="descripcion" rows="10" cols="50">'.$descripcion.'</textarea><br />
				<span id="error_descripcion" class="error"></span><br />
			Metros cuadrados:<br />
				<input type="text" name="metros" id="metros" value="' .$metros. '"><br />
				<span id="error_metros" class="error"></span><br />
			Direccion:<br />
				<input type="text" name="direccion" id="direccion" value="' .$direccion. '"><br />
				<span id="error_direccion" class="error"></span><br />
			Servicio:<br />
				<input type="text" name="servicio" id="servicio" value="' .$servicio. '"><br />
				<span id="error_servicio" class="error"></span><br />
			<input type="submit" value="Modificar" name="enviar" id="enviar" class="boton">
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
} else {
	$sql = "SELECT (SELECT archivo FROM imagen_locales WHERE imagen_locales.local=locales.id_local LIMIT 1) AS 'imagen', id_local, descripcion, metros, direccion, servicio FROM locales";
	$resultado = mysqli_query($conn, $sql);
	$num_fila=0;
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Modificar locales - Inmobilaria Azteca</title>
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
		<br />
		<br />
		<div class="cuerpo">
';
if (mysqli_num_rows($resultado) > 0){
	echo "<form method='post' enctype='multipart/form-data' action='modificar_locales.php'>";
	echo '<table border="1">';
	$fila = mysqli_fetch_assoc($resultado);
	echo '<tr class="cabecera"><th>Imagen</th><th>Id Local</th><th>Descripcion</th><th>Metros</th><th>Direccion</th><th>Servicio</th><th><input type="submit" value="Modificar" id="modificar" name="modificar" class="botontabla"></input></th></tr>';
	do {
		echo '<tr ';
		if ($num_fila%2==0) {
			echo 'class="blanco"';
		} else {
			echo 'class="gris"';
		}
		echo '>';
		$imagen=$fila['imagen'];
		echo "<td><img width='210' height='120' src=../imagenes/locales/".$fila['imagen']."></img></td>";
		$id_local=$fila['id_local'];
		echo "<td>" .$fila['id_local']. "</td>";
		echo "<td>";
		$linea=$fila['descripcion'];
		$vector=explode(" ", $linea);
		if (count($vector)>4) {
			$fin=4;
		} else {
			$fin=count($vector);
		}
		for ($i=0;$i<$fin;$i++) echo $vector[$i]." ";
		echo "</td>";
		$metros=$fila['metros'];
		echo "<td>".$fila['metros']."</td>";
		$direccion=$fila['direccion'];
		echo "<td>".$fila['direccion']."</td>";
		$servicio=$fila['servicio'];
		echo "<td>".$fila['servicio']."</td>";
		echo "<td><input type='radio' name='modifica[]' value='$id_local'</input></td>";
		echo '</tr>';
		$num_fila++;
	} while ($fila = mysqli_fetch_assoc($resultado));
	echo '</table>';
	echo '</form>';
} else {
	echo '<p>No hay locales</p>';
}
		echo '
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