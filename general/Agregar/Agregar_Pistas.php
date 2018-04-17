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




      <?php if (!isset($_POST['code']))  :?>



        <?php

        //CREATING THE CONNECTION
        $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto",3316);
        $connection->set_charset("uft8");
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */
            $query="SELECT IdUsuario from Usuarios  WHERE IdUsuario='".$_GET['agregar']."'";
        if ($result = $connection->query($query)) {
          echo $query;
          while($obj = $result->fetch_object()) {
            $IdUsuario = $obj->IdUsuario;
        }
        }
        ?>



              <div class="container">
                <h1 class="jumbotron">Add a new product</h1>
                <form action="Añadir_Pistas.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Nombre_Pista: </label>
                    <input class="form-control" maxlength="6" size="1000 "type="text" name="code" required placeholder="Insert the product code (up to 6 chars)"/>
                    <label>Genero: </label>
                    <input class="form-control" type="text" name="name" required placeholder="Insert the product name" />
                    <label>N: </label>
                    <input class="form-control" type="text" name="Id"   value="<?php echo $IdUsuario; ?>"required placeholder="Insert the product name" />
                    <label>Product Image: </label>
                    <input class="form-control" type="file" name="image" required />
                    </textarea>
                  </div>
                  <input class="btn btn-primary" type="submit" value="Send" />
                </form>
              <div>

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

              var_dump($_FILES);
                //Temp file. Where the uploaded file is stored temporary
              $tmp_file = $_FILES['image']['tmp_name'];
              $target_dir = "img/";
              $target_file = strtolower($target_dir . basename($_FILES['image']['name']));

               $valid= true;


              if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $valid = false;
                }

                if ($_FILES['image']['size'] > (2048000)) {
			            $valid = false;
			            echo 'Oops!  Your file\'s size is to large.';
		            }


                $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
                if ($file_extension!="mp3" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
                  $valid = false;
                  echo "Only JPG, JPEG, PNG & GIF files are allowed";
                }

                if ($valid) {
                  var_dump($target_file);
                  //Put the file in its place
                  move_uploaded_file($tmp_file, $target_file);
                  echo "PRODUCT ADDED";



        $Nombre = $_POST["code"];
        $Genero= $_POST["name"];
        $IdUsuario= $_POST["Id"];
        $query = "INSERT INTO Pistas (IdPista,IdAlbum,IdUsuario,
        IdAutor,Pista,Nombre_pista,Genero,Hora_subida,Reproducciones_pista,Valoracion_positiva,Valoracion_negativa)
        VALUES (NULL,NULL,$IdUsuario,NULL,'$target_file','$Nombre','$Genero',0,NULL,NULL,NULL)";

      }

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
                  echo "<td>".$obj->Nombre_Pista."</td>";
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
