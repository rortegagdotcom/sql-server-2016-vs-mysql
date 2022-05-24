<?php
require("../conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
include("seguridad.php");//incluimos el fichero de seguridad de que puedan acceder los usuarios que han iniciado sesion
$sql = "SELECT (SELECT archivo FROM imagen_casas WHERE imagen_casas.casa=casas.id_casa LIMIT 1) AS 'archivo', id_casa, descripcion, metros, direccion FROM casas WHERE casas.cliente IS NULL AND (SELECT cliente FROM alquiler_casas WHERE alquiler_casas.edificio=casas.id_casa) IS NULL AND (SELECT edificio FROM alquiler_casas WHERE alquiler_casas.edificio=casas.id_casa) IS NOT NULL AND casas.garaje IS NOT NULL";
$resultado = mysqli_query($conn, $sql);
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Casas con garaje en alquiler - Inmobilaria Azteca</title>
		<link rel="stylesheet" type="text/css" href="../css/azteca.css"></link>
	</head>
	<body>
		<div class="logo">
			<a href="espacio_cliente.php"><img src="../favicon.png" alt="Inmo.Azteca"></img></a>
		</div>
		<div class="menu">
			<nav>
				<ul class="nav">
					<li><a href="espacio_cliente.php">Inicio</a></li>
					<li><a href="">Casas</a>
						<ul>
							<li><a href="casas_congar_venta.php">Casas con garaje en venta</a></li>
							<li><a href="casas_singar_venta.php">Casas sin garaje en venta</a></li>
							<li><a href="casas_congar_alquiler.php">Casas con garaje en alquiler</a></li>
							<li><a href="casas_singar_alquiler.php">Casas sin garaje en alquiler</a></li>
						</ul>
					</li>
					<li><a href="">Pisos</a>
						<ul>
							<li><a href="pisos_congar_venta.php">Pisos con garaje en venta</a></li>
							<li><a href="pisos_singar_venta.php">Pisos sin garaje en venta</a></li>
							<li><a href="pisos_congar_alquiler.php">Pisos con garaje en alquiler</a></li>
							<li><a href="pisos_singar_alquiler.php">Pisos sin garaje en alquiler</a></li>
						</ul>
					</li>
					<li><a href="">Locales</a>
						<ul>
							<li><a href="locales_venta.php">Locales en venta</a></li>
							<li><a href="locales_alquiler.php">Locales en alquiler</a></li>
						</ul>
					</li>
					<li><a href="">Garajes</a>
						<ul>
							<li><a href="garajes_venta.php">Garajes en venta</a></li>
							<li><a href="garajes_alquiler.php">Garajes en alquiler</a></li>
						</ul>
					</li>
					<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
				</ul>
			</nav>
		</div>
		<br />
		<div class="cuerpo">
			<h3>Casas con garaje en alquiler</h3>';
if (mysqli_num_rows($resultado) > 0){
	$fila = mysqli_fetch_assoc($resultado);
	do {
		$imagen=$fila['archivo'];
		echo "<img width='420' height='240' src=../imagenes/casas/".$fila['archivo']."></img>";
		$id_casa=$fila['id_casa'];
		$descripcion=$fila['descripcion'];
		echo "<p>".$fila['descripcion']."</p>";
		$metros=$fila['metros'];
		echo "<p>Metros cuadrados: ".$fila['metros']."</p>";
		$direccion=$fila['direccion'];
		echo "<p>Direccion: ".$fila['direccion']."</p>";
		echo "<hr><br />";
	} while ($fila = mysqli_fetch_assoc($resultado));
		echo '</table>';
} else {
	echo '<p>No hay casas</p>';
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