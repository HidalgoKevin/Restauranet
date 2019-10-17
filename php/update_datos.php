<?php
		include 'conexion_bd.php';
		
		if(isset($_POST['cambiar'])){	
			
			$nombre = htmlentities($_POST['nom']);
			$direccion = htmlentities($_POST['dir']);
			$telefono = htmlentities($_POST['tel']);
			$email=htmlentities($_POST['email']);
		
			if($_POST['servicio']=='si'){
				$servicio=1;
			}else{
				$servicio=0;
			}
				
			$q="UPDATE restaurant SET nombre='$nombre',direccion='$direccion',telefono='$telefono',servicio_reserva='$servicio' WHERE email= '$email' ";
			
			
			if(mysqli_query($mysqli,$q)){
				echo '<script language="javascript">alert("actualizo perfectamente");window.location.href="modificar.php";</script>';
			}else{
				echo 'Error actualizando: '.mysqli_connect();
			}
		}
		mysqli_close($mysqli);	
?>