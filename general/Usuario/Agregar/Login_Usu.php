

<?php
  function Login() {

  //Open the session
  //session_start();


  if (isset($_SESSION["Gmail"])) {

    if ($_SESSION["tipo"]=='usu') {
      $Gmail=$_SESSION["Gmail"];

    } else {
      session_destroy();
      header("Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Inicio.php");
    }


  } else {
    session_destroy();
    header("Location: /ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Inicio.php");
  }

  }

 ?>
