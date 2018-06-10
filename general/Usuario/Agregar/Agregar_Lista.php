
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
    <link rel="stylesheet" type="text/css" href=" bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Usuario_Agregar.css"/>

  </head>
  <body>

    <div class="container" id="contenedor" >

      <div class="row" style="background-color: white;">
        <nav class='navbar navbar-inverse'  role='navigation' style='margin-bottom: 0px ;width=100%' >
          <h2 style="color:white; text-align: center">Añadir Nueva Lista</h2>
        </nav>
      </div>

        <div class="row" style="background-color: #ff6d4e;" >
        <?php if (!isset($_POST["Nombre"])) : ?>

          <?php


          $query="SELECT * from Usuarios  WHERE IdUsuario='".$_GET['agregar2']."'";
            if ($result = $connection->query($query)) {
            while($obj = $result->fetch_object()) {
              $IdUsuario = $obj->IdUsuario;
              $Apellidos = $obj->Apellidos;
          }
          }
          ?>


          <form method="post" role="form"   id="formulario_registro">
         <div class="form-group">
           <label for="ejemplo_email_1">Nombre Lista</label>
           <input type="hidden" name="IdUsuario"  value="<?php echo $IdUsuario; ?>"/>
           <input type="text" name="Nombre" class="form-control" placeholder="Introduce Nombre de Lista">
        </div>
            <button type="submit" class="btn btn-default">Enviar</button>
          </form>
          <form action='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Home_Usu.php' id="formulario_registro" method='post' >
            <ul class='nav navbar-nav navbar-right'>
              <li><button type='submit' class='btn btn-default navbar-btn'  style="margin-right:15%;" >Volver</button></li>
            </ul>
          </form>


      <?php else: ?>


        <?php

        $Nombre = $_POST["Nombre"];
        $IdUsuario= $_POST["IdUsuario"];

        $query = "INSERT INTO Listas (IdLista,IdUsuario,Nombre_Lista)
        VALUES (NULL,'$IdUsuario','$Nombre')";


        if ($connection->query($query)) {
          echo "Se ha Registardo en ...";
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Listas.php');

        } else {
          echo "ERROR AL AÑADIR LISTA";
        }
        ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
