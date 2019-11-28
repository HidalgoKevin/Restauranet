<?php

$connect = mysqli_connect("localhost", "root", "", "app_rest");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "SELECT nombre, localidad, provincia FROM restaurant R INNER JOIN direccion_rest D on R.idrestaurant=D.idrestaurant
WHERE nombre LIKE '%".$request."%' OR localidad LIKE '%".$request."%' OR provincia LIKE '%".$request."%'";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
	if($row["nombre"]){$data[] = $row["nombre"];}
	if($row["localidad"]){$data[] = $row["localidad"];}
	if($row["provincia"]){$data[] = $row["provincia"];}
  
 }
 echo json_encode($data);
}

?>