<?php
$conn= mysqli_connect("localhost","root","1234","prueba");
if (!$conn) {
	die("coneccion fallida" .mysqli_onnect_error());

}
$id=$_POST['id'];
$rol=$_POST['lista'];
$pass=$_POST['pass'];
$usuario=$_POST['usuario'];
if (isset($_POST['salir'])) {
	header ("Location:Administrador.php"); 
	# code...
}

$sql="UPDATE usuarios SET nombre='$usuario' ,pass='$pass' ,rol='$rol' WHERE id=$id";
if (mysqli_query($conn,$sql)) {
header ("Location:user_search.php"); 
	
}else{
	echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
}
mysqli_close($conn);
?>