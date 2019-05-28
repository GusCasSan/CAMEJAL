<?php
session_start();
if (!isset($_SESSION['rol_user'])) {
	echo '<script> window.location="Login.php"; </script>';
}else{
	if ($_SESSION['rol_user']=="Administrador") {
		header ("Location:Administrador.php"); 
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Capturista</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/botones.css">
		<link rel="stylesheet" type="text/css" href="stylesheets/fuentes.css">
		<link rel="stylesheet" type="text/css" href="stylesheets/style.css">
	    <link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
	    <link rel="stylesheet" type="text/css" href="stylesheets/tablas.css">
		<div>
	      <img class="cabecera" src="stylesheets/fonts/cabecera.png" />
	    </div>
	</head>
	<body>
		<header>
			<nav>
				<ul>
					<li><a href="#"><span class=""><i class="icon icon-calendar"> </i></span>Eventos</a>
			 			<ul>
							<li><a href="nueva_actividad.php">Nuevo</a></li>
							<li><a href="search_actividad.php">Buscar</a></li>
						</ul>
					</li>
					<li><a href="logout.php"><span class=""><i class="icon icon-power-off"></i></span>Cerrar Secion</a></li>	
				</ul>
			</nav>
		</header>
		
		<h1 style="text-align: center;">Capturista</h1>
	</body>
</html>