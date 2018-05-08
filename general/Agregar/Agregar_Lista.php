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
      <h1 style="color:black; text-align: center">Añadir Nueva Lista</H1>
      </div>

        <div class="row" >
        <?php if (!isset($_POST["Nombre"])) : ?>
          <form method="post" role="form">
         <div class="form-group">
           <label for="ejemplo_email_1">IdLista</label>
           <input type="text" name="Nombre" class="form-control"
           placeholder="Introduce Nombre de Lista">
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
        $query = "INSERT INTO Listas (IdLista,Nombre_Lista)
        VALUES (NULL,'$Nombre')";


        if ($connection->query($query)) {
          echo "Se ha Registardo en ...";
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Admin_Listas.php');

        } else {
          echo "ERROR AL AÑADIR LISTA";
        }
        ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
