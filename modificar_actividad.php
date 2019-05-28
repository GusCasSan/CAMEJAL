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

	$id=$_GET['id'];

	$sql="SELECT * FROM actividades WHERE id = '$id'";
	$result=$conn->query($sql);

	$row= $result->fetch_array(MYSQL_ASSOC);


?>

<script type="text/javascript">
	function abrirPopup() {
		window.location="search_actividad.php";
	}
</script>
<!DOCTYPE html>
<html>
	<head>
		<title>Modificar Actividad</title>
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
			<form action="update_curso.php" method="POST">
		  		<div class="row">
		  			<div class="col-md-4">
						<div class="form-input">
							<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
							<label>Evento</label><br>		
					    	<input type="text" name="evento" required=""  value="<?php echo $row['evento']; ?>" placeholder="Evento" class="form-control">
						</div>
						<br>
						<div class="form-input">
					 		<label>Asunto</label><br>
							<input type="text" name="asunto" placeholder="Asunto"  value="<?php echo $row['asunto']; ?>" class="form-control">
						</div>
						<br>
						<div class="form-input">
							<label>Fecha</label><br>
							<input type="date" name="fecha" step="1"  value="<?php echo $row['fecha']; ?>" class="form-control">
						</div>
						<br>
						<div class="form-input">
					 		<label>Lugar</label><br>
							<input type="text" name="lugar" placeholder="Lugar"  value="<?php echo $row['lugar']; ?>" class="form-control">
						</div>
						<br>
					</div>
					<div class="col-md-4">
						<div class="form-input">
					 		<label>Asistentes</label><br>
							<input type="number" name="asistentes" placeholder="Asistentes"  value="<?php echo $row['asistentes']; ?>" class="form-control">
						</div><br>
						<div class="form-input">
					 		<label>Poblacion Atendida</label><br>
							<input type="number" name="atendidos" placeholder="Poblacion Atendida"  value="<?php echo $row['atendidos']; ?>" class="form-control">
						</div>
						<br>
						<div class="select">
							<label>Tipo de participacion</label><br>
							<select id="lista" name="lista" class="form-control">
								<option value="Ponente"<?php if ($row['tipo_participacion']=='Ponente') {
									echo 'selected';
								}  ?>>Ponente</option>
								<option value="Capacitador"<?php if ($row['tipo_participacion']=='Capasitador') {
									echo 'selected';
								}  ?>>Capacitador</option>
								<option value="Entrevistado"<?php if ($row['tipo_participacion']=='Entrevistado') {
									echo 'selected';
								}  ?>>Entrevistado</option>
								<option value="Alumno"<?php if ($row['tipo_participacion']=='Alumno') {
									echo 'selected';
								}  ?>>Alumno</option>
								<option value="Asistente"<?php if ($row['tipo_participacion']=='Asistente') {
									echo 'selected';
								}  ?>>Asistente</option>
								<option value="Integrante del presidium"<?php if ($row['tipo_participacion']=='Integrante del presidium') {
									echo 'selected';
								}  ?>>Integrante del presidium</option>
								<option value="Invitado especial"<?php if ($row['tipo_participacion']=='Invitado especial') {
									echo 'selected';
								}  ?>>Invitado especial</option>
								<option value="Vinculación y difusión"<?php if ($row['tipo_participacion']=='Vinculación y difusión') {
									echo 'selected';
								}  ?>>Vinculación y difusión</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<label >Material</label><br>
						<div class="form-input">
					 		<label>Libros</label><br>
							<textarea class="form-control" rows="3" value="<?php echo $row['libros']; ?>" name="libros"></textarea>
						</div>
						<br>
						<div class="form-input">
					 		<label>Carteles</label><br>
							<input type="number" name="carteles" placeholder="Numero de carteles" value="<?php echo $row['carteles']; ?>" class="form-control">
						</div>
						<br>
						<div class="form-input">
					 		<label>Dipticos</label><br>
							<input type="number" name="dipticos" placeholder="Numero de Dipticos" value="<?php echo $row['dipticos']; ?>"class="form-control">
						</div>
						<br>
						<div class="form-input">
					 		<label>Cartillas</label><br>
							<input type="number" name="cartillas" placeholder="Numero de Cartillas" value="<?php echo $row['cartillas']; ?>" class="form-control">
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="" style="text-align: center">
					<div class="col-md-6">
						<input class="btn btn-danger" type="submit" name="Aceptar" style="width: 300px" value="Siguiente">
					</div>
					
				</div>
			</form>
			<div class="col-md-6">
				<button class="btn btn-danger" onclick="return abrirPopup();" style="width: 300px"> Salir </button>
			</div>	
		</div>
		<br>
		<br>
	</body>
</html>
