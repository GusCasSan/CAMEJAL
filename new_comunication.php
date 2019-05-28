<?php  
	session_start();
	if (!isset($_SESSION['rol_user'])) {
		echo '<script> window.location="Login.php"; </script>';
	}
	$id=$_GET["idEvento"]; 
?>
<script type="text/javascript">
	function abrirPopup() {
		window.location="Login.php";
	}
</script>
<!DOCTYPE html>
<html>
	<head>
		<title>Nueva Comunicacion</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/cursos.css">
		<link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
		<div>
      		<img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    	</div>
	</head>
	<body>
		<div class="contenedor">
			<br>
	  		<h1>Nueva Comunicacion</h1>
			<form action="insert_comunication.php" method="POST">
				<div class="form-input">

					<input type="hidden" name="id_evento" value="<?php echo $id;?>"><br>
					<label>Fecha</label><br><br>		
				    <input type="date" name="fecha" step="1" value="<?php echo date("Y-m-d");?>">
				</div>
				<br><br>
				<div class="form-input">
				 	<label>Spot TV</label><br><br>
					<input type="number" name="spottv" placeholder="Spot Tv" required="">
				</div>
				<br><br>
				<div class="form-input">
				 	<label>Spot Radio</label><br><br>
					<input type="number" name="spotradio" placeholder="Spot Radio" required="">
				</div>
				<br><br>
				
				
				
				<div class="boton">
					<input type="submit" name="Aceptar" value="Siguiente">
					<br>
					<br>
				</div>
			</form>
			<button class="bot" onclick="return abrirPopup();"> Salir </button>
		</div>
	</body>
</html>
