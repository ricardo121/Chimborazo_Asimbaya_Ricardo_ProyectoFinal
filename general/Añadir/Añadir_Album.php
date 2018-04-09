<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" bootstrap.css">

  </head>
  <body>

    <div class="container" id="contenedor" >

      <div class="row">
      <h1 style="color:black; text-align: center">Añadir Nuevo Album</H1>
      </div>

        <div class="row" >
        <?php if (!isset($_POST["Nombre"])) : ?>
          <form method="post" role="form">
         <div class="form-group">
           <label for="ejemplo_email_1">IdAlbum</label>
           <input type="text" name="Nombre" class="form-control"
           placeholder="Introduce Nombre de Album">
        </div>
            <button type="submit" class="btn btn-default">Enviar</button>
          </form>


      <?php else: ?>

        <?php
        //CREATING THE CONNECTION
        $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto",3316);
        $connection->set_charset("uft8");
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        $Nombre = $_POST["Nombre"];
          echo $Nombre;
        $query = "INSERT INTO Albums (IdAlbum,Nombre_Album)
        VALUES (NULL,'$Nombre')";


        echo $query;
        if ($connection->query($query)) {
          echo "Se ha Registardo en ...";
          $query ="SELECT IdAlbum, Nombre_Album FROM Albums";
          if ($result = $connection->query($query)) {
            echo "<table>";


            //FETCHING OBJECTS FROM THE RESULT SET
            //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT

            while($obj = $result->fetch_object()) {

                //PRINTING EACH ROW
                echo "<tr>";
                  echo "<td>".$obj->IdAlbum."</td>";
                  echo "<td>".$obj->Nombre_Album."</td>";
                echo "</tr>";
            }

            echo "</table>";
          }
        } else {
          echo "ERROR AL AÑADIR ALBUM";
        }
        ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
