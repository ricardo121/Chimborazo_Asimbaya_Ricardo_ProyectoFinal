
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
          echo "No se han recibido datos del reparaciones";
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




        $query="SET FOREIGN_KEY_CHECKS=0";
        $connection->query($query);

        $query="DELETE from Contener where IdLista='".$_GET["borrar2"]."' and IdPista='".$_GET["borrar1"]."'";

        if ($result = $connection->query($query)) {
          header('Location: /ricardo/general/Admin_Listas.php');

        } else {
          echo "Error al Borrar los datos";
        }

        ?>






  </body>
</html>
