<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mostrar Autores</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
</head>
<body>
  <div class="container">





<nav class="navbar navbar-inverse" role="navigation">

  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="Admin_Albums.php">Albums</a></li>
      <li><a href="Admin_Autor.php">Autores</a></li>
      <li><a href="Admin_Usuarios.php">Usuarios</a></li>
      <li><a href="Admin_Pistas.php">Pistas</a></li>
      <li><a href="Admin_Listas.php">Listas</a></li>

    </ul>


          <?php
          function Menu() {
            echo "<table class='table'>";

            echo "<thead style='background-color: #8adfcc'>
            <tr>
              <th><a href='Admin_Albums.php'>Albums</a></th>
              <th><a href='Admin_Autores.php'>Autores</a></th>
              <th><a href='Admin_Usuarios.php'>Usuarios</a></th>
              <th><a href='Admin_Pistas.php'>Pistas</a></th>
              <th><a href='Admin_Listas.php'>Listas</a></th>
                  </tr>
            </thead>";

            echo "</table>";
          }
          ?>

    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a class="navbar-brand" href='Admin_Admin.php'><img src='Casa.png' width='20px' /></a></li>
    </ul>
  </div>
</nav>

</div>

</body>

</html>
