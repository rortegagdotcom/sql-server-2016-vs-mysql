<?php
require("../conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
include("seguridad.php");//incluimos el fichero de seguridad de que puedan acceder los usuarios que han iniciado sesion
$num_fila=0;
$sql = "SELECT (SELECT archivo FROM imagen_garajes WHERE imagen_garajes.garaje=garajes.id_garaje LIMIT 1) AS 'imagen', id_garaje, descripcion, metros, planta, numero, direccion FROM garajes";
$resultado = mysqli_query($conn, $sql);
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Borrar garaje - Inmobilaria Azteca</title>
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
	echo "<form method='post' enctype='multipart/form-data' action='bg.php'>";
	echo '<table border="1">';
	$fila = mysqli_fetch_assoc($resultado);
	echo '<tr class="cabecera"><th>Imagen</th><th>Id Garaje</th><th>Descripcion</th><th>Metros</th><th>Planta</th><th>Numero</th><th>Direccion</th><th><input type="submit" value="Borrar" id="borrar" name="borrar" class="botontabla"></input></th></tr>';
	do {
		echo '<tr ';
		if ($num_fila%2==0) {
			echo 'class="blanco"';
		} else {
			echo 'class="gris"';
		}
		echo '>';
		$imagen=$fila['imagen'];
		echo "<td><img width='210' height='120' src=../imagenes/garajes/".$fila['imagen']."></img></td>";
		$id_garaje=$fila['id_garaje'];
		echo "<td>" .$fila['id_garaje']. "</td>";
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
		$planta=$fila['planta'];
		echo "<td>".$fila['planta']."</td>";
		$numero=$fila['numero'];
		echo "<td>".$fila['numero']."</td>";
		$direccion=$fila['direccion'];
		echo "<td>".$fila['direccion']."</td>";
		echo "<td><input type='checkbox' name='borra[]' value='$id_garaje'</input></td>";
		echo '</tr>';
		$num_fila++;
	} while ($fila = mysqli_fetch_assoc($resultado));
	echo '</table>';
	echo '</form>';
} else {
	echo '<p>No hay garajes</p>';
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
?>