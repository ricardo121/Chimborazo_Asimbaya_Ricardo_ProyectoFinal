
<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="Estilos1.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>
      <div class="container" id="contenedor">

        <div class="row">
        <h1 style="color:white; text-align: center">Urban Music</H1>
        </div>

        <div class="row">
        <?php
            //FORM SUBMITTED
            if (isset($_POST["Gmail"])) {
              //CREATING THE CONNECTION
              $connection = new mysqli("localhost", "tf", "2asirtriana", "tf");
              //TESTING IF THE CONNECTION WAS RIGHT
              if ($connection->connect_errno) {
                  printf("Connection failed: %s\n", $connection->connect_error);
                  exit();
              }
              //MAKING A SELECT QUERY
              //Password coded with md5 at the database. Look for better options
              $consulta="select * from usuario where
              Gmail='".$_POST["Gmail"]."' and password=md5('".$_POST["password"]."');";
              //Test if the query was correct
              //SQL Injection Possible
              //Check http://php.net/manual/es/mysqli.prepare.php for more security
              if ($result = $connection->query($consulta)) {
                  //No rows returned
                  if ($result->num_rows===0) {
                    echo "LOGIN INVALIDO";
                  } else {
                    //VALID LOGIN. SETTING SESSION VARS
                    $_SESSION["IdUsuario"]=$_POST["Idusuario"];
                    $_SESSION["language"]="es";
                    header("Location: index.php");
                  }
              } else {
                echo "Wrong Query";
              }
          }
        ?>


            <form method="post" id="formulario_inicio" >
              <fieldset>
                <legend>Registro</legend>
                <span>Gmail:</span><input type="email" name="Email" required id="inputt"><br>
                <span>password:</span><input type="password" name="password" required id="inputt"><br>
                <p><input type="submit" value="Iniciar Sesion"></p><br>
                <a style="color:#D1D1D1"; style="height:200px" href=Registro.php>Registarte si aun no lo Estas</a>
          </form>


</div>

      </div>
  </body>
</html>
