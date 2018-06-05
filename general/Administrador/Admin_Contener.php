

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
      if (empty($_GET)) {
        echo "No se han recibido datos de la Lista";
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


  $query="SELECT * from Listas L join Contener C on L.IdLista=C.IdLista join Pistas P on P.IdPista=C.IdPista where L.IdLista='".$_GET['Lista']."'";


  if ($result = $connection->query($query)) {
      
  ?>

      <!-- PRINT THE TABLE AND THE HEADER -->
			<?php
        include_once("Menu_Admin.php");
        Menu();
            ?>
      <table class="table">
      <thead>
        <tr>
          <th>IdLista</th>
          <th>Nombre_Lista</th>
          <th>IdPista</th>
          <th>Nombre_Pista</th>
					<th></th>
      </thead>

  <?php
      //FETCHING OBJECTS FROM THE RESULT SET
      //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
          echo "<tr>";
            echo "<td>".$obj->IdLista."</td>";
            echo "<td>".$obj->Nombre_Lista."</td>";
            echo "<td>".$obj->IdPista."</td>";
            echo "<td>".$obj->Nombre_Pista."</td>";
            echo "<td>";
            echo "<a href='Eliminar/Borrar_Contener.php?borrar1=".$obj->IdPista.
            "&borrar2=".$obj->IdLista.
            "'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Eliminar.png' width='20px' /></a>";
            echo "</td>";
          echo "</tr>";

      }
      //Free the result. Avoid High Memory Usages
  } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
?>
	</div>
</body>
</html>
