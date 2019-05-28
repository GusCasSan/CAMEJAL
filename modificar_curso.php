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

	$sql="SELECT * FROM curso WHERE id = '$id'";
	$result=$conn->query($sql);

	$row= $result->fetch_array(MYSQL_ASSOC);
?>

<script type="text/javascript">
	function abrirPopup() {
	window.location="user_search.php";
}
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Curso</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/cursos.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
	<div>
      <img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    </div>
</head>
<body>
<div class="contenedor">
<br>

  <h1>Modificar Usario</h1>
	<form action="update_curso.php" method="POST">
		<div class="form-input">
			<label>Fecha</label><br><br>		
		    <input type="date" name="fecha" required=""  value="<?php echo $row['fecha']; ?>">
		</div>
		<br><br>
		<div class="form-input">
		 <label>Nombre</label><br><br>
			<input type="text" name="Nombre" value="<?php echo $row['nombre']; ?>" placeholder="Nombre" required="">
		</div>
		<br><br>
		<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
		<div class="form-input">
		 <label>Sede</label><br><br>
			<input type="text" name="sede" value="<?php echo $row['sede']; ?>" placeholder="Sede" required="">
		</div>
		<br><br>
		<div class="form-input">
		 <label>Personal</label><br><br>
			<input type="text" name="personal" value="<?php echo $row['personal']; ?>" placeholder="Personal" required="">
		</div>
		<br><br>
		<div class="form-input">
		 <label>Horas</label><br><br>
			<input type="text" name="horas" value="<?php echo $row['horas']; ?>" placeholder="Horas" required="">
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
