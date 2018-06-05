

<?php

  session_start();
  include_once("Login_Admin.php");
  Login();

  $Gmail=$_SESSION["Gmail"];



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

       $query="SELECT * from Usuarios  WHERE Gmail='$Gmail'";


       if ($result = $connection->query($query)) {


           while($obj = $result->fetch_object()) {

               $Edad_usu =$obj->Edad;
               $Nombre_usu = $obj->Nombre;


           }
           //Free the result. Avoid High Memory Usages
       } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

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
      <div class="row">

        <script style="text-align='center'">alert("<?php echo"Bienvenido"." ". $Nombre_usu." "."a la Pantalla de Adminitracion del sitio Web"; ?>");
          window.location.href = '/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Usuarios.php'
        </script>


      </div>
    </div>
  </body>
</html>
