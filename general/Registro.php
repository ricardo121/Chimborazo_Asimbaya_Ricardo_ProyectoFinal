
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Registros.css"/>

  </head>
  <body>

    <div class="container" id="contenedor" >


      <div class="row" >
      <?php if (!isset($_POST["Gmail"])) : ?>




        <form method="post" role="form" id="formulario_registro">
          <legend>Registarte</legend>
          <div class="form-group">
            <label for="ejemplo_email_1">Nombre:</label>
            <input type="text" class="form-control" name="Nombre"
                   placeholder="Introduce tu Nombre" required>
          </div>
          <div class="form-group">
            <label for="ejemplo_email_1">Apellidos:</label>
            <input type="text" class="form-control" name="Apellidos"
                   placeholder="Introduce tus Apellidos" required>
          </div>
          <div class="form-group">
            <label for="ejemplo_email_1">Gmail:</label>
            <input type="email" class="form-control" name="Gmail"
                   placeholder="Introduce tu email" required>
          </div>
          <div class="form-group">
            <label for="ejemplo_password_1">Contraseña</label>
            <input type="Password" class="form-control" name="Password"
                   placeholder="Contraseña" required>
          </div>
          <div class="form-group">
            <label for="ejemplo_email_1">Edad:</label>
            <input type="text" class="form-control" name="Edad"
                   placeholder="Introduce tu Edad" required>
          </div>
          <button type="submit" class="btn btn-default" >Registrase</button>
        </form>
        <form action='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Inicio.php' id="formulario_registro" method='post'>
        <ul class='nav navbar-nav navbar-right'>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'>Volver</button></li>
        </ul>
        </form>



      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else: ?>

        <?php
        //CREATING THE CONNECTION
        $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto",3316);
        $connection->set_charset("uft8");
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        $Nom = $_POST["Nombre"];
        $Ape = $_POST["Apellidos"];
        $Em = $_POST["Gmail"];
        $Pass =  md5($_POST["Password"]);
        $Edad = $_POST["Edad"];
        $query = "INSERT INTO Usuarios(IdUsuario,Nombre,Apellidos,Gmail,Password,Edad)
        VALUES ('NULL','$Nom','$Ape','$Em','$Pass','$Edad')";
        echo $query;
        if ($connection->query($query)) {
          echo "Se ha Registardo en ...";
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Inicio.php');

        } else {
          echo "ERROR AL INSERTAR USUARIO";
        }
        ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
