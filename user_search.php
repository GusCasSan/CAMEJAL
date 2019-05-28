<?php
  session_start();
  if (!isset($_SESSION['rol_user'])) {
    echo '<script> window.location="Login.php"; </script>';
  }else{
    if ($_SESSION['rol_user']=="Capturista") {
      header ("Location:secretaria.php"); 
    }
  }
    include("dbtest.php");
  $where="";
  if(!empty($_POST)){

    $valor = $_POST['campo'];
    if (!empty($valor)) {
      $where="WHERE nombre='$valor'";
    }
  }
  $sql = "SELECT id,nombre,pass,rol FROM usuarios $where";
  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Buscar Usuarios</title>
    <link rel="stylesheet" type="text/css" href="lola.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/jquery.dataTables.min.css">
  
    <link rel="stylesheet" type="text/css" href="lele.css">
    <script src="jquery-3.2.1.min.js"></script>
    <script src="jquery.dataTables.min.js"></script>
    <script >
      $(document).ready(function() {
        $('#tabla').DataTable({   
          "language":{
            "lenghtMenu" : "Mostrar _MENU_ registros",
            "info" : "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty" :"(filtrada de _MAX_ registros)",
            "loadingRecords" : "Cargando....",
            "processing" : "Procesando...",
            "search" : "Buscar",
            "zeroRecords" : "No se encontro registros coincidientes",
            "paginate": {
              "next" : "Siguiente",
              "previous" : "Anterior"
            }
          }
        });
      });
    </script>
    <div>
      <img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    </div>
  </head>
  <body>
    <header>
      <div class="navMenu expander">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
          <input type="text" id="campo" name="campo" />

          <a href="user_search.php">Inicio</a>
          <a href="Administrador.php">Salir</a>
        </form>
      </div>
    </header>
    <section>
      <h1>Usuarios</h1>
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0" id="tabla" class="display" >
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Contraseña</th>
              <th>Rol</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
        

   
      <tbody>

        <?php while($row=$result->fetch_array(MYSQL_ASSOC)) { ?>
        <tr>
          <td style="color:black"><?php echo $row['id']; ?></td>
         <td style="color:black"><?php echo $row['nombre']; ?></td>
          <td style="color:black"><?php echo $row['pass']; ?></td>
          <td><?php echo $row['rol']; ?></td>
          <td><a href="modificar.php?id=<?php echo $row['id']; ?>"><img width="25px" height="25px" src="edit.png"></a></td>
          <td><a href="delete_user.php?id=<?php echo $row['id']; ?>"><img width="25px" height="25px" class="delete" src="eliminar.png"></a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</section>

  
  
  </body>
  </html>



