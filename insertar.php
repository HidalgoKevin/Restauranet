<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insertar PHP</title>
</head>
<body>

<?php
include("conexion_bd.php");

if(isset($_POST['registrar']))
{
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['tel']) && !empty($_POST['tel']))
	{
		$nombre = $_POST['nombre'];
		$dir=$_POST['dir'];
		$tel = $_POST['tel'];
		$email=$_POST['email'];

		
		$mysqli->query("insert into restaurant(nombre,direccion,telefono,email) VALUES('$nombre','$dir','$tel','$email')") or die(mysqli_connect_errno());
		
		echo "<p style='color:green;'>INSERCION REALIZADA CON EXITO</p>";
	}
	else
	{
		
	}
}
?>
<form name="formulario" method="post" action="">
     
    <input placeholder="Nombre de Sucursal" type="text" name="nombre" maxlength="50" size="40"><br></br>    
    <input placeholder="Direccion" type="text" name="dir" maxlength="50" size="40"><br></br>
    <input placeholder="Telefono" type="number" name="tel" maxlength="30" size="40"><br></br>
    <input placeholder="Email" type="email" name="email" maxlength="30" size="40"><br></br>

    <input  type="submit"  value="Registrar" name="registrar">
    
</form>
<br />
<a href="index.php">Regresar</a>

</body>
</html>