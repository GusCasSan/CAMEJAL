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

	$sql="SELECT * FROM usuarios WHERE id = '$id'";
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
	<title>Modificar Usuario</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/usuarios.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
	<div>
      <img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    </div>
</head>
<body>
<div class="contenedor">
<br>

  <h1>Modificar Usario</h1>
	<form action="update.php" method="POST">
		<div class="form-input">
			<label>Nombre del usuario</label><br><br>		
		    <input type="text" name="usuario" required=""  value="<?php echo $row['nombre']; ?>" placeholder="Nombre">
		</div>
		<br><br>
		<div class="form-input">
		 <label>Contraseña</label><br><br>
			<input type="text" name="pass" value="<?php echo $row['pass']; ?>" placeholder="Password" required="">
		</div>
		<br><br>
		<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
		<div class="select">
		<label>Tipo de rol</label><br><br>
			<select id="lista" name="lista" >
				<option value="Administrador"<?php if ($row['rol']=='Administrador') {

					echo 'selected';
				}  ?> >Administrador</option>
				<option value="Capturista" <?php if ($row['rol']=='Capturista') {

					echo 'selected';
				}  ?>>Capturista</option>
			</select>
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
