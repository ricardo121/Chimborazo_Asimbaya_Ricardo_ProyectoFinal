<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Clientes</title>
  </head>
  <body>
    <div class="container">

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
      $query="SELECT * from Usuarios ";
      if ($result = $connection->query($query)) {
          printf("<p>The select query returned %d rows.</p>", $result->num_rows);
      ?>

          <!-- PRINT THE TABLE AND THE HEADER -->
          <table style="border:1px solid black">
          <thead>
            <tr>
              <th>IdUsuario</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Gmail</th>
              <th>Edad</th>
          </thead>

      <?php
          //FETCHING OBJECTS FROM THE RESULT SET
          //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
          while($obj = $result->fetch_object()) {
              //PRINTING EACH ROW
              echo "<tr>";
                echo "<td>".$obj->IdUsuario."</td>";
                echo "<td>".$obj->Nombre."</td>";
                echo "<td>".$obj->Apellidos."</td>";
                echo "<td>".$obj->Gmail."</td>";
                echo "<td>".$obj->Edad."</td>";
                echo "<td>";
                echo "<a href='borrar.php?id=".$obj->IdUsuario.
                "'><img src='eliminar.png' width='20px' /></a>";
                echo "</td>";
              echo "</tr>";
          }
          //Free the result. Avoid High Memory Usages
          $result->close();
          unset($obj);
          unset($connection);
      } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
    ?>
    </div>
  </body>
</html>