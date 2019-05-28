<?php
  session_start();
  if (!isset($_SESSION['rol_user'])) {
    echo '<script> window.location="Login.php"; </script>';
  }else{
    if ($_SESSION['rol_user']=="Capturista") {
      header ("Location:secretaria.php"); 
    }
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
	<title>Nuevos Usuarios</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/usuarios.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
	<div>
      <img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    </div>
</head>
<body>
<div class="contenedor">
<br>

  <h1>Nuevos Usuarios</h1>
	<form action="insertar.php" method="POST">
		<div class="form-input">
			<label>Nombre del usuario</label><br><br>		
		    <input type="text" name="usuario" required="" placeholder="Nombre">
		</div>
		<br><br>
		<div class="form-input">
		 <label>Contraseña</label><br><br>
			<input type="text" name="pass" placeholder="Password" required="">
		</div>
		<br><br>
		<div class="select">
		<label>Tipo de rol</label><br><br>
			<select id="lista" name="lista">
				<option value="Administrador">Administrador</option>
				<option value="Capturista">Capturista</option>
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
