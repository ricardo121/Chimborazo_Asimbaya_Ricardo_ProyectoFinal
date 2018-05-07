

<?php
  function Login() {

  //Open the session
  //session_start();


  if (isset($_SESSION["Gmail"])) {

    if ($_SESSION["tipo"]=='usu') {
      $Gmail=$_SESSION["Gmail"];

    } else {
      session_destroy();
      header("Location: inicio.php");
    }


  } else {
    session_destroy();
    header("Location: inicio.php");
  }
  return $Gmail;
  }

 ?>
