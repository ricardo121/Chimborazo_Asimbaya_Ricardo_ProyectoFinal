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
      <h1 style="color:black; text-align: center">Añadir Nueva Pista</H1>
      </div>

        <div class="row" >
        <?php if (!isset($_POST["Nombre_Pista"])) : ?>
          <form method="post" role="form">
            <div class="form-group">
              <label for="ejemplo_email_1">Nombre de Pista:</label>
              <input type="text" name="Nombre_Pista" class="form-control"
              placeholder="Introduce Nombre de Pista">
           </div>
           <div class="form-group">
             <label for="ejemplo_email_1">Genero</label>
             <input type="text" name="Genero" class="form-control"
             placeholder="Introduce Genero">
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
        $Nombre = $_POST["Nombre_Pista"];
        $Genero= $_POST["Genero"];
        /*$IdAlbum = $_POST["IdAlbum"];
        $IdAutor= $_POST["IdAutor"];*/
        $IdUsuario = $_GET['añadir'];

        $query = "INSERT INTO Pistas (IdPista,IdAlbum,IdUsuario,
        IdAutor,Pista,Nombre_pista,Genero,Hora_subida,Reproducciones_pista,Valoracion_positiva,Valoracion_negativa)
        VALUES (NULL,NULL,$IdUsuario,NULL,'hola','$Nombre','$Genero',0,NULL,NULL,NULL)";


        echo $query;
        if ($connection->query($query)) {
          echo "Se ha Registardo en ...";
          $query ="SELECT * FROM Pistas";
          if ($result = $connection->query($query)) {
            echo "<table>";


            //FETCHING OBJECTS FROM THE RESULT SET
            //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT

            while($obj = $result->fetch_object()) {

                //PRINTING EACH ROW
                echo "<tr>";
                  echo "<td>".$obj->IdPista."</td>";
                  echo "<td>".$obj->IdAlbum."</td>";
                  echo "<td>".$obj->IdUsuario."</td>";
                  echo "<td>".$obj->IdAutor."</td>";
                  echo "<td>".$obj->Pista."</td>";
                  echo "<td>".$obj->Nombre_pista."</td>";
                echo "</tr>";
            }


            echo "</table>";
          }
        } else {
          echo "ERROR AL AÑADIR USUARIO";
        }
        ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
