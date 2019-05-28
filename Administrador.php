<?php
	$siEs=0;
	session_start();
	if (!isset($_SESSION['rol_user'])) {
	echo '<script> window.location="Login.php"; </script>';
	}else{
		if ($_SESSION['rol_user']=="Capturista") {
			header ("Location:secretaria.php"); 
		}
		if ($_SESSION['name_user']=="ComunicacionSocial") {
			$siEs=1;
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
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
			<li><a href="Administrador.php "><span class=""><i class="icon icon-users"></i></span>Usuarios</a>
			
			<ul>	
				<li><a href= <?php if ($siEs == 1) {
						echo '"#"';
					}else{
						echo '"usuarios.php"';
					}  ?>>Nuevo</a></li>
				<li><a href=<?php if ($siEs == 1) {
					echo '"#"';
				}else{
					echo '"user_search.php"';
					}  ?>>Buscar</a></li>

					<li><a href="nuevo_funcionario.php">Funcionarios</a></li>
				
			</ul>
		     </li>
			<li><a href="#"><span class=""><i class="icon icon-calendar"> </i></span>Eventos</a>
	 			<ul>
					<li><a href="nueva_actividad.php">Nuevo</a></li>
					<li><a href="search_actividad.php">Actividades</a></li>
					<li><a href="estadisticas.php">Estadisticas</a> </li>
					<li><a href="reportes.php">Reportes</a> </li>
					<li><a href="cursos.php">Cursos</a> </li>
					<li><a href="comunicacion.php">Comunicaciones</a> </li>
				</ul>
			</li>
			<li><a href="logout.php"><span class=""><i class="icon icon-power-off"></i></span>Cerrar Secion</a></li>	
			</ul>
		</nav>
	</header>
	<h1 style="text-align: center;">Administrador</h1>
</body>
</html>
