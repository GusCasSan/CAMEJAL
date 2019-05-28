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
		<title>Nuevo Curso</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/cursos.css">
		<link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
		<div>
      		<img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    	</div>
	</head>
	<body>
		<div class="contenedor">
			<br>
	  		<h1>Nuevo Curso</h1>
			<form action="insertar_curso.php" method="POST">
				<div class="form-input">

					<input type="hidden" name="id_evento" value="<?php echo $id;?>"><br>
					<label>Fecha</label><br><br>		
				    <input type="date" name="fecha" step="1" value="<?php echo date("Y-m-d");?>">
				</div>
				<br><br>
				<div class="form-input">
				 	<label>Nombre del Curso</label><br><br>
					<input type="text" name="nombre" placeholder="Nombre del curso" required="">
				</div>
				<br><br>
				<div class="form-input">
				 	<label>Sede</label><br><br>
					<input type="text" name="sede" placeholder="Sede" required="">
				</div>
				<br><br>
				<div class="form-input">
				 	<label>Personal que asistio</label><br><br>
					<input type="text" name="personal" placeholder="Personal" required="">
				</div>
				<br><br>
				<div class="form-input">
				 	<label>Horas que acredito</label><br><br>
					<input type="number" name="horas" placeholder="Horas que acredito" required="">
				</div>
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
