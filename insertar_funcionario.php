<?php
$conn= mysqli_connect("localhost","root","1234","prueba");
if (!$conn) {
	die("coneccion fallida" .mysqli_onnect_error());
}
$nombre=$_POST['nombre'];
$apellido_P=$_POST['apellido_P'];
$apellido_M=$_POST['apellido_M'];
$cargo=$_POST['cargo'];
if (isset($_POST['salir'])) {
	header ("Location:secretaria.php"); 
	# code...
}

$sql="INSERT INTO funcionarios(nombre,apellido_p,apellido_m,cargo) VALUES('$nombre','$apellido_P','$apellido_M', '$cargo')";
if (mysqli_query($conn,$sql)) {
	header ("Location:Administrador.php"); 
}else{
	echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
}
mysqli_close($conn);
?>