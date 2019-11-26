<?php
require 'conexion_bd.php';
$idrestaurant=$_POST["ver"];
//GUARDO EL ID DE RESTAURANT EN UNA VARIABLE

//OBTENGO EL RESTAURANTE SELECCIONADO
$result_resto = "SELECT * FROM restaurant WHERE idrestaurant=$idrestaurant";
$resultado_restaurant = mysqli_query($mysqli, $result_resto);
$row_rest = mysqli_fetch_array($resultado_restaurant);

//OBTENGO EL ID DE DIRECCION
$id_dir=$row_rest['id_dir'];

//IMPRIMO LOS DATOS OBTENIDOS
echo "Nombre: ".$row_rest['nombre']."<br>";
echo "Email: ".$row_rest['email']."<br>";
echo "Telefono: ".$row_rest['telefono']."<br>";
echo "Descripcion: ".$row_rest['descripcion']."<br><br><br>";

//AHORA CON EL ID_DIR QUE ESTA EN LOS DATOS OBTENIDOS ANTERIORMENTE TRAIGO LOS DATOS DE ESA TABLA
$result_resto = "SELECT * FROM direccion_rest WHERE id_dir=$id_dir";
$resultado_restaurant = mysqli_query($mysqli, $result_resto);
$row_rest = mysqli_fetch_array($resultado_restaurant);

//YA CON LOS DATOS OBTENIDOS SOLO QUEDA MOSTRARLOS POR PANTALLA
echo "Provincia: ".$row_rest['provincia']."<br>";
echo "Localidad: ".$row_rest['localidad']."<br>";
echo "Direccion: ".$row_rest['direccion']."<br>";


//ACA EN CADA BOTON ASIGNO EL ID DE RESTAURANT PARA MANDARLO AL PHP CORRESPONDIENTE
?>
<form method="POST" id="form_ver_rest_<?php echo $idrestaurant; ?>" action="Formulario_crear_reserva.php">
        <input type="hidden" name="ver" value="<?php echo $idrestaurant; ?>"  />
		<input type="submit" value="Reservar Ya" class="btn btn-success">
 </form>

 <form method="POST" id="form_ver_rest_<?php echo $idrestaurant; ?>" action="funcion_busqueda_listado.php">
        <input type="hidden" name="ver" value="<?php echo $idrestaurant; ?>"  />
		<input type="submit" value="Ver Mas Restaurantes" class="btn btn-success">
<?php
	
 ?>