

<?php

  session_start();
  include_once("Login_Admin.php");
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
    <title>Tabla de Usuarios</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>

    <?php

    $query="SELECT * from Usuarios  WHERE Gmail='$Gmail'";


    if ($result = $connection->query($query)) {


        while($obj = $result->fetch_object()) {

            $Edad_usu =$obj->Edad;
            $Nombre_usu = $obj->Nombre;
            echo "<div class='alert alert-success'>
            <strong>Success!</strong> Indicates a successful or positive action.
            </div>";


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
      <div class="row" >
        <h1 style="color:black; text-align: center"><?php echo"Bienvenido"." ". $Nombre_usu; ?></h1>
        <h1 style="color:black; text-align: center">A la Pantalla de Adminitracion del sitio Web</h1>
      </div>
      <div class="row"  >
        <nav  role='navigation' style="background-color:red ">

        <div class='collapse navbar-collapse navbar-ex1-collapse' style="background-color:white ;margin-top:40%" >

          <ul class='nav navbar-nav navbar-right'>
            <li class='active'><a class='navbar-brand' href='Home_Admin.php'><img src='Apagar.png' width='25px' /></a></li>
          </ul>
        </div>

        </nav>
      </div>
    </div>
  </body>
</html>
