<?php

  session_start();
  include_once("Login_Usu.php");
  Login();

  $Gmail=$_SESSION["Gmail"];



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
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="Estilos_Usuario_Agregar.css"/>

  </head>
  <body>

    <div class="container" id="contenedor" >



      <div class="row" style="background-color: white;" >
        <nav class='navbar navbar-inverse'  role='navigation' style='margin-bottom: 0px ;width=100%' >
          <h2 style="color:white; text-align: center">Añadir Nuevo Album</h2>
        </nav>
      </div>

        <div class="row" style="background-color: #ff6d4e;" >
        <?php if (!isset($_POST["Nombre"])) : ?>
          <form method="post" role="form"   id="formulario_registro">
         <div class="form-group" >
           <label for="ejemplo_email_1" >IdAlbum</label>
           <input type="text" name="Nombre" class="form-control"
           placeholder="Introduce Nombre de Album" >
        </div>
            <button type="submit" class="btn btn-default">Enviar</button>
          </form>
          <form action='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Home_Usu.php' id="formulario_registro" method='post' >
            <ul class='nav navbar-nav navbar-right'>
              <li><button type='submit' class='btn btn-default navbar-btn'  style="margin-right:15%;" >Volver</button></li>
            <ul>
          </form>


      <?php else: ?>

        <?php


        $Nombre = $_POST["Nombre"];
        $query = "INSERT INTO Albums (IdAlbum,Nombre_Album)
        VALUES (NULL,'$Nombre')";


        echo $query;
        if ($connection->query($query)) {
          echo "Se ha Registardo en ...";
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Albums.php');

        } else {
          echo "ERROR AL AÑADIR ALBUM";
        }
        ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
