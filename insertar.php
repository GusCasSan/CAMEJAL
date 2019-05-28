<?php
$conn= mysqli_connect("localhost","root","1234","prueba");
if (!$conn) {
	die("coneccion fallida" .mysqli_onnect_error());

}
$rol=$_POST['lista'];
$pass=$_POST['pass'];
$usuario=$_POST['usuario'];
if (isset($_POST['salir'])) {
	header ("Location:Administrador.php"); 
	# code...
}

$sql="INSERT INTO usuarios(nombre,pass,rol) VALUES('$usuario','$pass','$rol')";
if (mysqli_query($conn,$sql)) {
header ("Location:Administrador.php"); 
	
}else{
	echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
}
mysqli_close($conn);
?>