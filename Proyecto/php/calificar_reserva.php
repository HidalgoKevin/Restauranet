<?php 
	include("conexion_bd.php");
	$idreserva=$_POST['calificar'];
	//OBTENGO LOS DATOS DE LA RESERVA PARA PODER REALIZAR LA CONSULTA
	$result="SELECT * FROM reservas WHERE ID_RES=$idreserva";
	$resultado=mysqli_query($mysqli,$result);
	$row_resultado=mysqli_fetch_array($resultado);
	$estado=$row_resultado['estado'];
	$idcliente=$row_resultado['idcliente'];
	$idrestaurante=$row_resultado['ID_RES'];
	//HAGO UNA COMÁRACION CON EL ESTADO DE LA RESERVA PARA VER SI PUEDE O NO CALIFICAR
	//ESTADO=1 ES EN EL UNICO CASO EN EL CUAL SE PUEDE CALIFICAR
	if($estado==1){
		echo "Usted no puede Calificar";
		sleep(10);
		header("Location:");
	}else{
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	 <form method="POST" id="form_calificar_<?php echo $idreserva; ?>" action="">
		<label>Comentario<br></label>
		<label for="Comentario"></label><textarea name="comentario" rows="10" cols="70" maxlength="200"></textarea><br><br>
		<label for="Calificacion">Calificacion</label>
		<select name="calificacion">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select><br><br>
		<input type="submit" value="Guardar" class="boton btn"/>
		<input type="hidden" name="calificar" value="<?php echo $idreserva; ?>"/>
	</form>
</body>
</html>
<?php
	if(isset($_POST['comentario']) && isset($_POST['calificacion'])){
	$comentario=$_POST['comentario'];
	$calificacion=$_POST['calificacion'];
	$insert="INSERT INTO calificaciones (ID_US,ID_RES,comentario,estrellas) 
	VALUES ('$idcliente','$idrestaurante','$comentario','$calificacion')";
	if(mysqli_query($mysqli,$insert)){
			echo "Nuevo Registro Creado Exitosamente";
		}else{
			echo "error";
		}
	}
}
?>