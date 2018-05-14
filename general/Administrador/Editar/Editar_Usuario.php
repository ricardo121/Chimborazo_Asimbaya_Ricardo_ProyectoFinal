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
      <h1 style="color:black; text-align: center">Editar Usuario</H1>
      </div>

      <div class="row" >

      <?php if (!isset($_POST["IdUsuario"])) : ?>

        <?php

        //CREATING THE CONNECTION
        $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto",3316);
        $connection->set_charset("uft8");
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */
            $query="SELECT * from Usuarios  WHERE IdUsuario='".$_GET['editar']."'";
        if ($result = $connection->query($query)) {

          while($obj = $result->fetch_object()) {
            $Nombre_usu =$obj->Nombre;
            $Apellidos = $obj->Apellidos;
            $IdUsuario = $obj->IdUsuario;
            $Administrador = $obj->Administrador;

        }
      }
        ?>

        <form method="post" role="form">
          <div class="form-group">
            <label for="ejemplo_email_1">Nombres_Usuario</label>
            <input type="text" name="Nombre" class="form-control"
            value="<?php echo $Nombre_usu; ?>">
            <label for="ejemplo_email_1">Apellidos_Usuario</label>
            <input type="text" name="Apellidos" class="form-control"
            value="<?php echo $Apellidos; ?>">
            <label for="ejemplo_email_1">Administrador</label>
            <input type="text" name="Administrador" class="form-control"
            value="<?php echo $Administrador; ?>">
            <input type="hidden" name="IdUsuario"  value="<?php echo $IdUsuario; ?>">
          </div>
          <button type="submit" class="btn btn-default">Editar</button>
        </form>
        <form action='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Usuarios.php' method='post'>
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
        $Nombre=$_POST['Nombre'];
        $Apellidos=$_POST['Apellidos'];
        $Administrador=$_POST['Administrador'];
        $cod=$_GET['editar'];

        $query="UPDATE Usuarios SET Nombre='$Nombre',Apellidos='$Apellidos',Administrador='$Administrador'
        WHERE IdUsuario='$cod'";
        echo $query;

        if ($connection->query($query)) {
          echo "Se ha Registardo en ...";
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Usuarios.php');

        } else {
          echo "ERROR AL AÑADIR USUARIO";
        }

        ?>

      <?php endif ?>

  </body>
</html>
