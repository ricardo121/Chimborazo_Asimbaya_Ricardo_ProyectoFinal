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
      <h1 style="color:black; text-align: center">Editar Pista</H1>
      </div>

      <div class="row" >



      <?php if (!isset($_POST["IdPist"])) : ?>

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
            $query="SELECT * from Pistas p
            WHERE p.IdPista='".$_GET['editar']."'";
        if ($result = $connection->query($query)) {

          while($obj = $result->fetch_object()) {
            $Id =$obj->IdPista;
            $Nombre =$obj->Nombre_Pista;
            $Genero = $obj->Genero;
            $IdAlbum = $obj->IdAlbum;
            $IdAutor = $obj->IdAutor;
        }
      }
        ?>


        <form method="post" role="form">

         <div class="form-group">
           <label for="ejemplo_email_1">Nombre_Pista</label>
           <input type="text" name="Nombre" class="form-control"
           value="<?php echo $Nombre; ?>">
           <input type="hidden" name="IdPist"  value="<?php echo $Id; ?>">
         </div>
         <div class="form-group">
           <label for="ejemplo_email_1">Genero</label>
           <input type="text" name="Genero" class="form-control"
           value="<?php echo $Genero; ?>">
         </div>
         <div class="form-group">
           <label for="ejemplo_email_1">IdAlbum</label>

            <?php
              echo "<select name='IdAlbum'>";

              $query="SELECT * FROM Albums";

              if ($result=$connection->query($query)) {
                while($obj=$result->fetch_object()) {
                  echo "<option value='".$obj->IdAlbum."'>";
                  echo $obj->Nombre_Album;
                  echo "</option>";
                }
              } else {
                echo "NO SE HA PODIDO RECUPERAR DATOS DE LOS AUTORES";
              }
              echo "</select>";
            ?>

            </div>

            <div class="form-group">
              <label for="ejemplo_email_1">IdAutor</label>

            <?php
              echo "<select name='IdAutor'>";

              $query="SELECT * FROM Autores";

              if ($result=$connection->query($query)) {
                while($obj=$result->fetch_object()) {
                  echo "<option value='".$obj->IdAutor."'>";
                  echo $obj->Nombre_Autor;
                  echo "</option>";
                }
              } else {
                echo "NO SE HA PODIDO RECUPERAR DATOS DE LOS AUTORES";
              }
              echo "</select>";
            ?>
            </div>
              <button type="submit" class="btn btn-default">Editar</button>
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

        $Nombre=$_POST['Nombre'];
        $Genero=$_POST['Genero'];
        $IdAlbum=$_POST['IdAlbum'];
        $IdAutor=$_POST['IdAutor'];
        $ID=$_POST['IdPist'];

        $query="UPDATE Pistas p SET Nombre_Pista='$Nombre',Genero='$Genero',IdAlbum='$IdAlbum',IdAutor='$IdAutor'
        WHERE p.IdPista='$ID'";
        echo $query;
        echo $ID;


        if ($connection->query($query)) {
          echo "Se ha Modificado en ...";
          header('Location:  /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Pistas.php');

        } else {
          echo "ERROR AL MODIFICAR PISTA";
        }

        ?>

      <?php endif ?>

  </body>
</html>
