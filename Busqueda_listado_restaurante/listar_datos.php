<?php

$connect = mysqli_connect("localhost", "root", "", "app_rest");



if(isset($_POST['buscar'])){
	
	$datos=htmlentities($_POST['datos']	);
	$query = "SELECT nombre, direccion, localidad, provincia, descripcion FROM restaurant R INNER JOIN direccion_rest D on R.idrestaurant=D.idrestaurant
	WHERE nombre='$datos' OR localidad='$datos' OR provincia='$datos' ";

$result = mysqli_query($connect, $query);


while($row = mysqli_fetch_assoc($result))
{
 echo 'Datos de Restaurant:'.'<br><br>';
		
		echo "Nombre:     ".$row['nombre']."<br><br>";
		echo "Dirección:  ".$row['direccion'].' '.$row['localidad'].' '.$row['provincia']."<br><br>";
		echo 'Descripción:'.'"...'.$row['descripcion'].'..."'.'<br><br>';
		echo '--------------------------------------------------------------------------------------------------'.'<br>';

}
echo "<a type='button' href='prueba_busqueda_listado.php' target='_blank'>"."<h3>"."Regresar"."<h3>"."</a>";

}
?>