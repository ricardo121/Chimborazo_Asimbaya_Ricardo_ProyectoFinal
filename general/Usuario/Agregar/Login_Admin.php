

<?php
  function Login() {


  if (isset($_SESSION["Gmail"])) {

    if ($_SESSION["tipo"]=='admin') {


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
