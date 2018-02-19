<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>

      <!-- PHP STRUCTURE FOR CONDITIONAL HTML -->
      <!-- FIRST TIME. NO DATA IN THE POST (checking a required form field) -->
      <!-- So we must show the form -->



      <?php if (!isset($_POST["IdAutor"])) : ?>

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
            $query="SELECT * from Autores  WHERE IdAutor='".$_GET['editar']."'";
        if ($result = $connection->query($query)) {
          echo $query;
          while($obj = $result->fetch_object()) {
            $Nombre =$obj->Nombre_Autor;
            $Id = $obj->IdAutor;

        }
      }
        ?>

        <form method="post">
          <fieldset>
            <legend>Personal Info</legend>
            <span>Nombre_Autor:</span><input type="text" name="Nombre" value="<?php echo $Nombre; ?>"required><br>
              <span><input type="hidden" name="IdAutor"  value="<?php echo $Id; ?>"
              <span><input type="submit" value="Editar" >
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
        $IdAutor=$_POST['IdAutor'];

        $query="UPDATE Autores SET Nombre_Autor='$Nombre'
        WHERE IdAutor='$IdAutor'";
        echo $query;


        if ($connection->query($query)) {
          echo "Se ha Modificado en ...";
          $query ="SELECT * FROM Autores WHERE IdAutor='$IdAutor'";
          if ($result = $connection->query($query)) {
            echo "<table>";


            //FETCHING OBJECTS FROM THE RESULT SET
            //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT

            while($obj = $result->fetch_object()) {

                //PRINTING EACH ROW
                echo "<tr>";
                  echo "<td>".$obj->IdAutor."</td>";
                  echo "<td>".$obj->Nombre_Autor."</td>";
                echo "</tr>";
            }


            echo "</table>";
          }
        } else {
          echo "ERROR AL AÑADIR USUARIO";
        }

        ?>

      <?php endif ?>

  </body>
</html>
