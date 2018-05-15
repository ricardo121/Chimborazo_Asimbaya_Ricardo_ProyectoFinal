

<?php

	session_start();
	include_once("Login_Admin.php");
	Login();

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mostrar Listas</title>
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


  $query="SELECT * from Listas L join Usuarios U on L.IdUsuario=U.IdUsuario";


  if ($result = $connection->query($query)) {
      printf("<p>The select query returned %d rows.</p>", $result->num_rows);

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
							<th>Gmail</th>
          		<th>IdLista</th>
          		<th>Nombre_Lista</th>
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
						echo "<td>".$obj->IdUsuario."</td>";
						echo "<td>".$obj->Gmail."</td>";
            echo "<td><a href='Admin_Contener.php?Lista=".$obj->IdLista."'>".$obj->IdLista."</a></td>";
            echo "<td>".$obj->Nombre_Lista."</td>";
            echo "<td>";
            echo "<a href='Eliminar/Borrar_Lista.php?borrar=".$obj->IdLista.
            "'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Eliminar.png' width='20px' /></a>";
            echo "</td>";
						echo "<td>";
						echo "<a href='Editar/Editar_Lista.php?editar=".$obj->IdLista.
						"'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/lapiz.png' width='20px' /></a>";
						echo "</td>";
						echo "<td>";
						echo "<a href='Agregar/Agregar_Contener.php?agregar=".$obj->IdLista.
						"'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Agregar.png' width='20px' /></a>";
						echo "</td>";
          echo "</tr>";

      }
      //Free the result. Avoid High Memory Usages
  } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
?>
				<tr>
					<td>
						<p>Añada un Nuevo Lista</p>
					</td>
					<td>
						<a href='Agregar/Agregar_Lista.php?'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Agregar.png' width='20px' /></a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>
