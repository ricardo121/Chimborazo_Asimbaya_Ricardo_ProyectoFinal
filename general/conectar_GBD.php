<?php
function conectar($host ="localhost",
                  $user = "root",
                  $password = "Admin2015",
                  $bd = "Proyecto",
                  $port = 3316) {
  //CREATING THE CONNECTION
  $connection = new mysqli($host, $user, $password, $bd,$port);
  $connection->set_charset("uft8");
  //TESTING IF THE CONNECTION WAS RIGHT
  if ($connection->connect_errno) {
      echo "Error al conectar";
      return false;
  }
  return $connection;
}
?>
