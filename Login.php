<!DOCTYPE html>
<html>
  <head>
    <title>Camejal</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="stylesheets/Login.css">
    <link rel="stylesheet" href="stylesheets/style.css">
    <div>
      <img class="cabecera" src="stylesheets/fonts/cabecera.png" />
    </div>
  </head>
  <body>
    <?php
      require('sesiones.php');
    ?>
    <div class="container">
      <section id="content">
        <form action="Buscar.php" method="POST">
          <h1>Login</h1>
          <div>
            <input type="text" placeholder="Nombre" required="" id="username" name="user_field" />
          </div>
          <div>
            <input type="password" placeholder="Contraseña" required="" id="password" name="pass_field" />
          </div>
          <div>
            <input class="central" type="submit" value="Log in" />
          </div>
        </form><!-- form -->
      </section><!-- content -->
    </div><!-- container -->
  </body>
</html>
