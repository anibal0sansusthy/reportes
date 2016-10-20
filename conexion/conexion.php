<?php

	//mysql_connect("Localhost","root","1234");
	//mysql_select_db("primerborrador");
  mysql_connect("173.194.106.24","root","root");
	mysql_select_db("sanson");
 global $hostname_conexion, $database_conexion, $username_conexion, $password_conexion;
//$hostname_conexion = 'mysql.hostinger.com.ar';
//$database_conexion = "u830135838_7div";
//$username_conexion = "u830135838_root";
//$password_conexion = "1nf@nt3ria";
/*
$hostname_conexion = 'localhost';
$database_conexion = "primerborrador";
$username_conexion = "root";
$password_conexion = "1234";
*/
$hostname_conexion = '173.194.106.24';
$database_conexion = "sanson";
$username_conexion = "root";
$password_conexion = "root";
@$conexion = mysqli_connect($hostname_conexion, $username_conexion, $password_conexion) or die ("conexion fallida");
mysqli_select_db($conexion,$database_conexion) or die ("Error al conectarse a la base de  datos".mysqli_error($conexion));

?>