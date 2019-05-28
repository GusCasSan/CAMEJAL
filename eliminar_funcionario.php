<?php
$conn= mysqli_connect("localhost","root","1234","prueba");
if (!$conn) {
	die("coneccion fallida" .mysqli_onnect_error());

}
$id=$_GET['id'];
if (isset($_POST['salir'])) {
	header ("Location:Administrador.php"); 
	# code...
}

$sql="DELETE FROM funcionarios WHERE id='$id'";
if (mysqli_query($conn,$sql)) {
header ("Location:search_actividad.php"); 
	
}else{
	echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
}
mysqli_close($conn);
?>