<?php
  session_start();
  if (!isset($_SESSION['rol_user'])) {
    echo '<script> window.location="Login.php"; </script>';
  }else{
    if ($_SESSION['rol_user']=="Capturista") {
      $siEs=1; 
    }
  }
  // Create connection
  $conn = new mysqli("localhost","root","1234","prueba");
  // Check connection
  if ($conn->connect_error) {
      die("Connexcion mala " . $conn->connect_error);
  } 
  $where="";
  if(!empty($_POST)){

    $valor = $_POST['campo'];
    if (!empty($valor)) {
      $where="WHERE evento='$valor'";
    }
  }
  $sql = "SELECT * FROM actividades $where";
  $result = $conn->query($sql);

  $sql2 = "SELECT * FROM funcionarios";
  $result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Buscar Actividad</title>
    <link rel="stylesheet" type="text/css" href="lola.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/jquery.dataTables.min.css">
  
    <link rel="stylesheet" type="text/css" href="lele_actividades.css">
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
    <script >
      $(document).ready(function() {
        $('#table').DataTable({    
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
          <a href="search_actividad.php">Inicio</a>
          <a href="Administrador.php">Salir</a>
        </form>
      </div>
    </header>
    <section>
      <h1>Actividades</h1>
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0" id="tabla" class="display" >
          <thead>
            <tr>
             <th>id</th> 
              <th>evento</th> 
              <th>asunto</th>
              <th>fecha</th> 
              <th>lugar</th> 
              <th>asistentes</th> 
              <th>atendidos</th>
              <th>tipoAsist</th> 
              <th>libros</th> 
              <th>Carteles</th> 
              <th>dipticos</th>
              <th>cartillas</th>
              <th>funcionarios</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row=$result->fetch_array(MYSQL_ASSOC)) { ?>
              <tr>
              <td style="color:black"><?php echo $row['id']; ?></td>
                <td style="color:black"><?php echo $row['evento']; ?></td>
                <td style="color:black"><?php echo $row['asunto']; ?></td>
                <td style="color:black"><?php echo $row['fecha']; ?></td>
                <td style="color:black"><?php echo $row['lugar']; ?></td>
                <td style="color:black"><?php echo $row['asistentes']; ?></td>
                <td style="color:black"><?php echo $row['atendidos']; ?></td>
                <td style="color:black"><?php echo $row['tipo_participacion']; ?></td>
                <td style="color:black"><?php echo $row['libros']; ?></td>
                <td style="color:black"><?php echo $row['carteles']; ?></td>
                <td style="color:black"><?php echo $row['dipticos']; ?></td>
                <td style="color:black"><?php echo $row['cartillas']; ?></td>     
                <?php
                  $funcionarios = '<td class="table_td_th">';
                  $sqlatf = "SELECT * FROM actividad_tiene_funcionarios WHERE (id_evento=".$row['id'].")";
                  $resultatf = $conn->query($sqlatf);
                  if ($resultatf->num_rows > 0) {
                    while($rowatf = $resultatf->fetch_assoc()) {
                      $sqlf = "SELECT * FROM funcionarios WHERE (id=".$rowatf['id_funcionario'].")";
                      $resultf = $conn->query($sqlf);
                      //se despliega el resultado  
                      if ($resultf->num_rows > 0) {
                        while($rowf = $resultf->fetch_assoc()) {
                          $nombref = (string)$rowf['nombre']." ";
                          $apellido_p = (string)$rowf['apellido_p']." ";
                          $apellido_m = (string)$rowf['apellido_m'];
                          $cargo = (string)$rowf['cargo'];
                          $funcionarios .= $nombref.$apellido_p.$apellido_m.$cargo.', ';
                        }
                      }
                    }
                  }
                  $funcionarios .='</td>';
                  echo $funcionarios; 
                ?>
                
                <td><a href="modificar_actividad.php?id=<?php echo $row['id']; ?>"><img width="25px" height="25px" src="edit.png"></a></td>

                <td><a href= <?php if ($siEs == 1) {
                    echo '"#"';
                  }else{
                    echo '"delete_actividad.php?id="'+$row['id'];
                  }  ?>><img width="25px" height="25px" src="eliminar.png"></a></li>
                
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </section>
    <br>
    <br>
    <section>
      <h1>Funcionarios</h1>
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="display" >
          <thead>
            <tr>
              <th>id</th>  
              <th>nombre</th>
              <th>apelido_p</th> 
              <th>apellido_m</th> 
              <th>cargo</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row2=$result2->fetch_array(MYSQL_ASSOC)) { ?>
              <tr>
                <td style="color:black"><?php echo $row2['id']; ?></td>
                <td style="color:black"><?php echo $row2['nombre']; ?></td>
                <td style="color:black"><?php echo $row2['apellido_p']; ?></td>
                <td style="color:black"><?php echo $row2['apellido_m']; ?></td>
                <td style="color:black"><?php echo $row2['cargo']; ?></td>
                
                <td><a href="modificar_funcionario.php?id=<?php echo $row2['id']; ?>"><img width="25px" height="25px" src="edit.png"></a></td>
                <td><a href="eliminar_funcionario.php?id=<?php echo $row2['id']; ?>"><img width="25px" height="25px" class="delete" src="eliminar.png"></a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </section>
  </body>
</html>