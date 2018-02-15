<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mostrar Clientes</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
</head>
<body>
	<div class="container">




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


  $query="SELECT * from Usuarios u join Pistas p ON u.IdUsuario=p.IdUsuario WHERE p.IdUsuario='".$_GET['Usuario']."'";


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
          <th>IdAutor</th>
          <th>IdAlbum</th>
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
            echo "<td>".$obj->Nombre_pista."</td>";
            echo "<td>".$obj->Genero."</td>";
            echo "<td>".$obj->Reproducciones_pista."</td>";
            echo "<td><a href='Admin_Autores.php?IdAutor=".$obj->IdAutor."'>".$obj->IdAutor."</a></td>";
            echo "<td><a href='Admin_Albums.php?IdAlbum=".$obj->IdAlbum."'>".$obj->IdAlbum."</a></td>";
            echo "<td>";
            echo "<a href='Eliminar/Borrar_Pista.php?borrar=".$obj->IdPista.
            "'><img src='eliminar.png' width='20px' /></a>";
						echo "<td>";
						echo "<a href='Editar/Editar_Pista.php?editar=".$obj->IdPista.
						"'><img src='lapiz.png' width='20px' /></a>";
						echo "</td>";
						echo "<td>";
						echo "<a href='Añadir/Añadir_Pista.php?añadir=".$obj->IdAutor.
						"'><img src='Añadir.png' width='20px' /></a>";
						echo "</td>";
          echo "</tr>";

      }
      //Free the result. Avoid High Memory Usages
  } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
?>
	</div>
</body>
</html>
