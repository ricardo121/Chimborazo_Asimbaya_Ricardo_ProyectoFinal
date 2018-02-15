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

            echo $query;
        }
      }
        ?>

        <form method="post">
          <fieldset>
            <legend>Personal Info</legend>
            <span>Nombre:</span><input type="text" name="Nombre_usu" value="<?php echo $Nombre_usu; ?>"required><br>
            <span>Apellidos:</span><input type="text" name="Apellidos" value="<?php echo $Apellidos; ?>" required><br>
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
        //MAKING A UPDATE
        $nombre=$_POST['Nombre_usu'];
        $apellidos=$_POST['Apellidos'];
        $cod=$_GET['editar'];


        $query="Update Usuarios SET Nombre='$nombre',
        Apellidos='$apellidos'
        WHERE IdUsuario='$cod'";

        echo $query;





        ?>

      <?php endif ?>

  </body>
</html>
