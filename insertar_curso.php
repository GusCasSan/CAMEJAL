<?php
	$conn= mysqli_connect("localhost","root","1234","prueba");
	if (!$conn) {
		die("coneccion fallida" .mysqli_onnect_error());
	}
	$fecha=$_POST['fecha'];
	$nombre=$_POST['nombre'];
	$sede=$_POST['sede'];
	$personal=$_POST['personal'];
	$horas=$_POST['horas'];
	if (isset($_POST['salir'])) {
		header ("Location:Administrador.php"); 
		# code...
	}

	$sql="INSERT INTO curso (fecha,nombre,sede,personal,horas) VALUES('$fecha','$nombre','$sede','$personal','$horas')";
	if (mysqli_query($conn,$sql)) {
		header ("Location:cursos.php"); 
	}else{
		echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
	}
	mysqli_close($conn);
?>