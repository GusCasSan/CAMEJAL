<?php
	$conn= mysqli_connect("localhost","root","1234","prueba");
	if (!$conn) {
		die("coneccion fallida" .mysqli_onnect_error());
	}
	$id=$_POST['id'];
	$sede=$_POST['sede'];
	$nombre=$_POST['nombre'];
	$fecha=$_POST['fecha'];
	$personal=$_POST['personal'];
	$horas=$_POST['horas'];
	
	if (isset($_POST['salir'])) {
		header ("Location:Administrador.php"); 
		# code...
	}

	$sql="UPDATE curso SET fecha='$fecha', nombre='$nombre', sede='$sede', personal='$personal', horas='$horas' WHERE id=$id";
	if (mysqli_query($conn,$sql)) {
		header ("Location:cursos.php"); 
	}else{
		echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
	}
	mysqli_close($conn);
?>