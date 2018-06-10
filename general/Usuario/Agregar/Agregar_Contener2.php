
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
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Usuario_Agregar.css"/>

  </head>
  <body>

    <?php



    $query="SELECT * from Usuarios  WHERE Gmail='$Gmail'";


    if ($result = $connection->query($query)) {


        while($obj = $result->fetch_object()) {

            $Edad_usu =$obj->Edad;
            $Nombre_usu = $obj->Nombre;
            $IdUsu= $obj->IdUsuario;

        }
        //Free the result. Avoid High Memory Usages
    } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
  ?>

      <?php if (!isset($_POST['IdAlbum']))  :?>

        <?php


            $query="SELECT * from Albums  WHERE IdAlbum='".$_GET['agregar']."'";

            if ($result = $connection->query($query)) {

            while($obj = $result->fetch_object()) {
            $Nombre =$obj->Nombre_Album;
            $Id = $obj->IdAlbum;


        }
        }
        ?>

        <div class="container" id="contenedor" >

          <div class="row" style="background-color: white;">
            <nav class='navbar navbar-inverse'  role='navigation' style='margin-bottom: 0px ;width=100%' >
              <h2 style="color:white; text-align: center">Añadir Nueva Pista a <?php echo $Nombre; ?> </h2>
            </nav>
          </div>

          <div class="row" style="background-color: #ff6d4e;" >



        <form method="post" role="form"   id="formulario_registro">
            <input type="hidden" name="IdAlbum"  value="<?php echo $Id; ?>"/>
          <div class="form-group">
            <label for="ejemplo_password_1">Elegir Pista</label>
          <?php
            echo "<select name='IdPista'>";

            $query="SELECT * FROM Pistas where IdUsuario='$IdUsu'";

            if ($result=$connection->query($query)) {
              while($obj=$result->fetch_object()) {
                echo "<option value='".$obj->IdPista."'>";
                echo $obj->Nombre_Pista;
                echo "</option>";
              }
            } else {
              echo "NO SE HA PODIDO RECUPERAR DATOS DE LOS AUTORES";
            }
            echo "</select>";
          ?>
          </div>
          <button type="submit" class="btn btn-default">Añadir</button>
        </form>
          <form action='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Albums.php' id="formulario_registro" method='post' >
              <button type='submit' class='btn btn-default navbar-btn'  style="margin-left:100%;" >Volver</button>
            </form>


        <?php else: ?>


          <?php


          $IdAlbum=$_POST['IdAlbum'];
          $IdPista=$_POST['IdPista'];
          echo $IdPista;


          $query="UPDATE Pistas p SET IdAlbum='$IdAlbum'
          WHERE p.IdPista='$IdPista'";
          echo $query;
          echo $ID;


          if ($connection->query($query)) {
            echo "Se ha Modificado en ...";
            header('Location:  /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Albums.php');

          } else {
            echo "ERROR AL MODIFICAR PISTA";
          }

          ?>


          <?php


          $IdPista=$_POST['IdPista'];
          $IdLista=$_POST['IdLista'];



          $query="INSERT into Contener values ($IdPista,$IdLista);";
          echo $query;


          if ($connection->query($query)) {
            echo "Se ha Modificado en ...";
            header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Listas.php');;
          } else {
            echo "Pista ya añadida a la Lista";
          }

          ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
