<?php  
	session_start();
	if (!isset($_SESSION['rol_user'])) {
		echo '<script> window.location="Login.php"; </script>';
	}
?>

<script type="text/javascript">
function abrirPopup() {
window.location="Login.php";
}
</script>
<!DOCTYPE html>
<html>
	<head>
		<title>Nueva Actividad</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
		<link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css">
		
		<div>
	    	<img class="cabecera" src="stylesheets/fonts/cabecera.png" />
	    </div>
	</head>
	<body>
		<h1 style="text-align: center">Nueva Actvidad</h1>
		<br>
		<div class="container">
			<form action="insertar_actividad.php" method="POST">
		  		<div class="row">
		  			<div class="col-md-4">
						<div class="form-input">
							<label>Evento</label><br>		
					    	<input type="text" name="evento" required="" placeholder="Evento" class="form-control">
						</div>
						<br>
						<div class="form-input">
					 		<label>Asunto</label><br>
							<input type="text" name="asunto" placeholder="Asunto" class="form-control">
						</div>
						<br>
						<div class="form-input">
							<label>Fecha</label><br>
							<input type="date" name="fecha" step="1" value="<?php echo date("Y-m-d");?>" class="form-control">
						</div>
						<br>
						<div class="form-input">
					 		<label>Lugar</label><br>
							<input type="text" name="lugar" placeholder="Lugar" class="form-control">
						</div>
						<br>
					</div>
					<div class="col-md-4">
						<div class="form-input">
					 		<label>Asistentes</label><br>
							<input type="number" name="asistentes" placeholder="Asistentes" class="form-control">
						</div><br>
						<div class="form-input">
					 		<label>Poblacion Atendida</label><br>
							<input type="number" name="atendidos" placeholder="Poblacion Atendida" class="form-control">
						</div>
						<br>
						<div class="select">
							<label>Tipo de participacion</label><br>
							<select id="lista" name="lista" class="form-control">
								<option value="Ponente">Ponente</option>
								<option value="Capacitador">Capacitador</option>
								<option value="Entrevistado">Entrevistado</option>
								<option value="Alumno">Alumno</option>
								<option value="Asistente">Asistente</option>
								<option value="Integrante del presidium">Integrante del presidium</option>
								<option value="Invitado especial">Invitado especial</option>
								<option value="Vinculación y difusión">Vinculación y difusión</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<label >Material</label><br>
						<div class="form-input">
					 		<label>Total Libros</label><br>
							<input class="form-control" rows="3" name="total_libros" type="number" value=0></input>
						</div>
						<br>
						<div class="form-input">
					 		<label>Libros</label><br>
							<textarea class="form-control" rows="3" name="libros"></textarea>
						</div>
						<br>
						<div class="form-input">
					 		<label>Carteles</label><br>
							<input type="number" name="carteles" placeholder="Numero de carteles" class="form-control">
						</div>
						<br>
						<div class="form-input">
					 		<label>Dipticos</label><br>
							<input type="number" name="dipticos" placeholder="Numero de Dipticos" class="form-control">
						</div>
						<br>
						<div class="form-input">
					 		<label>Cartillas</label><br>
							<input type="number" name="cartillas" placeholder="Numero de Cartillas" class="form-control">
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="" style="text-align: center">
					<div class="col-md-6">
						<input class="btn btn-danger" type="submit" name="Aceptar" style="width: 300px" value="Siguiente">
					</div>
					<div class="col-md-6">
						<button class="btn btn-danger" onclick="return abrirPopup();" style="width: 300px"> Salir </button>
					</div>	
				</div>
			</form>
		</div>
		<br>
		<br>
	</body>
</html>
