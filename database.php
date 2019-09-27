<?php
	$host="localhost";
	$hostuser="root";
	$password="";
	$hostdb="php_login_database";

	$conexion=mysqli_connect($host,$hostuser,$password,$hostdb);
	if($conexion){
		return "Conectado";
	}else{
		return "No conectado";
	}
?>