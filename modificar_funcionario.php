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

	$sql="SELECT * FROM funcionarios WHERE id = '$id'";
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
	<title>Modificar Funcionario</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/funcionarios.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
	<div>
      <img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    </div>
</head>
<body>
<div class="contenedor">
<br>

  <h1>Modificar Usario</h1>
	<form action="update_funcionario.php" method="POST">
		<div class="form-input">
			<label>Nombre</label><br><br>		
		    <input type="text" name="nombre" required=""  value="<?php echo $row['nombre']; ?>" placeholder="Nombre">
		</div>
		<br><br>
		<div class="form-input">
		 <label>Apellido Paterno</label><br><br>
			<input type="text" name="apellido_p" value="<?php echo $row['apellido_p']; ?>" placeholder="Apellido Paterno" required="">
		</div>
		<br><br>
		<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
		<div class="form-input">
		 <label>Apellido Materno</label><br><br>
			<input type="text" name="apellido_m" value="<?php echo $row['apellido_m']; ?>" placeholder="Apellido Materno" required="">
		</div>
		<br><br>
		<div class="form-input">
		 <label>Cargo</label><br><br>
			<input type="text" name="cargo" value="<?php echo $row['cargo']; ?>" placeholder="Cargo" required="">
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