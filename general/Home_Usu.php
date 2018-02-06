
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="Estilos3.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>
      <div class="container" id="contenedor">

        <div class="row">
        <h1 style="color:white; text-align: center">Usuarios</H1>
        </div>

        <div class="row">



            <p>holaaaaaaaaaa</p>


          <?php
              //FORM SUBMITTED

                //CREATING THE CONNECTION
                $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto",3316);
                $connection->set_charset("uft8");
                //TESTING IF THE CONNECTION WAS RIGHT
                if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                }


          ?>


        </div>

      </div>
  </body>
</html>
