<!doctype html>
<?php 
$con = mysqli_connect("localhost", "root","","restauranet") or die ("Error!"); 
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Ingrese con Google</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 100px">
	
    <div class="row">
		<div class="col-md-3">
		</div>

		<div class="col-md-9">
			<table class="table table-hover table-bordered">
				<tbody>
                    <form method="POST" action="index.php">
                    <a href="insertar.php">Insertar una nueva sucursal</a>
                    <br />
                    <a href="modificar.php">Modificar sucursal</a>
                    <br />
                    <a href="eliminar.php">Eliminar sucursal</a>
                    <br />
                 </form>
                    <?php
                        if(isset($_POST["insert"])){
                            $usuario = $_POST["nombre"];
                            $pass = $_POST["passw"];
                            $email = $_POST["email"];

                            $insertar = "INSERT INTO usuarios (usuario,password,email) VALUES ('$usuario', '$pass', '$email')";
                            $ejecutar = mysqli_query($con, $insertar);

                            if ($ejecutar){
                                echo "<h3>Insertado Correctamente</h3>";
                            }
                        }
                    ?>
				</tbody>
			</table>
            <span class="codigo"> <form action="logout.php" method="post">
              <input type="submit" name="grabar" value ="Salir"></form>  
            </span>
		</div>
	</div>
</div>
</body>
</html>