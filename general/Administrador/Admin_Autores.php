

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

<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mostrar Autores</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
</head>
<body>
  <div class="container">


	<?php


  $query="SELECT * from Autores";


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
            <th>IdAutor</th>
            <th>Nombre_Autor</th>
          </tr>
        </thead>

  <?php
      //FETCHING OBJECTS FROM THE RESULT SET
      //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
          echo "<tr>";
            echo "<td>".$obj->IdAutor."</td>";
            echo "<td>".$obj->Nombre_Autor."</td>";
            echo "<td>";
            echo "<a href='Eliminar/Borrar_Autor.php?borrar=".$obj->IdAutor.
            "'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Eliminar.png' width='20px' /></a>";
            echo "</td>";
            echo "<td>";
            echo "<a href='Editar/Editar_Autor.php?editar=".$obj->IdAutor.
            "'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/lapiz.png' width='20px' /></a>";
            echo "</td>";
          echo "</tr>";

      }
      //Free the result. Avoid High Memory Usages
  } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
?>
        <tr>
          <td>
            <p>Añada un Nuevo Autor</p>
          </td>
          <td>
            <a href='Agregar/Agregar_Autor.php?'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Agregar.png' width='20px' /></a>
          </td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>
