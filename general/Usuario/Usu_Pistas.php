
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
    <link rel="stylesheet" type="text/css" href="Estilos_Usu.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>

    <div class="container" id="contenedor">

    <?php
    $query="SELECT * from Usuarios u join Pistas p ON u.IdUsuario=p.IdUsuario where Gmail='$Gmail' ";


    if ($result = $connection->query($query)) {



  ?>







      <div class="row" >

        <?php
          include_once("Menu_Usu1.php");
          Menu1();
        ?>

      </div>

      <div class="row" style="background-color: #ff6d4e;">
        <h1 style="color:white; text-align: center"><?php echo"Tus Pistas" ?></H1>
      </div>


      <div class="row" style="background-color:white; ">

        <nav class='navbar navbar-inverse'  role='navigation' >
        <div class='navbar-header'>
          <a style='color:#9d9d9d; ' class='navbar-brand' href='Usu_Pistas.php'>Pistas</a>
          <a style='color:#9d9d9d; ' class='navbar-brand' href='Usu_Albums.php'>Albums</a>
          <a class='navbar-brand' href='Usu_Listas.php'>Listas</a>
        </div>
        <form  method='post'>
        <ul class='nav navbar-nav navbar-right'>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'><a href='Agregar/Agregar_Pista.php?agregar=".$IdUsu.
          "'>Subir Pista</a></button></li>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'>Crear Album</button></li>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'>Crear Lista</button></li>
        </ul>
        </form>";
        </nav>

    </div>



              <?php
                while($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    echo "<div class='row' style='background-color: white;' ><nav role='navigation'><div class='navbar-header'>";
                    echo "<a style='width:120px;'  class='navbar-brand' href='#'>".$obj->Nombre_Pista."</a>";

                    echo "<a class='navbar-brand' href='Eliminar/Borrar_Pista.php?borrar=".$obj->IdPista.
                    "'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Papelera.jpg' width='20px' /></a>";

                    echo "</div></nav></div>";



                }
                //Free the result. Avoid High Memory Usages
                } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
                ?>



  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <!--<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Enlace #1</a></li>
      <li><a href="#">Enlace #2</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Enlace #3</a></li>

    </ul>
  </div>-->






      </div>
  </body>
</html>
