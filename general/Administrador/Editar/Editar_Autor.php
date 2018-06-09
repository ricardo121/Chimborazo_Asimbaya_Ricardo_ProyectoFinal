
<?php

  session_start();
  include_once("Login_Admin.php");
  Login();




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

    <div class="container" id="contenedor" >

      <div class="row">
      <h1 style="color:black; text-align: center">Editar Autor</H1>
      </div>

      <div class="row" >

      <?php if (!isset($_POST["IdAutor"])) : ?>

        <?php


        $query="SELECT * from Autores  WHERE IdAutor='".$_GET['editar']."'";
        if ($result = $connection->query($query)) {

          while($obj = $result->fetch_object()) {
            $Nombre =$obj->Nombre_Autor;
            $Id = $obj->IdAutor;

        }
      }
        ?>

        <form method="post" role="form">
          <div class="form-group">
            <label for="ejemplo_email_1">Nombre_Autor</label>
            <input type="text" name="Nombre" class="form-control"
            value="<?php echo $Nombre; ?>">
            <input type="hidden" name="IdAutor"  value="<?php echo $Id; ?>">
          </div>
            <button type="submit" class="btn btn-default">Editar</button>
        </form>
        <form action='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Autores.php' method='post'>
        <ul class='nav navbar-nav navbar-right'>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'>Volver</button></li>
        </ul>
        </form>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else: ?>


        <?php


        $Nombre=$_POST['Nombre'];
        $IdAutor=$_POST['IdAutor'];

        $query="UPDATE Autores SET Nombre_Autor='$Nombre'
        WHERE IdAutor='$IdAutor'";



        if ($connection->query($query)) {

          echo "Se ha Modificado en ...";
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Autores.php');


        } else {
          echo "ERROR AL AÑADIR USUARIO";
        }

        ?>

      <?php endif ?>
      </div>
    </div>
  </body>
</html>
