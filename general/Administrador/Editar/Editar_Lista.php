<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
  </head>
  <body>

    <div class="container" id="contenedor" >

      <div class="row">
      <h1 style="color:black; text-align: center">Editar Album</H1>
      </div>

      <div class="row" >



      <?php if (!isset($_POST["IdLista"])) : ?>

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
            $query="SELECT * from Listas  WHERE IdLista='".$_GET['editar']."'";
        if ($result = $connection->query($query)) {

          while($obj = $result->fetch_object()) {
            $Nombre =$obj->Nombre_Lista;
            $Id = $obj->IdLista;

        }
      }
        ?>


        <form method="post" role="form">
          <div class="form-group">
            <label for="ejemplo_email_1">Nombre_Lista</label>
            <input type="text" name="Nombre" class="form-control"
            value="<?php echo $Nombre; ?>">
            <input type="hidden" name="IdLista"  value="<?php echo $Id; ?>">
          </div>
            <button type="submit" class="btn btn-default">Editar</button>
        </form>
        <form action='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Listas.php' method='post'>
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
        $IdLista=$_POST['IdLista'];

        $query="UPDATE Listas
        SET Nombre_Lista='$Nombre'
        WHERE IdLista='$IdLista'";
        echo $query;


        if ($connection->query($query)) {
          echo "Se ha Modificado en ...";
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Listas.php');

        } else {
          echo "ERROR AL MODIFICAR ALBUM";
        }

        ?>

      <?php endif ?>
      </div>
    </div>
  </body>
</html>
