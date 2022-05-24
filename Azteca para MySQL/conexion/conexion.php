<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpass = "inves";
$dbname = "azteca";
$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
if (!$conn) {
	die("Conexión fallida: " . mysqli_connect_error());
}
?>