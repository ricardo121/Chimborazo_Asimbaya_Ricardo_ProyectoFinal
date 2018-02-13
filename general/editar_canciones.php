<!DOCTYPE html>
<html>
<head>
	<title>Informe</title>
	<style type="text/css">
		th, td {
			text-align: center;
		}
	</style>
</head>
<body>




  <?php
    if (empty($_GET)) {
      echo "No se han recibido datos del reparaciones";
      exit();
    }
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


  $query="SELECT p.* from Usuarios u join Pistas p ON u.IdUsuario=p.IdUsuario WHERE p.IdUsuario='".$_GET['hola']."'";


  if ($result = $connection->query($query)) {
      printf("<p>The select query returned %d rows.</p>", $result->num_rows);
      echo $query;
  ?>

      <!-- PRINT THE TABLE AND THE HEADER -->
      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>IdUsuario</th>
          <th>IdPista</th>
          <th>Nombre_Pista</th>
          <th>Genero</th>
          <th>Reproducciones_pista</th>
          <th>IdAutor</th>
          <th>IdAlbum</th>
      </thead>
join Pistas p ON u.IdUsuario=p.IdUsuario
  <?php
      //FETCHING OBJECTS FROM THE RESULT SET
      //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
          echo "<tr>";
            echo "<td>".$obj->IdUsuario."</td>";
            echo "<td>".$obj->IdPista."</td>";
            echo "<td>".$obj->Nombre_pista."</td>";
            echo "<td>".$obj->Genero."</td>";
            echo "<td>".$obj->Reproducciones_pista."</td>";
            echo "<td><a href='editar_autor.php?IdAutor=".$obj->IdAutor."'>".$obj->IdAutor."</a></td>";
            echo "<td><a href='editar_albums.php?IdAlbum=".$obj->IdAlbum."'>".$obj->IdAlbum."</a></td>";
            echo "<td>";
            echo "<a href='borrar_pista.php?idPista=".$obj->IdPista.
            "'><img src='eliminar.png' width='20px' /></a>";
            echo "</td>";
          echo "</tr>";

      }
      //Free the result. Avoid High Memory Usages
  } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
?>

</body>
</html>