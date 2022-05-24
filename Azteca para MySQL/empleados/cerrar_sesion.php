<?php 
session_start();/*Inicio session_start()*/
unset ($_SESSION['empleado']);/*Borro la variable $_SESSION['empleado']*/
unset ($_SESSION['autentificado']);/*Borro la variable $_SESSION['autentificado']*/
session_destroy();/*Destruyo la sesion*/
header('Location: ../index.php');/*Lo envio a la página principal*/
?>
