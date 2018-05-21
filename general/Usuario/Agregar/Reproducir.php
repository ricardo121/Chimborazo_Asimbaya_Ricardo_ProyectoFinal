

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" ">
  </head>
  <body>

      <!-- PHP STRUCTURE FOR CONDITIONAL HTML -->
      <!-- FIRST TIME. NO DATA IN THE POST (checking a required form field) -->
      <!-- So we must show the form -->

      <?php
        if (empty($_GET)) {
          echo "No se han recibido datos del reparaciones";
          exit();
        }
      ?>

        <?php

        $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto",3316);
        $connection->set_charset("uft8");
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */


        $consulta ="SELECT Pista from Pistas  where IdPista='".$_GET["reproducir"]."'";
        echo $_GET["reproducir"]  ;

        if ($resultado = mysqli_query($connection, $consulta)) {

            /* obtener el array de objetos */
            while ($fila = mysqli_fetch_row($resultado)) {
                printf ("%s (%s)\n", $fila[0], $fila[1]);
                var_dump($fila);
                //echo $fila[0];
                $ID=$fila[0];
                echo $ID;
                header("Location:   $ID ");

            }

            /* liberar el conjunto de resultados */
            // $hola = mysqli_free_result($resultado);

        }

        if ($result = $connection->query($query)) {
          header('Location:  /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Usuario/Usu_Pistas.php');

        } else {
          echo "Error al Borrar los datos";
        }

        ?>


  </body>
</html>
