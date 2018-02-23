<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" ">
  </head>
  <body>

      <!-- PHP STRUCTURE FOR CONDITIONAL HTML -->
      <!-- FIRST TIME. NO DATA IN THE POST (checking a required form field) -->
      <!-- So we must show the form -->



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
          echo $query;
          while($obj = $result->fetch_object()) {
            $Nombre_usu =$obj->Nombre;
            $Apellidos = $obj->Apellidos;
            $IdUsuario = $obj->IdUsuario;
            $Administrador = $obj->Administrador;

        }
      }
        ?>

        <form method="post">
          <fieldset>
            <legend>Personal Info</legend>
            <span>Nombre:</span><input type="text" name="Nombre" value="<?php echo $Nombre_usu; ?>"required><br>
            <span>Apellidos:</span><input type="text" name="Apellidos" value="<?php echo $Apellidos; ?>" required><br>
            <span>Administrador:</span><input type="text" name="Administrador" value="<?php echo $Administrador; ?>" required><br>
              <span><input type="hidden" name="IdUsuario"  value="<?php echo $IdUsuario; ?>"
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
        $Apellidos=$_POST['Apellidos'];
        $Administrador=$_POST['Administrador'];
        $cod=$_GET['editar'];

        $query="UPDATE Usuarios SET Nombre='$Nombre',Apellidos='$Apellidos',Administrador='$Administrador'
        WHERE IdUsuario='$cod'";
        echo $query;

        if ($connection->query($query)) {
          echo "Se ha Registardo en ...";
          $query ="SELECT * FROM Usuarios";
          if ($result = $connection->query($query)) {
            echo "<table>";


            //FETCHING OBJECTS FROM THE RESULT SET
            //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT

            while($obj = $result->fetch_object()) {

                //PRINTING EACH ROW
                echo "<tr>";
                  echo "<td>".$obj->IdUsuario."</td>";
                  echo "<td>".$obj->Nombre."</td>";
                  echo "<td>".$obj->Gmail."</td>";
                  echo "<td>".$obj->Apellidos."</td>";
                  echo "<td>".$obj->Administrador."</td>";
                  echo "<td>".$obj->Edad."</td>";
                  echo "<td>".$obj->password."</td>";
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
