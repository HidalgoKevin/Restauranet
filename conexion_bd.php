<?php

	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "php_login_database";
	
    $mysqli=mysqli_connect($server,$user,$pass,$db);   
	 
	 if(!$mysqli){		 
		  echo 'Error al conectarse a la BD: ' . mysqli_connect_errno().PHP_EOL;
		  exit;
	 }
	 
	 
  

?>