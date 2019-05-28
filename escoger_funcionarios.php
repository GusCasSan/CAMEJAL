<?php  
	session_start();
	if (!isset($_SESSION['rol_user'])) {
		echo '<script> window.location="Login.php"; </script>';
	}
	// Create connection
	$conn = new mysqli("localhost","root","1234","prueba");
	// Check connection
	if ($conn->connect_error) {
	    die("Connexcion mala " . $conn->connect_error);
	} 

	$id=$_GET['idEvento'];

	$sql="SELECT * FROM funcionarios";
	$result=$conn->query($sql);


?>

<script type="text/javascript">
	function abrirPopup() {
		window.location="search_actividad.php";
	}
</script>
<!DOCTYPE html>
<html>
	<head>
		<title>Escoger Funcionarios</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
		<link rel="stylesheet" type="text/css" href="combobox.css">
		<div>
      		<img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    	</div>
	</head>
	<body>
		<div class="contenedor">
			<br>
	  		<h1 style="text-align: center;">Escoger funcionarios</h1>
	  		
			<form action="agregar_funcionarios.php" method="POST">
				<input type="hidden" id="id_evento" name="id" value="<?php echo $id; ?>">
				<?php while($row=$result->fetch_array(MYSQL_ASSOC)) { ?>
				
					<input type="checkbox" name="funcionarios[]" value=<?php echo '"'.$row['id'].'"'; ?>><?php echo $row['nombre']; ?>
				
					<br><br>
				<?php } ?>
				<br><br>
				<div class="boton">
					<input type="submit" name="Aceptar" value="Siguiente">
					<br>
					<br>
				</div>
			</form>
			
		</div>
	</body>
</html>







