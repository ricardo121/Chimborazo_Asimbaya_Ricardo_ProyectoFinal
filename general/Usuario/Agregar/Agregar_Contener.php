
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">

  </head>
  <body>



      <?php if (!isset($_POST['IdLista']))  :?>

        <?php

        //CREATING THE CONNECTION
        $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto",3316);
        $connection->set_charset("uft8");
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }


            $query="SELECT * from Listas  WHERE IdLista='".$_GET['agregar']."'";
            if ($result = $connection->query($query)) {

            while($obj = $result->fetch_object()) {
            $Nombre =$obj->Nombre_Lista;
            $Id = $obj->IdLista;
        }
        }
        ?>

        <div class="container" id="contenedor" >

          <div class="row">
          <h1 style="color:black; text-align: center">Añadir Nueva Pista a <?php echo $Nombre; ?></H1>
          </div>

          <div class="row" >



        <form method="post" role="form">
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
        <form action='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Listas.php' method='post'>
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

        $IdPista=$_POST['IdPista'];
        $IdLista=$_POST['IdLista'];



        $query="INSERT into Contener values ($IdPista,$IdLista);";
        echo $query;


        if ($connection->query($query)) {
          echo "Se ha Modificado en ...";
          header('Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Listas.php');;
        } else {
          echo "Pista ya añadida a la Lista";
        }

        ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
