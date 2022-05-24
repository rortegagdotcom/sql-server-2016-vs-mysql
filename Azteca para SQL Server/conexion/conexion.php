<?php
$usuario= 'sa';
$pass = 'Inves-1234';
$servidor = 'SQLSERVER'; 
$basedatos = 'inmobiliaria';

$info = array('Database'=>$basedatos, 'UID'=>$usuario, 'PWD'=>$pass); 
$conn = sqlsrv_connect($servidor, $info);  

if(!$conn){
 die( print_r( sqlsrv_errors(), true));
 }
?>