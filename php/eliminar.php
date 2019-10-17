<?php
ob_start();
include("conexion_bd.php");

		
		$consulta = $mysqli->query("SELECT * FROM restaurant") or die(mysqli_error());
		
?>

			<table width="40%" border="1">
            <tr>
				<td>Nombre</td>
				<td>Direccion</td>
				<td>Telefono</td>
				<td>Email</td>
                <td>Accion</td>
			  </tr>
<?php
		
		while($filas = mysqli_fetch_array($consulta))
		{	
			$IDu=$filas['id'];
			$user=$filas['nombre'];
			$direccion=$filas['direccion'];
			$telefono=$filas['telefono'];
			$email=$filas['email'];
			
?>
			  <tr>
				<td><?php echo "<p style='color:#666;'>".$user."</p>";?></td>
				<td><?php echo "<p style='color:#666;'>".$direccion."</p>";?></td>
				<td><?php echo "<p style='color:#666;'>".$telefono."</p>";?></td>
				<td><?php echo "<p style='color:#666;'>".$email."</p>";?></td>
                <td>
                	<form method="post" action="">
                    	<input type="submit" value="Eliminar" name="eliminar" />
                    </form>
                </td>
			  </tr>
<?php
			
			
		}
		
		
if(isset($_POST['eliminar']))
{
		
		$mysqli->query("DELETE FROM restaurant WHERE id ='$IDu'") or die(mysql_error());
		
		header('refresh: 1; url=eliminar.php');
		
		echo "<p style='color:green;'>ELIMINACION REALIZADA CON EXITO</p>";
}


?>
</table>
<br />
<a href="index.php">Regresar</a>

</body>
</html>