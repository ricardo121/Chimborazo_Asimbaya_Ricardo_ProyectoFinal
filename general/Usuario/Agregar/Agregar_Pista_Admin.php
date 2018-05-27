
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
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">

  </head>
  <body>





      <?php if (!isset($_POST['IdUsuario']))  :?>

        <?php


        $query="SELECT * from Usuarios  WHERE IdUsuario='".$_GET['agregar']."'";
          if ($result = $connection->query($query)) {
          while($obj = $result->fetch_object()) {
            $IdUsuario = $obj->IdUsuario;
            $Apellidos = $obj->Apellidos;
        }
        }
        ?>

        <div class="container" >

          <div class="row">
          <h1 style="color:black; text-align: center">Añadir Nueva Pista a <?php echo $Apellidos; ?></H1>
          </div>

          <div class="row" >



        <form action="/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Agregar/Agregar_Pista_Admin.php" method="post" enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label for="ejemplo_email_1">Nombre_Pista:</label>
            <input type="hidden" name="IdUsuario"  value="<?php echo $IdUsuario; ?>"/>
            <input type="text" name="Nombre" class="form-control"
            placeholder="Introduce El Nombre De La Pista"/>
         </div>
         <div class="form-group">
           <label >Genero</label>
           <input type="text" name="Genero" class="form-control"
           placeholder="Introduce El Genero"/>
        </div>
         <div class="form-group">
           <label for="ejemplo_password_1">Pista</label>
            <input class="form-control" type="file" name="pista" required />
          </div>
          <div class="form-group">
            <label for="ejemplo_password_1">Elegir_Autor</label>
          <?php
            echo "<select name='IdAutor'>";

            $query="SELECT * FROM Autores";

            if ($result=$connection->query($query)) {
              while($obj=$result->fetch_object()) {
                echo "<option value='".$obj->IdAutor."'>";
                echo $obj->Nombre_Autor;
                echo "</option>";
              }
            } else {
              echo "NO SE HA PODIDO RECUPERAR DATOS DE LOS AUTORES";
            }
            echo "</select>";
          ?>
          </div>
          <div class="form-group">
            <label for="ejemplo_password_1">Elegir_Album</label>
          <?php
            echo "<select name='IdAlbum'>";

            $query="SELECT * FROM Albums";

            if ($result=$connection->query($query)) {
              while($obj=$result->fetch_object()) {
                echo "<option value='".$obj->IdAlbum."'>";
                echo $obj->Nombre_Album;
                echo "</option>";
              }
            } else {
              echo "NO SE HA PODIDO RECUPERAR DATOS DE LOS AUTORES";
            }
            echo "</select>";
          ?>
          </div>
          <button type="submit" class="btn btn-default">Añadir</button>
        </form>
        <form action='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Usuarios.php' method='post'>
        <ul class='nav navbar-nav navbar-right'>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'>Volver</button></li>
        </ul>
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

              var_dump($_FILES);
                //Temp file. Where the uploaded file is stored temporary
              $tmp_file = $_FILES['pista']['tmp_name'];
              $target_dir = "pistas/";
              //$target_file = strtolower($target_dir . basename($_FILES['pista']['name']));
              $target_file = ($target_dir . basename($_FILES['pista']['name']));

               $valid= true;


              if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $valid = false;
                }

                if ($_FILES['pista']['size'] > (2048000)) {
			            $valid = false;
			            echo 'Oops!  Your file\'s size is to large.';
		            }


                $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
                if ($file_extension!="mp3") {
                  $valid = false;
                  echo "Only MP3 files are allowed";
                }

                if ($valid) {
                  var_dump($target_file);
                  //Put the file in its place
                  move_uploaded_file($tmp_file, $target_file);
                  echo "PRODUCT ADDED";



                  $Nombre = $_POST["Nombre"];
                  $Genero= $_POST["Genero"];
                  $IdUsuario= $_POST["IdUsuario"];
                  $IdAlbum=$_POST['IdAlbum'];
                  $IdAutor=$_POST['IdAutor'];
                  $query = "INSERT INTO Pistas (IdPista,IdAlbum,IdUsuario,
                    IdAutor,Pista,Nombre_pista,Genero,Hora_subida,Reproducciones_pista,Valoracion_positiva,Valoracion_negativa)
                    VALUES (NULL,$IdAlbum,$IdUsuario,$IdAutor,'$target_file','$Nombre','$Genero',0,NULL,NULL,NULL)";

      }

        echo $query;
        if ($connection->query($query)) {
          echo "Se ha Registardo en ...";
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Usuarios.php');
        } else {
          echo "ERROR AL AÑADIR PISTA";
        }
        ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
