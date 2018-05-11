

<?php

  session_start();
  include_once("Login_Admin.php");
  Login();

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
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

      ?>

          <div class="row" >
          <?php
            include_once("Menu_Admin.php");
            Menu();
          ?>
          </div>
          <div class="row" >
            <table class="table">
              <thead>
                <tr>
                  <th>IdUsuario</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Gmail</th>
                  <th>Administrador</th>
                  <th>Edad</th>
                  <th></th>
                  <th></th>
                  <th>Inserte Pista</th>
                </tr>
              </thead>

      <?php
          //FETCHING OBJECTS FROM THE RESULT SET
          //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
          while($obj = $result->fetch_object()) {
              //PRINTING EACH ROW
              echo "<tr>";
                echo "<td><a href='Admin_Pistas.php?Usuario=".$obj->IdUsuario."'>".$obj->IdUsuario."</a></td>";
                echo "<td>".$obj->Nombre."</td>";
                echo "<td>".$obj->Apellidos."</td>";
                echo "<td>".$obj->Gmail."</td>";
                echo "<td>".$obj->Administrador."</td>";
                echo "<td>".$obj->Edad."</td>";
                echo "<td>";
                echo "<a href='Eliminar/Borrar_Usuario.php?borrar=".$obj->IdUsuario.
                "'><img src='eliminar.png' width='20px' /></a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='Editar/Editar_Usuario.php?editar=".$obj->IdUsuario.
                "'><img src='lapiz.png' width='20px' /></a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='Agregar/Agregar_Pista.php?agregar=".$obj->IdUsuario.
                "'><img src='Agregar.png' width='20px' /></a>";
                echo "</td>";
              echo "</tr>";

          }
          //Free the result. Avoid High Memory Usages
          $result->close();
          unset($obj);
          unset($connection);
      } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
    ?>
          <tr>
    	     <td>
    		       <p>Añada un Nuevo Usuario</p>
            </td>
    	     <td>
    		       <a href='Agregar/Agregar_Usuario.php?'><img src='Agregar.png' width='20px' /></a>
           </td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>
