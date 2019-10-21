<?php

session_start();
include_once('conexion_bd.php');
$idcliente=3;
$fechahora= $_POST['fechahora'];
$cantidad= $_POST['cantidad'];

$fechahora = explode(" ",$fechahora);
list($fecha, $hora)=$fechahora;

$result_datos= "INSERT INTO reservas (idcliente, fecha, hora,cantidad_personas) VALUES ('$idcliente', STR_TO_DATE(REPLACE('$fecha','/','.') ,GET_FORMAT(date,'USA')),'$hora','$cantidad')";
$resultado_datos= mysqli_query($mysqli, $result_datos);

/*if(mysqli_query($mysqli, $result_datos)){
	echo 'guardado con exito';
}else{
	echo 'guardado sin exito!';
}*/

if(mysqli_insert_id($mysqli)){
	$_SESSION['msg']= "<div class='alert alert-success'> La Reserva se realizo con exito!</div>";
	header("Location: Formulario_crear_reserva.php");
}else{
	$_SESSION['msg']= "<div class='alert alert-danger'> Error al realizar la Reserva!</div>";
	header("Location: Formulario_crear_reserva.php");
}


?>