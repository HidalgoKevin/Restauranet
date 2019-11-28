<?php
	session_start();
	echo '<pre>','<h3>',"Funcion Buscar Reserva Restauranet (Admin)<br>",'</h3>','</pre>';
	date_default_timezone_set('America/Argentina/Buenos_Aires');	
	$fecha_actual= date('d-m-Y');

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> <!--libreria para el .$ajax-->
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<!--script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"-->
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>

<br>
<br>
<br>

<div class="container">

		<h3>Listados de Reservas</h3>

		<!-- Bootstrap Nav tabs -->
		
		<ul class="nav nav-tabs">
		  <li class="nav-item col-sm-4 ">
		  <a class="nav-link active" id="hoytab" data-toggle="tab" href="#hoy" aria-controls="hoy" aria-selected="true">RESERVAS DE HOY: <?php echo $fecha_actual;?></a>
		  </li>
		  <li class="nav-item col-sm-4">
			<a class="nav-link" id="mestab" data-toggle="tab" href="#mes" aria-controls="mes" aria-selected="true">ELEGIR MES - DIA</a>
		  </li>
		  <li class="nav-item col-sm-4">
			<a class="nav-link" id="todastab" data-toggle="tab" href="#todas" aria-controls="todas" aria-selected="true">TODAS LAS RESERVAS</a>
		  </li>
		</ul>
		
		<!-- Contenidos de los tabs -->
		<div class="tab-content">
		
			<div class="tab-pane fade show active" id="hoy" aria-labelledby="hoy-tab"><?php $mostrarflag= true; include('mostrar_reservasHtml.php')?></div>
			
			<div class="tab-pane fade" role="tabpanel" id="mes" aria-labelledby="mes-tab"><br>							
				
				<input type="text" name="fechareservas" id="datepicker" placeholder="Elija el MES y el DIA" autocomplete="off" readonly>				
				<button type="button" id="mostrar" class="btn btn-info">Mostrar</button>					
				<p id="respa"/>
				
			</div>
			
		   <div class="tab-pane fade show" id="todas" aria-labelledby="todas-tab"><?php $mostrarflag= false; include('mostrar_reservasHtml.php')?></div>
		 </div>

		</div>
</body>

<script>
	$(function(){
		$("#datepicker").datepicker({
			dateFormat: "dd-mm-yy",
			minDate: 0,
			maxDate:'+3Y',
		});
	});
</script>
<script>
	$(document).ready(function(){
	$('#mostrar').click(function(){
			$.ajax({
			    type:'GET', //aqui puede ser igual get
				url: 'mostrar_reservasHtml.php',//aqui va tu direccion donde esta tu funcion php
				data: {fechareservas:$('#datepicker').val()},//aqui tus datos
				success:function(data){
					$("#respa").html(data);//lo que devuelve tu archivo mifuncion.php
			   }
			   /*error:function(){
				console.log('error con la peticion!')//lo que devuelve si falla tu archivo mifuncion.php
			   }*/
			 });
		});
	});
</script>
</html>