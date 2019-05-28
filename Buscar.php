<?php
// Create connection
$conn = new mysqli("localhost","root","1234","prueba");
// Check connection
if ($conn->connect_error) {
    die("Connexcion mala " . $conn->connect_error);
} 

session_start();

$sql = "SELECT id,nombre,pass,rol FROM usuarios";
$result = $conn->query($sql);
$usuario=$_POST['user_field'];
$pass=$_POST['pass_field'];
$bandera=0;
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        if ($row['nombre']==$usuario && $row["pass"]==$pass) {
        	echo "entre";
        	if ($row['rol']=="Administrador") {
        		$_SESSION['id_user']=$row['id'];
        		$_SESSION['rol_user']=$row['rol'];
                $_SESSION['name_user']=$row['nombre'];


        		header ("Location:Administrador.php"); 
                echo '<script> window.location="Administrador.php"; </script>';
        	}
        	if ($row['rol']=="Capturista") {
        		$_SESSION['id_user']=$row['id'];
                $_SESSION['rol_user']=$row['rol'];

        		header ("Location:secretaria.php");
                 echo '<script> window.location="secretaria.php"; </script>'; 
        	}
        }else{
         

            echo '<script> window.location="Login.php"; </script>';
        }

    }
    
    
} else {
    echo "0 results";
}


$conn->close();
?>