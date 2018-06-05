
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" ">

  </head>
  <body>


      <?php
        if (empty($_GET)) {
          echo "No se han recibido datos ";
          exit();
        }
      ?>



        <?php

        $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto",3316);
        $connection->set_charset("uft8");
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */

        $query="UPDATE Pistas p SET IdAlbum=NULL
        WHERE p.IdPista='".$_GET["borrar"]."'";
        echo $query;
        if ($result = $connection->query($query)) {
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Albums.php');

        } else {
          echo "Error al Borrar los datos";
        }

        ?>



  </body>
</html>
