<?php
session_start();/*Inicio session_start()*/
//comprueba si se ha autentificado con un usuario
if ($_SESSION["autentificado"] != "si") {
//si no, envio a la página principal
header("Location: ../index.php");
//ademas salgo de este script
exit();
}
?>