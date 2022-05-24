<?php
session_start();
//compruebo que el usuario esta autentificado
if ($_SESSION["autentificado"] != "si") {
//si no existe, envio a la página de autentificacion
header("Location: ../index.php");
//ademas salgo de este script
exit();
}
?>