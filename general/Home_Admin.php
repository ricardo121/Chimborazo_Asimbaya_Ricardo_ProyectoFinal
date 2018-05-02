<?php

  //Open the session
  session_start();


  if (isset($_SESSION["Gmail"])) {

    if ($_SESSION["tipo"]=='admin') {
      $Gmail=$_SESSION["Gmail"];

    } else {
      session_destroy();
      header("Location: inicio.php");
    }


  } else {
    session_destroy();
    header("Location: inicio.php");
  }


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
    <title>Tabla de Usuarios</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>

    <?php
    $query="SELECT * from Usuarios  WHERE Gmail='$Gmail'";


    if ($result = $connection->query($query)) {
        printf("<p>The select query returned %d rows.</p>", $result->num_rows);
        echo $query;

        //FETCHING OBJECTS FROM THE RESULT SET
        //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
        while($obj = $result->fetch_object()) {

            $Edad_usu =$obj->Edad;
            $Nombre_usu = $obj->Nombre;


        }
        //Free the result. Avoid High Memory Usages
    } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
  ?>

    <div class="container">
      <div class="row">

      <?php
        include_once("Menu.php");
        Menu();
      ?>


      </div>
      <div class="row">
        <h1 style="color:black; text-align: center"><?php echo"Bienvenido"." ". $Nombre_usu; ?></h1>
      </div>
      <div class="row" style="margin-top: 50%">
        <nav class='navbar navbar-inverse' role='navigation'>

        <div class='collapse navbar-collapse navbar-ex1-collapse'>


          <ul class='nav navbar-nav navbar-right'>
            <li class='active'><a class='navbar-brand' href='Home_Admin.php'><img src='Casa.png' width='20px' /></a></li>
          </ul>
        </div>

        </nav>
      </div>
    </div>
  </body>
</html>
