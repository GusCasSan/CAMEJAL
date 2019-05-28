<?php
	$conn= mysqli_connect("localhost","root","1234","prueba");
	if (!$conn) {
		die("coneccion fallida" .mysqli_onnect_error());
	}
	$id_evento=$_POST['id'];

	
	if (isset($_POST['salir'])) {
		header ("Location:secretaria.php"); 
		# code...
	}
	foreach($_POST['funcionarios'] as $id_funcionario) {
		$sql="INSERT INTO actividad_tiene_funcionarios(id_evento,id_funcionario) VALUES('$id_evento','$id_funcionario')";
		if (!mysqli_query($conn,$sql)) {
			echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
		}

	}
	
	mysqli_close($conn);
	header ("Location:Administrador.php"); 
?>