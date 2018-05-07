
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
      <div class="row">






        <table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Edad</th>
        </thead>




        <?php
        $query="SELECT * from Usuarios  WHERE Gmail='$Gmail'";


        if ($result = $connection->query($query)) {



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
    </table>
      </div>


      </div>
  </body>
</html>
