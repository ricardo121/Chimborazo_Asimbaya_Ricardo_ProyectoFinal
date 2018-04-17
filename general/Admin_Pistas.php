<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mostrar Pistas</title>
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


  $query="SELECT * from Usuarios u join Pistas p ON u.IdUsuario=p.IdUsuario join Albums al ON al.IdAlbum=p.IdAlbum join Autores au ON au.IdAutor=p.IdAutor";


  if ($result = $connection->query($query)) {

  ?>

      <!-- PRINT THE TABLE AND THE HEADER -->
      <table class="table">
      <thead>
        <tr>
          <th>IdUsuario</th>
					<th>Gmail</th>
          <th>IdPista</th>
          <th>Nombre_Pista</th>
          <th>Genero</th>
          <th>Reproducciones_pista</th>
          <th>Autor</th>
          <th>Album</th>
      </thead>

  <?php
      //FETCHING OBJECTS FROM THE RESULT SET
      //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
          echo "<tr>";
            echo "<td>".$obj->IdUsuario."</td>";
						echo "<td>".$obj->Gmail."</td>";
            echo "<td>".$obj->IdPista."</td>";
            echo "<td>".$obj->Nombre_Pista."</td>";
            echo "<td>".$obj->Genero."</td>";
            echo "<td>".$obj->Reproducciones_Pista."</td>";
            echo "<td>".$obj->Nombre_Album."</td>";
            echo "<td>".$obj->Nombre_Autor."</td>";
            echo "<td>";
            echo "<a href='Eliminar/Borrar_Pista.php?borrar=".$obj->IdPista.
            "'><img src='eliminar.png' width='20px' /></a>";
						echo "<td>";
						echo "<a href='Editar/Editar_Pista.php?editar=".$obj->IdPista.
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
