<?php
	$conn= mysqli_connect("localhost","root","1234","prueba");
	if (!$conn) {
		die("coneccion fallida" .mysqli_onnect_error());
	}
	$id=$_POST['id'];
	$spottv=$_POST['spottv'];
	$spotradio=$_POST['spotradio'];
	$fecha=$_POST['fecha'];
	
	if (isset($_POST['salir'])) {
		header ("Location:Administrador.php"); 
		# code...
	}

	$sql="UPDATE comunicacion SET fecha_mensual='$fecha', spottv='$spottv', spotradio='$spotradio' WHERE id=$id";
	if (mysqli_query($conn,$sql)) {
		header ("Location:comunicacion.php"); 
	}else{
		echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
	}
	mysqli_close($conn);
?>