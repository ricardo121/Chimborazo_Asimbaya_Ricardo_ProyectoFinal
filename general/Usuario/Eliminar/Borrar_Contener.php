<?php

  session_start();
  include_once("Login_Usu.php");
  Login();


?>

 <?php

       //CREATING THE CONNECTION
       $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto",3316);
       $connection->set_charset("uft8");
       //TESTING IF THE CONNECTION WAS RIGHT
       if ($connection->connect_errno) {
           printf("Connection failed: %s\n", $connection->connect_error);
           exit();
       }


?>

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


        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */
        var_dump($_GET);

        $query="SET FOREIGN_KEY_CHECKS=0";
        $connection->query($query);

        $query="DELETE from Contener where IdLista='".$_GET["borrar2"]."' and IdPista='".$_GET["borrar1"]."'";
        echo $query;
        if ($result = $connection->query($query)) {
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Listas.php');

        } else {
          echo "Error al Borrar los datos";
        }

        ?>



  </body>
</html>
