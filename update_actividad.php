<?php
	$conn= mysqli_connect("localhost","root","1234","prueba");
	if (!$conn) {
		die("coneccion fallida" .mysqli_onnect_error());
	}
	$id=$_POST['id'];
	$evento=$_POST['evento'];
	$asunto=$_POST['asunto'];
	$fecha=$_POST['fecha'];
	$lugar=$_POST['lugar'];
	$asistentes=$_POST['asistentes'];
	$atendidos=$_POST['atendidos'];
	$tipoAsist=$_POST['lista'];
	$libros=$_POST['libros'];
	$carteles=$_POST['carteles'];
	$dipticos=$_POST['dipticos'];
	$cartillas=$_POST['cartillas'];
	if (isset($_POST['salir'])) {
		header ("Location:Administrador.php"); 
		# code...
	}

	$sql="UPDATE actividades SET evento='$evento', asunto='$asunto', fecha='$fecha', lugar='$lugar', asistentes='$asistentes', atendidos='$atendidos', tipo_participacion='$tipoAsist', libros='$libros', carteles='$carteles', dipticos='$dipticos', cartillas='$cartillas' WHERE id=$id";
	if (mysqli_query($conn,$sql)) {
		header ("Location:search_actividad.php"); 
	}else{
		echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
	}
	mysqli_close($conn);
?>