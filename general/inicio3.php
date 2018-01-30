<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="daniel.css"/>
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>

    <div class="container" id="contenedor" id="fondo" >


      <?php if (!isset($_POST["Email"])) : ?>
        <form method="post" id="formulario_registro">
            <span>Nombre:</span><input type="text" name="Nombre" required><br>
            <span>Apellidos:</span><input type="text" name="Apellidos" required><br>
            <span>Email:</span><input type="Email" name="Email" required><br>
            <span>password:</span><input type="password" name="password" required><br>
            <span>Edad:</span><input type="text" name="Edad"><br>
            <p><input type="submit" value="Registrase"></p>
        </form>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else: ?>

        <?php
            echo "<a href='ficha_coche.php?".
                 "matricula=".$_POST["matricula"].
                 "&km=".$_POST['km'].
                 "&fecha=".$_POST['fecha'].
                 "&marca=".$_POST['marca'].
                 "&modelo=".$_POST['modelo'].
                 "'>COCHE INSERTADO</a>";
        ?>

      <?php endif ?>
    </div>
  </body>
</html>
