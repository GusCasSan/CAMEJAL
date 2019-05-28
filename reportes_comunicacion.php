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

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="stylesheets/botones.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/fuentes.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/tablas.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css">
    <script src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
      function abrirPopup() {
        window.location="comunicacion.php";
      }
    </script>
    <title>Reportes Comunicacion</title>
    <div>
      <img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    </div>
  </head>
  <body>
    <div class="container">
      <form action="comunicacionexcelmensual.php" method="POST">
        <div class="form-input">
          <label>Fecha Inicio</label><br>
          <input type="date" name="fechainicio" step="1" value="<?php echo date("Y");?>" class="form-control">
        </div>
        <br>
        <div  align="center">
          <input class="btn btn-danger" type="submit" name="Aceptar" style="width: 300px" value="Buscar">
        </div>
      </form>
      <br>
      <button  onclick="return abrirPopup();" class="btn btn-danger" style="width: 300px" >Volver</button>
    </div>
   
  </body>
</html>

