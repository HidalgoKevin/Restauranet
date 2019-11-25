<?php

$connect = mysqli_connect("localhost", "root", "", "app_rest");



if(isset($_POST['buscar'])){
	
	$datos=htmlentities($_POST['datos']	);
	$query = "SELECT nombre, direccion, localidad, provincia, descripcion FROM restaurant R INNER JOIN direccion_rest D on R.idrestaurant=D.idrestaurant
	WHERE nombre LIKE '%".$datos."%' OR localidad LIKE '%".$datos."%' OR provincia LIKE '%".$datos."%' ";

$result = mysqli_query($connect, $query);


while($row = mysqli_fetch_assoc($result))
{
 echo 'Datos de Restaurant:'.'<br><br>';
		
		echo "Nombre:     ".$row['nombre']."<br><br>";
		echo "Dirección:  ".$row['direccion'].' '.$row['localidad'].' '.$row['provincia']."<br><br>";
		echo 'Descripción:'.'"...'.$row['descripcion'].'..."'.'<br><br>';
		echo '--------------------------------------------------------------------------------------------------'.'<br>';

}
echo '<br><br>'.'<input  calss="btn btn-primary" onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';

}
?>