<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" bootstrap.css">

  </head>
  <body>

    <div class="container" id="contenedor" >

      <div class="row">
      <h1 style="color:black; text-align: center">Datos del Usuario a Añadir</H1>
      </div>

        <div class="row" >

        <?php if (!isset($_POST["Gmail"])) : ?>
          <form method="post" role="form">
            <div class="form-group">
              <label for="ejemplo_email_1">Nombre:</label>
              <input type="text" name="Nombre" class="form-control"
              placeholder="Introduce Tu Nombre">
           </div>
           <div class="form-group">
             <label for="ejemplo_email_1">Apellidos</label>
             <input type="text" name="Apellidos" class="form-control"
             placeholder="Introduce Tus Apellidos">
          </div>
          <div class="form-group">
            <label for="ejemplo_email_1">Gmail:</label>
            <input type="Email" name="Gmail" class="form-control"
            placeholder="Introduce tu Email">
         </div>
           <div class="form-group">
             <label for="ejemplo_password_1">Contraseña</label>
             <input type="password" name="Password" class="form-control"
              placeholder="Contraseña">
            </div>
            <div class="form-group">
              <label for="ejemplo_email_1">Edad:</label>
              <input type="text" name="Edad" class="form-control"
              placeholder="Introduce tu Edad">
           </div>
            <button type="submit" class="btn btn-default">Enviar</button>
          </form>




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
        $query = "INSERT INTO Usuarios(IdUsuario,Nombre,Apellidos,Gmail,password,Edad)
        VALUES ('NULL','$Nom','$Ape','$Em','$Pass','$Edad')";
        echo $query;
        if ($connection->query($query)) {
          echo "Se ha Registardo en ...";
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Admin_Usuarios.php');

        } else {
          echo "ERROR AL AÑADIR USUARIO";
        }
        ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
