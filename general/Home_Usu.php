
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["Gmail"])) {
    //SESSION ALREADY CREATED

    $Gmail=$_SESSION["Gmail"];
    //SHOW SESSION DATA

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
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="Estilos3.css"/>
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

    <div class="container" id="contenedor">

      <div class="row">
      <h1 style="color:white; text-align: center"><?php echo $Nombre_usu; ?></H1>
      </div>
      <div class="row">



          <p>holaaaaaaaaaa</p>





      </div>


        <table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Edad</th>
        </thead>




        <?php
        $query="SELECT * from Usuarios  WHERE Gmail='$Gmail'";


        if ($result = $connection->query($query)) {
            echo $query;

            //FETCHING OBJECTS FROM THE RESULT SET
            //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
            while($obj = $result->fetch_object()) {
                //PRINTING EACH ROW
                echo "<tr>";
                  echo "<td>".$obj->Nombre."</td>";
                  echo "<td>".$obj->Edad."</td>";
                echo "</tr>";
                $Edad_usu =$obj->Edad;
                $Nombre_usu = $obj->Nombre;


            }
            //Free the result. Avoid High Memory Usages
        } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
      ?>


      </div>
  </body>
</html>
