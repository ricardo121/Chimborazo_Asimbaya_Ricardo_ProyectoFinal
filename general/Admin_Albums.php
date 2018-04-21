<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mostrar Albums</title>
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


  $query="SELECT IdAlbum,Nombre_Album from Albums";


  if ($result = $connection->query($query)) {
      printf("<p>The select query returned %d rows.</p>", $result->num_rows);
  ?>

      <!-- PRINT THE TABLE AND THE HEADER -->
			<?php
				include_once("Menu.php");
				Menu();
						?>
      <table class="table">
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
            echo "<a href='Eliminar/Borrar_Album.php?borrar=".$obj->IdAlbum.
            "'><img src='eliminar.png' width='20px' /></a>";
            echo "</td>";
						echo "<td>";
						echo "<a href='Editar/Editar_Album.php?editar=".$obj->IdAlbum.
						"'><img src='lapiz.png' width='20px' /></a>";
						echo "</td>";
          echo "</tr>";

      }
      //Free the result. Avoid High Memory Usages
  } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
?>
	</div>
</body>
</html>
