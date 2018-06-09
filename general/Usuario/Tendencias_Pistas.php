
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
  </head>
  <body>

    <div class="container" id="contenedor">

    <?php
    $query="SELECT * from Usuarios u join Pistas p ON u.IdUsuario=p.IdUsuario left join Autores a ON a.IdAutor=p.IdAutor ";


    if ($result = $connection->query($query)) {



  ?>







      <div class="row" >

        <?php
          include_once("Menu_Usu1.php");
          Menu1();
        ?>

      </div>

      <div class="row" style="background-color: #ff6d4e;">
        <h1 style="color:white; text-align: center"><?php echo"Tendencias" ?></h1>
      </div>




              <?php
                while($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    echo "<div class='row' style='background-color: #272626;' ><nav role='navigation'><div class='navbar-header'>";
                    echo "<p style='width:200px; height:45px; color: white;'  class='navbar-brand'>".$obj->Nombre."</p>";
                    echo "<div class='navbar-brand' style='height:45px; ' ><audio controls class='audio' >";
                    echo "<source src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Agregar/$obj->Pista' type='audio/mpeg'>";
                    echo "</audio></div>";
                    echo "<p style='width:200px; height:45px; color: white;'  class='navbar-brand'>".$obj->Nombre_Pista."</p>";
                    echo "<p style='width:200px; height:45px; color: white;'  class='navbar-brand'>Autor: " .$obj->Nombre_Autor."</p>";

                    //echo "<a class='navbar-brand' href='Eliminar/Borrar_Pista.php?borrar=".$obj->IdPista.
                  //  "'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Papelera.jpg' width='20px' /></a>";

                    echo "</div></nav></div>";



                }
                //Free the result. Avoid High Memory Usages
                } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
                ?>




      </div>
  </body>
</html>
