<?php

  //Open the session
  session_start();
  var_dump ($_SESSION);

  if (isset($_SESSION["tipo"])) {
    //SESSION ALREADY CREATED



  } else {
    session_destroy();
    header("Location: inicio.php");
  }


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

      <nav class="navbar navbar-inverse" role="navigation">

        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a href="Admin_Albums.php">Albums</a></li>
            <li><a href="Admin_Autores.php">Autores</a></li>
            <li><a href="Admin_Usuarios.php">Usuarios</a></li>
            <li><a href="Admin_Pistas.php">Pistas</a></li>
            <li><a href="Admin_Listas.php">Listas</a></li>

          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a class="navbar-brand" href='Home_Admin.php'><img src='Casa.png' width='20px' /></a></li>
          </ul>
        </div>

      </nav>

    <table class="table">

    <tr>
    	<td>
    		<p>Añada un Nuevo Usuario</p>
    </td>
    	<td>
    		<a href='Agregar/Agregar_Usuario.php?'><img src='Agregar.png' width='20px' /></a>
    </td>
    </tr>
    <tr>
    	<td>
    		<p>Añada un Nuevo Album</p>
    </td>
    	<td>
    		<a href='Agregar/Agregar_Album.php?'><img src='Agregar.png' width='20px' /></a>
    </td>
    </tr>
    <tr>
    	<td>
    		<p>Añada un Nuevo Lista</p>
    </td>
    	<td>
    		<a href='Agregar/Agregar_Lista.php?'><img src='Agregar.png' width='20px' /></a>
    </td>
    </tr>
    <tr>
    	<td>
    		<p>Añada un Nuevo Autor</p>
    </td>
    	<td>
    		<a href='Agregar/Agregar_Autor.php?'><img src='Agregar.png' width='20px' /></a>
    </td>
    </tr>
    </div>
  </body>
</html>
