<?php
	$conn= mysqli_connect("localhost","root","1234","prueba");
	if (!$conn) {
		die("coneccion fallida" .mysqli_onnect_error());
	}
	$fecha=$_POST['fecha'];
	$spottv=$_POST['spottv'];
	$spotradio=$_POST['spotradio'];
	
	if (isset($_POST['salir'])) {
		header ("Location:Administrador.php"); 
		# code...
	}

	$sql="INSERT INTO comunicacion (spottv,spotradio,fecha_mensual) VALUES('$spottv','$spotradio','$fecha')";
	if (mysqli_query($conn,$sql)) {
		header ("Location:comunicacion.php"); 
	}else{
		echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
	}
	mysqli_close($conn);
?>