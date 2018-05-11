
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
    <link rel="stylesheet" type="text/css" href="Estilos3.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>

    <?php
    $query="SELECT * from Usuarios  WHERE Gmail='$Gmail'";


    if ($result = $connection->query($query)) {


        while($obj = $result->fetch_object()) {

            $Edad_usu =$obj->Edad;
            $Nombre_usu = $obj->Nombre;


        }
        //Free the result. Avoid High Memory Usages
    } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
  ?>

    <div class="container" id="contenedor">

      <div class="row">
      <h1 style="color:white; text-align: center"><?php echo"Bienvenido"." ". $Nombre_usu; ?></H1>
      </div>


      <div class="row" style="background-color:white; ">





        <nav  role="navigation" style="border-bottom: 1px solid  ">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
       <div class="navbar-header">
         <a style="color:#9d9d9d; " class="navbar-brand" href="#">Pistas</a>
         <a style="color:#9d9d9d; " class="navbar-brand" href="#">Albums</a>
         <a class="navbar-brand" href="#">Listas</a>
       </div>
       </nav>
       </div>
      <div class="row">
        <nav class="navbar navbar-default" role="navigation">
       <div class="navbar-header">
         <ul class="nav nav-pills nav-stacked">
           <li><a href="#">Enlace #1</a></li>
           <li><a href="#">Enlace #2</a></li>
         </ul>
       </div>

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
  </nav>





      </div>
      </div>
  </body>
</html>
