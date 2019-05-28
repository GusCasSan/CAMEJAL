<?php
session_start();
if (isset($_SESSION['rol_user'])) {
if ($_SESSION['rol_user']=="Administrador") {
		header ("Location:Administrador.php"); 
	}
	if ($_SESSION['rol_user']=="Capturista") {
			header ("Location:secretaria.php"); 
		}	
}

?>