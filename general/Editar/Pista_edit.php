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



      <?php if (!isset($_POST["codigo"])) : ?>

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
            $query="SELECT p.*,p.Nombre_Pista from Usuarios u join Pistas p ON u.IdUsuario=p.IdUsuario WHERE p.IdPista='".$_GET['modificar']."'";
        if ($result = $connection->query($query)) {
          echo $query;
          while($obj = $result->fetch_object()) {

            $nom =$obj->Nombre_Pista;
            $gene = $obj->Genero;
            $id = $obj->IdPista;

            echo $query;
        }
      }
        ?>

        <form method="post">
          <fieldset>
            <legend>Personal Info</legend>
            <span>Nombre:</span><input type="text" name="nombre" value="<?php echo $nom; ?>"required><br>
            <span>Genero:</span><input type="text" name="genero" value="<?php echo $gene; ?>" required><br>
              <span><input type="hidden" name="codigo"  value="<?php echo $id; ?>"
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
        $nom=$_POST['nombre'];
        $gene=$_POST['genero'];
        $codigo=$_POST['codigo'];
        $query="Update Pistas SET Nombre_Pista='$nom',
        Genero='$gene'
        WHERE IdPista='$codigo'";


        if ($result = $connection->query($query)) {
          header('Location:  /ricardo/general/editar_canciones.php/');

        } else {
          echo "Error al Modificar Datos de Pistas";
        }


        ?>

      <?php endif ?>

  </body>
</html>
