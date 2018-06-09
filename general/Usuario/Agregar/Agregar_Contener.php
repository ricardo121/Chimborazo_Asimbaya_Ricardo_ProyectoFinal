
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
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Estilo_Usu_Agregar.css"/>

  </head>
  <body>



      <?php if (!isset($_POST['IdLista']))  :?>


        <?php


            $query="SELECT * from Listas  WHERE IdLista='".$_GET['agregar']."'";
            if ($result = $connection->query($query)) {

            while($obj = $result->fetch_object()) {
            $Nombre =$obj->Nombre_Lista;
            $Id = $obj->IdLista;
        }
        }
        ?>

        <div class="container" id="contenedor" >

          <div class="row" style="background-color: #ff6d4e;">
          <h2 style="color:black; text-align: center">Añadir Nueva Pista a <?php echo $Nombre; ?></h2>
          </div>

          <div class="row" style="background-color: #ff6d4e;" >



        <form method="post" role="form"   id="formulario_registro">
            <input type="hidden" name="IdLista"  value="<?php echo $Id; ?>"/>
          <div class="form-group">
            <label for="ejemplo_password_1">Elegir_Pista</label>
          <?php
            echo "<select name='IdPista'>";

            $query="SELECT * FROM Pistas";

            if ($result=$connection->query($query)) {
              while($obj=$result->fetch_object()) {
                echo "<option value='".$obj->IdPista."'>";
                echo $obj->Nombre_Pista;
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
        <form action='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Listas.php' id="formulario_registro" method='post' >
            <button type='submit' class='btn btn-default navbar-btn'  style="margin-left:100%;" >Volver</button>
          </form>


        <?php else: ?>


        <?php


        $IdPista=$_POST['IdPista'];
        $IdLista=$_POST['IdLista'];



        $query="INSERT into Contener values ($IdPista,$IdLista);";
        echo $query;


        if ($connection->query($query)) {
          echo "Se ha Modificado en ...";
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Listas.php');;
        } else {
          echo "<script>alert('Pista ya añadida a la Lista');
          window.location.href = '/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Listas.php'</script>";
        }

        ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
