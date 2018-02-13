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


  $query="SELECT * from Albums WHERE IdAlbum='".$_GET['IdAlbum']."'";


  if ($result = $connection->query($query)) {
      printf("<p>The select query returned %d rows.</p>", $result->num_rows);
      echo $query;
  ?>

      <!-- PRINT THE TABLE AND THE HEADER -->
      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>IdAlbum</th>
          <th>Nombre_Album</th>
      </thead>

  <?php
      //FETCHING OBJECTS FROM THE RESULT SET
      //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
          echo "<tr>";
            echo "<td>".$obj->IdAlbum."</td>";
            echo "<td>".$obj->Nombre_Album."</td>";
            echo "<td>";
            echo "<a href='borrar_album.php?idPista=".$obj->IdAlbum.
            "'><img src='eliminar.png' width='20px' /></a>";
            echo "</td>";
          echo "</tr>";

      }
      //Free the result. Avoid High Memory Usages
  } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
?>

</body>
</html>
