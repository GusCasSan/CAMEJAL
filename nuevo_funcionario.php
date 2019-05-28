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
		<title>Nuevos Funcionario</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/funcionarios.css">
		<link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
		<div>
      		<img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    	</div>
	</head>
	<body>
		<div class="contenedor">
			<br>
	  		<h1>Nuevo Funcionario</h1>
			<form action="insertar_funcionario.php" method="POST">
				<div class="form-input">

					<br>
					<label>Nombre</label><br><br>		
				    <input type="text" name="nombre" required="" placeholder="Nombre">
				</div>
				<br><br>
				<div class="form-input">
				 	<label>Apellido Paterno</label><br><br>
					<input type="text" name="apellido_P" placeholder="Paterno" required="">
				</div>
				<br><br>
				<div class="form-input">
				 	<label>Apellido Materno</label><br><br>
					<input type="text" name="apellido_M" placeholder="Materno" required="">
				</div>
				<br><br>
				<div class="form-input">
				 	<label>Cargo</label><br><br>
					<input type="text" name="cargo" placeholder="Cargo" required="">
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
