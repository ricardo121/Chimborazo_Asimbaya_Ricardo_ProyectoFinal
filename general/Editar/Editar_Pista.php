<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" ">
  </head>
  <body>





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
          echo $query;
          while($obj = $result->fetch_object()) {
            $Id =$obj->IdPista;
            $Nombre =$obj->Nombre_Pista;
            $Genero = $obj->Genero;
            $Pista = $obj->Pista;
            $IdAlbum = $obj->IdAlbum;
            $IdAutor = $obj->IdAutor;
        }
      }
        ?>

        <form method="post">
          <fieldset>
            <legend>Personal Info</legend>
            <span>Nombre_Pista:</span><input type="text" name="Nombre" value="<?php echo $Nombre; ?>"required><br>
            <span>Genero:</span><input type="text" name="Genero" value="<?php echo $Genero; ?>" required><br>
            <span>Pista:</span><input type="text" name="Pista" value="<?php echo $Pista; ?>" required><br>
            <span>IdAlbum:</span>
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
            <input type="text" name="IdAlbum" value="<?php echo $IdAlbum; ?>" ><br>
            <span>IdAutor:</span>
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
              <span><input type="hidden" name="IdPist"  value="<?php echo $Id; ?>">
              <span><input type="submit" value="Editar">
          </fieldset>
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
        $Genero=$_POST['Genero'];
        $Pista=$_POST['Pista'];
        $IdAlbum=$_POST['IdAlbum'];
        $IdAutor=$_POST['IdAutor'];
        $ID=$_POST['IdPist'];

        $query="UPDATE Pistas p
        join Contener c ON p.IdPista=c.IdPista
        SET Nombre_Pista='$Nombre',Genero='$Genero',Pista='$Pista',IdAlbum='$IdAlbum',IdAutor='$IdAutor',IdLista='$IdLista'
        WHERE p.IdPista='$ID'";
        echo $query;
        echo $ID;


        if ($connection->query($query)) {
          echo "Se ha Modificado en ...";
          $query ="SELECT * from Pistas p join Contener c ON p.IdPista=c.IdPista
          WHERE p.IdPista='$ID'";
          if ($result = $connection->query($query)) {
            echo "<table>";


            //FETCHING OBJECTS FROM THE RESULT SET
            //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT

            while($obj = $result->fetch_object()) {

                //PRINTING EACH ROW
                echo "<tr>";
                  echo "<td>".$obj->IdPista."</td>";
                  echo "<td>".$obj->Nombre_pista."</td>";
                  echo "<td>".$obj->Genero."</td>";
                  echo "<td>".$obj->Pista."</td>";
                  echo "<td>".$obj->IdAlbum."</td>";
                  echo "<td>".$obj->IdAutor."</td>";
                echo "</tr>";
            }


            echo "</table>";
          }
        } else {
          echo "ERROR AL MODIFICAR PISTA";
        }

        ?>

      <?php endif ?>

  </body>
</html>
