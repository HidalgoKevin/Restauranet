<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="estilo/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="script/script.js"></script>
    <title>Restauranet</title>
</head>

<body>
<?php
include("../php/conexion_bd.php");

include '../php/librerias.php'; //carga de archivos bootstrap 4 para el formulario de datos que se muestra

$q='SELECT * FROM restaurant'; //consulta de datos a la bd
$resultado=$mysqli->query($q); //aplicamos la consulta y guardamos la accion en uan variable $resultado
$fila= $resultado->fetch_row();//guardamos el array con los datos en la variable $fila
echo json_encode($fila);

if(!$fila){
  //die('Error en consulta: ' . mysqli_errno());
}
	
  
if(isset($_POST['registrar']))
{
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['tel']) && !empty($_POST['tel']))
	{
      echo
		$nombre = $_POST['nombre'];
		$dir=$_POST['dir'];
		$tel = $_POST['tel'];
		$email=$_POST['email'];

		
		$mysqli->query("insert into restaurant(nombre,direccion,telefono,email) VALUES('$nombre','$dir','$tel','$email')") or die(mysqli_connect_errno());
		
		echo "<p style='color:green;'>INSERCION REALIZADA CON EXITO</p><script language='javascript'>window.location.href='../Interfaces/restaurante.php';</script>";
	}
	else
	{
		
	}
}
?>
    <header>
        <nav class="navbar navbar-light navbar-expand-sm bg-light fixed-top">
            <a class="navbar-brand" href="#"><img src="imagen/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                      </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <strong>Bienvenido</strong>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <strong>restaurante</strong>
                        </a>
                        <div class="dropdown-menu">
                            <button id="delete" class="btn btn-outline-primary">Borrar Cuenta</button>
                            <button id="logOff" class="btn btn-outline-primary">Cerrar Sesion</button>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="main">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-sm-1 col-lg-2"></div>
                <div class="col-sm-10 col-lg-8">
                    <ul class="nav nav-tabs nav-justified menuSucursal" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">Sucursales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Agregar nueva sucursal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu3">Modificar sucursal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu4">Quitar sucursal</a>
                        </li>
                    </ul>
                    <div class="tab-content justify-content-center">
                        <div class="tab-pane container active" id="menu1">
                            <table id="tablaSucursales">
                                <tr>
                                    <td>
                                        <div class="media border p-3">
                                            <img src="imagen/restaurante.jpg" alt="sucursal" class="mr-3 mt-3 rounded-circle" width="80" height="80">
                                            <div class="media-body">
                                                <p>Numero sucursal</p>
                                                <p>Direccion</p>
                                                <p>Ciudad</p>
                                                <p>Telefono</p>
                                                <p>Email</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane container fade" id="menu2">
                            <form name="formulario" method="post" action="">
                              <input placeholder="Nombre de Sucursal" type="text" name="nombre" maxlength="50" size="40"><br>
                              <input placeholder="Direccion" type="text" name="dir" maxlength="50" size="40"><br>
                              <input placeholder="Telefono" type="number" name="tel" maxlength="30" size="40"><br>
                              <input placeholder="Email" type="email" name="email" maxlength="30" size="40"><br>
                              <input  type="submit"  value="Registrar" name="registrar">
                            </form>
                        </div>
                        <div class="tab-pane container fade" id="menu3">
                            <div class="container" id="advanced-search-form">
                              <h2>DATOS:</h2>
                              <form action="../php/update_datos.php" method="post">
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
                                          <label class="radio-inline">
                                              <input type="radio" value="si" name="servicio" >Si</label>
                                          <label class="radio-inline">
                                              <input type="radio" value="no" name="servicio" checked>No</label>
                                          <?php
                                          }
                                          ?>

                                      </div>	

                                  <div class="clearfix"></div>
                                  <input type="submit" name="cambiar" class="btn btn-info btn-lg btn-responsive" value="Guardar cambios"> &nbsp
                                  <a href="index.php" class="btn btn-info btn-lg btn-responsive btn-danger">Cancelar</a>
                              </form>
                          </div>
                        </div>
                        <div class="tab-pane container fade" id="menu4">
                                <div class="input-group mb-3">
                                    <?php
ob_start();
$IDu = -1;
		
		$consulta = $mysqli->query("SELECT * FROM restaurant");
		
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
                      <?php echo "<input type='hidden' name='id' value=".$IDu."/>" ?>
                      <input type="submit" value="Eliminar" name="eliminar" />
                    </form>
                </td>
			  </tr>
<?php
			
			
		}
		
if(isset($_POST['eliminar']))
{
  $id = $_POST['id'];
  $mysqli->query("DELETE FROM restaurant WHERE id ='$id'");
  
  echo "<script language='javascript'>window.location.href='../Interfaces/restaurante.php';</script>";
}


?>
</table>
                                </div>
                        </div>
                    </div>

                    <div class="col-sm-1 col-lg-2"></div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-light navbar-expand-sm bg-light fixed-bottom justify-content-center">
                    <p><strong>Grupo 4 - Desarrollo de software 2019</strong></p>
                </nav>
            </div>
        </div>
    </footer>


</body>

</html>