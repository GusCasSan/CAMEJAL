<?php
$conn= mysqli_connect("localhost","root","1234","prueba");
if (!$conn) {
	die("coneccion fallida" .mysqli_onnect_error());

}
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido_p=$_POST['apellido_p'];
$apellido_m=$_POST['apellido_m'];
$cargo=$_POST['cargo'];
if (isset($_POST['salir'])) {
	header ("Location:Administrador.php"); 
	# code...
}

$sql="UPDATE funcionarios SET nombre='$nombre' , apellido_p='$apellido_p' , apellido_m='$apellido_m', cargo='$cargo' WHERE id=$id";
if (mysqli_query($conn,$sql)) {
header ("Location:search_actividad.php"); 
	
}else{
	echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
}
mysqli_close($conn);
?>