

<?php
  function Login() {


  if (isset($_SESSION["Gmail"])) {

    if ($_SESSION["tipo"]=='admin') {

      
    } else {
      session_destroy();
      header("Location: inicio.php");
    }


  } else {
    session_destroy();
    header("Location: inicio.php");
  }

  }

 ?>
