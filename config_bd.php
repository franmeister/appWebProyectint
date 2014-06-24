<?php
// Configuración de la BDD que utilizará la aplicación web
$servidor_bd="10.10.2.2";
$nombre_bd="db_proyectint";
$usuario_bd="user_proyectint";
$pass_bd="12Proyectint34*";
$con = mysql_connect($servidor_bd,$usuario_bd,$pass_bd) or die (mysql_error());
mysql_select_db($nombre_bd,$con) or die (mysql_error());
return $con;
?>