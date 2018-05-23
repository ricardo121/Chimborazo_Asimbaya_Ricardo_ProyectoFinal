
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
    <link rel="stylesheet" type="text/css" href="Estilo_Usu.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>

    <div class="container" id="contenedor">






      <div class="row" >

        <?php
          include_once("Menu_Usu1.php");
          Menu1();
        ?>

      </div>

      <div class="row" style="background-color: #ff6d4e;" >
        <h1 style="color:white; text-align: center"><?php echo"Tus Albums" ?></h1>
      </div>


      <?php
        $query="SELECT * from Albums ";


      if ($result = $connection->query($query)) {


    ?>


      <div class="row" style="background-color:white; ">

        <?php
          include_once("Menu_Usu2.php");
          Menu2();
        ?>

    </div>


    <?php
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
          echo "<div class='row' style='background-color: #white;' ><nav role='navigation'><div class='navbar-header'>";
          echo "<a style='width:200px;'  class='navbar-brand' href='Usu_Contener2.php?Album=".$obj->IdAlbum."&Nombre=".$obj->Nombre_Album.
          "'>".$obj->Nombre_Album."</a>";

          echo "<a class='navbar-brand' href='Eliminar/Borrar_Album.php?borrar=".$obj->IdAlbum.
          "'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Papelera.jpg' width='20px' /></a>";

          echo "<a class='navbar-brand' href='Agregar/Agregar_Contener2.php?agregar=".$obj->IdAlbum.
          "'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Agregar.png' width='20px' /></a>";

          echo "</div></nav></div>";



      }
      //Free the result. Avoid High Memory Usages
      } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
      ?>








      </div>
      </div>
  </body>
</html>
