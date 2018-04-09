<?php

  //Open the session
  session_start();

  if (isset($_SESSION["Gmail"])) {
    //SESSION ALREADY CREATED

    $Gmail=$_SESSION["Gmail"];
    //SHOW SESSION DATA

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


          <!-- PRINT THE TABLE AND THE HEADER -->
          <table class="table">
          <thead>
            <tr>
              <th><a href='Admin_Albums.php'>Albums</a></th>
              <th><a href='Admin_Autores.php'>Autores</a></th>
              <th><a href='Admin_Usuarios.php'>Usuarios</a></th>
              <th><a href='Admin_Pistas.php'>Pistas</a></th>
              <th><a href='Admin_Listas.php'>Listas</a></th>
          </thead>
    <tr>
    	<td>
    		<p>Añada un Nuevo Usuario</p>
    </td>
    	<td>
    		<a href='Añadir/Añadir_Usuario.php?'><img src='Añadir.png' width='20px' /></a>
    </td>
    </tr>
    <tr>
    	<td>
    		<p>Añada un Nuevo Album</p>
    </td>
    	<td>
    		<a href='Añadir/Añadir_Album.php?'><img src='Añadir.png' width='20px' /></a>
    </td>
    </tr>
    <tr>
    	<td>
    		<p>Añada un Nuevo Lista</p>
    </td>
    	<td>
    		<a href='Añadir/Añadir_Lista.php?'><img src='Añadir.png' width='20px' /></a>
    </td>
    </tr>
    <tr>
    	<td>
    		<p>Añada un Nuevo Autor</p>
    </td>
    	<td>
    		<a href='Añadir/Añadir_Autor.php?'><img src='Añadir.png' width='20px' /></a>
    </td>
    </tr>
    </div>
  </body>
</html>
