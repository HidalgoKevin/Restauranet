<?php
	include 'librerias.php'; //carga de archivos bootstrap 4 para el formulario de datos que se muestra
	include 'conexion_bd.php';
	//include 'formulario.php';
	
	//$mysqli = new mysqli("localhost", "root", "", "app_rest");//conecta con la base de datos con servidor, usuario, contraseña, bd
	$q='SELECT * FROM restaurant'; //consulta de datos a la bd
	$resultado=$mysqli->query($q); //aplicamos la consulta y guardamos la accion en uan variable $resultado
	$fila= $resultado->fetch_row();//guardamos el array con los datos en la variable $fila
	
	if(!$fila){
		die('Error en consulta: ' . mysqli_errno());
	}
	
	/*$index=0;
	$nombre='';
	$direccion='';
	$emai='';
	$telefono='';
	$servicio='';
	
	while($index<=5){
		switch ($index){
			case 0:
				$idrestaurant=$fila[$index];
				$index++;
				break;
				
			case 1: 
				$nombre=$fila[$index];
				$index++;
				break;
			case 2:
				$direccion=$fila[$index];
				$index++;
				break;
			case 3:
				$email=$fila[$index];
				$index++;
				break;
			case 4:
				$telefono=$fila[$index];
				$index++;
				break;
			case 5:
				$servicio=$fila[$index];
				$index++;
				break;
		 }
	}*/
	
	
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro del Restaurante</title>
</head>

<body>
    <div class="container" id="advanced-search-form">
        <h2>DATOS:</h2>
        <form action="update_datos.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre de Restaurante</label>
                <input type="text" name="nom" class="form-control" value="<?php echo $fila[1];?>" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="dir" class="form-control" value="<?php echo $fila[2];?>" id="direccion" required>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="tel" class="form-control" value="<?php echo $fila[3];?>" id="telefono" required>
            </div>
            <div class="form-group">
                <label for="Email">E-mail</label>
                <input type="text" name="email" class="form-control" readonly="readonly" value="<?php echo $fila[4];?>" id="Email" required>
            </div><br>       
                <label>Servicio de Reserva</label><br>
                <div class="radio">
                    <label class="radio-inline">
					
					<?php
					if($fila[5]){
					?>
                        <input type="radio" value="si" name="servicio" checked>Si</label>
                    <label class="radio-inline">
                        <input type="radio" value="no" name="servicio">No</label>
					<?php
					}else{?>
						<input type="radio" value="si" name="servicio" >Si</label>
                    <label class="radio-inline">
                        <input type="radio" value="no" name="servicio" checked>No</label>
					<?php
					}
					?>
					
                </div><br>	
            
            <div class="clearfix"></div>
            <input type="submit" name="cambiar" class="btn btn-info btn-lg btn-responsive" value="Guardar cambios"> &nbsp
			<a href="index.php" class="btn btn-info btn-lg btn-responsive btn-danger">Cancelar</a>
        </form>
    </div>
</body>

</html>

<?php
$idrestaurant= $fila[0];
include 'update_datos.php';

?>