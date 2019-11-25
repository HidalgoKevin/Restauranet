
<?php

$connect = mysqli_connect("localhost", "root", "", "app_rest");

$idcliente=3;

$query = "SELECT nombre, comentario, estrellas FROM restaurante R INNER JOIN calificaciones C on R.ID_RES = C.ID_RES
WHERE C.ID_US ='$idcliente' ";


$result = mysqli_query($connect, $query);

echo '--------------------------------------------------------------------------------------------------------------------------------'.'<br>';
echo 'ESTE ES SU HISTORIAL DE CALIFICACIONES: '.'<br>';
echo '--------------------------------------------------------------------------------------------------------------------------------'.'<br><br>';

$row_cnt = mysqli_num_rows($result);
 
if($row_cnt){
	while($row= mysqli_fetch_assoc($result))
	{		
		echo "Restaurante:     ".$row['nombre'].'<br><br>';
		echo 'Comentario: "...'.$row['comentario'].'..."'.'<br>';
		echo 'Estrellas: '.$row['estrellas'].'<br><br>';
		echo '---------------------------------------------------------------------------------------------------------------------------------'.'<br>';
	}
}else{
	echo 'Aun no hiciste ninguna calificacion...';
	}

echo '<br><br>'.'<input  calss="btn btn-primary" onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';

?>