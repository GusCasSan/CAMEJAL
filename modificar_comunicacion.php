<?php 
	session_start();
	if (!isset($_SESSION['rol_user'])) {
	echo '<script> window.location="Login.php"; </script>';
	}else{
		if ($_SESSION['rol_user']=="Capturista") {
			header ("Location:secretaria.php"); 
		}
	}
	// Create connection
	$conn = new mysqli("localhost","root","1234","prueba");
	// Check connection
	if ($conn->connect_error) {
	    die("Connexcion mala " . $conn->connect_error);
	} 

	$id=$_GET['id'];

	$sql="SELECT * FROM comunicacion WHERE id = '$id'";
	$result=$conn->query($sql);

	$row= $result->fetch_array(MYSQL_ASSOC);
?>

<script type="text/javascript">
	function abrirPopup() {
	window.location="comunicacion.php";
}
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Comunicacion</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/cursos.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
	<div>
      <img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    </div>
</head>
<body>
<div class="contenedor">
<br>

  <h1>Modificar Comunicacion</h1>
	<form action="update_comunicacion.php" method="POST">
		<div class="form-input">
			<label>Fecha</label><br><br>		
		    <input type="date" name="fecha" required=""  value="<?php echo $row['fecha_mensual']; ?>">
		</div>
		<br><br>
		<div class="form-input">
		 <label>Nombre</label><br><br>
			<input type="text" name="spottv" value="<?php echo $row['spottv']; ?>" placeholder="Nombre" required="">
		</div>
		<br><br>
		<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
		<div class="form-input">
		 <label>Sede</label><br><br>
			<input type="text" name="spotradio" value="<?php echo $row['spotradio']; ?>" placeholder="Sede" required="">
		</div>
		<br><br>
		<div class="boton">
			<input type="submit" name="Aceptar">
			<br>
			<br>
			
		</div>
	</form>
	<button class="bot" onclick="return abrirPopup();"> Salir </button>
</div>

</body>
</html>
