
<?php
  session_start();
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="Inicio_P.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>
      <div class="container" id="contenedor">

        <div class="row">
        <h1 style="color:white; text-align: center">Urban Music</H1>
        </div>

        <div class="row">



            <form action="Inicio.php" method="post" id="formulario_inicio" >
              <fieldset>
                <legend>Registro</legend>
                <span>Gmail:</span><input type="Gmail" name="Gmail" required id="inputt"><br>
                <span>Password:</span><input type="Password" name="Password" required id="inputt"><br>
                <p><input type="submit" value="Iniciar Sesion"></p><br>
                <a style="color:#D1D1D1"; style="height:200px" href=Registro.php>Registrate Si Aun No Lo Estas</a>
          </form>


          <?php
              //FORM SUBMITTED
              if (isset($_POST["Gmail"])) {
                //CREATING THE CONNECTION
                $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto",3316);
                $connection->set_charset("uft8");
                //TESTING IF THE CONNECTION WAS RIGHT
                if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                }

                $Gmail=$_POST['Gmail'];
                $Password=md5($_POST["Password"]);

                $consulta1="select * from Usuarios where
                Gmail='$Gmail' and Password='$Password'";


                if ($result = $connection->query($consulta1)) {
                    //No rows returned
                    if ($result->num_rows===0) {
                      echo "LOGIN INVALIDO";
                    } else {

                        $_SESSION["Gmail"]=$_POST["Gmail"];


                        $obj = $result->fetch_object();

                        /*
                        while($obj = $result->fetch_object()) {
                            echo "<tr>";
                              echo "<td>".$obj->IdUsuario."</td>";
                              echo "<td>".$obj->Nombre."</td>";
                              echo "<td>".$obj->Apellidos."</td>";
                              echo "<td>".$obj->Gmail."</td>";
                              echo "<td>".$obj->Administrador."</td>";
                              echo "<td>".$obj->Edad."</td>";
                            echo "</tr>";
                        }
                        */

                        if ($obj->Administrador==1) {
                          $_SESSION["tipo"]='admin';
                            header("Location: Administrador/Home_Admin.php");
                        } else {
                          $_SESSION["tipo"]='usu';
                            header("Location: Usuario/Home_Usu.php");
                        }


                    }


                }
                else {
                  echo "Wrong Query";
                }
            }
          ?>


        </div>

      </div>
  </body>
</html>
