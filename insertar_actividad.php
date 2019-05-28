<?php
	$conn= mysqli_connect("localhost","root","1234","prueba");
	if (!$conn) {
		die("coneccion fallida" .mysqli_onnect_error());
	}
	

	$evento=$_POST['evento'];
	$asunto=$_POST['asunto'];
	$fecha=$_POST['fecha'];
	$lugar=$_POST['lugar'];
	if ($_POST['asistentes']==""){
		$asistentes="0";
	}else{
		$asistentes=$_POST['asistentes'];
	}
	
	if ($_POST['atendidos']==""){
		$atendidos="0";
	}else{
		$atendidos=$_POST['atendidos'];
	}
	$tipoAsist=$_POST['lista'];
	if ($_POST['total_libros']==""){
		$total_libros="0";
	}else{
		$total_libros=$_POST['total_libros'];
	}
	if ($_POST['carteles']==""){
		$carteles="0";
	}else{
		$carteles=$_POST['carteles'];
	}
	$libros=$_POST['libros'];
	if ($_POST['dipticos']==""){
		$dipticos="0";
	}else{
		$dipticos=$_POST['dipticos'];
	}
	if ($_POST['cartillas']==""){
		$cartillas="0";
	}else{
		$cartillas=$_POST['cartillas'];
	}
	
	if (isset($_POST['salir'])) {
		header ("Location:secretaria.php"); 
		# code...
	}
	$sql="INSERT INTO actividades(evento,asunto,fecha,lugar,tipo_participacion,total_libros,libros,carteles,dipticos,cartillas,asistentes,atendidos) VALUES('$evento','$asunto','$fecha','$lugar','$tipoAsist','$total_libros','$libros','$carteles','$dipticos','$cartillas','$asistentes','$atendidos')";
	if (mysqli_query($conn,$sql)) {

		//se envia la consulta
		$sql = "SELECT * FROM actividades";
		$result = $conn->query($sql);
	  
		//se despliega el resultado  
		
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) { 
			    echo "<tr>"; 
			    $idEvento = (string)$row['id'];
			}
		} 	
		header ("Location:escoger_funcionarios.php?idEvento=$idEvento"); 
	
	}else{
		echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
	}
	mysqli_close($conn);
?>