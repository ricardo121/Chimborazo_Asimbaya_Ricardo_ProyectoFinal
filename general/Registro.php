<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Estilos2.css"/>

  </head>
  <body>

    <div class="container" id="contenedor" >


      <div class="row" >
      <?php if (!isset($_POST["Gmail"])) : ?>
        <form method="post" id="formulario_registro" >
          <fieldset>
            <legend>Registarte</legend>
            <span>Nombre:</span><input type="text" name="Nombre" required><br>
            <span>Apellidos:</span><input type="text" name="Apellidos" required><br>
            <span>Gmail:</span><input type="Email" name="Gmail" required><br>
            <span>password:</span><input type="password" name="password" required><br>
            <span>Edad:</span><input type="text" name="Edad"><br>
            <p><input type="submit" value="Registrase"></p>
          </fieldset>
        </form>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else: ?>

        <?php
        //CREATING THE CONNECTION
        $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto",3316);
        $connection->set_charset("uft8");
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        $Nom = $_POST["Nombre"];
        $Ape = $_POST["Apellidos"];
        $Em = $_POST["Email"];
        $Pass =  md5($_POST["password"]);
        $Edad = $_POST["Edad"];
        $query = "INSERT INTO Usuarios(IdUsuario,Nombre,Apellidos,Gmail,password,Edad)
        VALUES ('NULL','$Nom','$Ape','$Em','$Pass','$Edad')";
        echo $query;
        if ($connection->query($query)) {
          echo "Se ha Registardo en ...";
          $query ="SELECT * FROM Usuarios";
          if ($result = $connection->query($query)) {
            echo "<table>";


            //FETCHING OBJECTS FROM THE RESULT SET
            //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT

            while($obj = $result->fetch_object()) {

                //PRINTING EACH ROW
                echo "<tr>";
                  echo "<td>".$obj->IdUsuario."</td>";
                  echo "<td>".$obj->Nombre."</td>";
                  echo "<td>".$obj->Apellidos."</td>";
                  echo "<td>".$obj->Edad."</td>";
                  echo "<td>".$obj->password."</td>";
                echo "</tr>";
            }


            echo "</table>";
          }
        } else {
          echo "ERROR AL INSERTAR COCHE";
        }
        ?>

      <?php endif ?>
    </div>
    </div>
  </body>
</html>
