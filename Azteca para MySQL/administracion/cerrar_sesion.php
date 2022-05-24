<?php 
session_start();//inicio session_start()
unset ($_SESSION['administracion']); //borro la variable $_SESSION['administracion']
unset ($_SESSION['autentificado']); //borro la variable $_SESSION['autentificado']
session_destroy();//destruyo la sesion
header('Location: ../index.php'); //le envio a la página principal
?>
