<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" bootstrap.css">
  </head>
  <body>

    <div class="container" id="contenedor" >



      <div class="row">
      <h1 style="color:black; text-align: center">Editar Album</H1>
      </div>

      <div class="row" >

      <?php if (!isset($_POST["IdAlbum"])) : ?>

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
            $query="SELECT * from Albums  WHERE IdAlbum='".$_GET['editar']."'";
        if ($result = $connection->query($query)) {
          while($obj = $result->fetch_object()) {
            $Nombre =$obj->Nombre_Album;
            $Id = $obj->IdAlbum;

        }
      }
        ?>

        <form method="post" role="form">
          <div class="form-group">
            <label for="ejemplo_email_1">Nombre_Album</label>
            <input type="text" name="Nombre" class="form-control"
            value="<?php echo $Nombre; ?>">
            <input type="hidden" name="IdAlbum"  value="<?php echo $Id; ?>">
          </div>
            <button type="submit" class="btn btn-default">Editar</button>
        </form>
        <form action='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Albums.php' method='post'>
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
        $IdAlbum=$_POST['IdAlbum'];

        $query="UPDATE Albums SET Nombre_Album='$Nombre'
        WHERE IdAlbum='$IdAlbum'";
        echo $query;


        if ($connection->query($query)) {
          echo "Se ha Modificado en ...";
          $query ="SELECT * FROM Albums WHERE IdAlbum='$IdAlbum'";
          if ($result = $connection->query($query)) {
            echo "<table>";


            //FETCHING OBJECTS FROM THE RESULT SET
            //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT

            while($obj = $result->fetch_object()) {

                //PRINTING EACH ROW
                echo "<tr>";
                  echo "<td>".$obj->IdAlbum."</td>";
                  echo "<td>".$obj->Nombre_Album."</td>";
                echo "</tr>";
            }
            echo "</table>";
            header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Albums.php');
          }
        } else {
          echo "ERROR AL MODIFICAR ALBUM";
        }

        ?>

      <?php endif ?>
      </div>
    </div>
  </body>
</html>
