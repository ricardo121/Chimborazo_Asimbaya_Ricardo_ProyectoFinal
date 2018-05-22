

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

    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>


    <div class="container">






      <div class="row" >



      </div>



      <?php
        if (empty($_GET)) {
          echo "No se han recibido datos del reparaciones";
          exit();
        }
      ?>

        <?php


        $consulta ="SELECT Pista from Pistas  where IdPista='".$_GET["reproducir"]."'";


        if ($resultado = mysqli_query($connection, $consulta)) {

            /* obtener el array de objetos */
            while ($fila = mysqli_fetch_row($resultado)) {

                //var_dump($fila);

                $ID=$fila[0];
                //echo $ID;




                echo "<div class='row' style='background-color: white;' >";
                echo "<audio controls>";
                echo "<source src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Agregar/$ID' type='audio/mpeg'>";

                echo "</audio>";
                //echo "<a class='navbar-brand' href='Eliminar/Borrar_Pista.php?borrar=".$obj->IdPista.
              //  "'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Papelera.jpg' width='20px' /></a>";

                echo "</div>";


            }

            /* liberar el conjunto de resultados */
            // $hola = mysqli_free_result($resultado);

        }



        ?>

        </div>
  </body>
</html>
