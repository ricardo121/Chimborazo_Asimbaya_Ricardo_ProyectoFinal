<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body bgcolor="#C6B5B1">


      <?php if (!isset($_POST["Nombre"])) : ?>
        <form method="post">
          <fieldset>
            <span>Nombre:</span><input type="text" name="Nombre" required><br>
            <span>Apellidos:</span><input type="text" name="Apellidos" required><br>
            <span>Email:</span><input type="email" name="Email" required ><br>
            <span>contraseña:</span><input type="password" name="contraseña" required><br>
            <p><input type="submit" value="Send"></p>
        </form>

      <?php else: ?>

        <?php
            echo "<h3>Showing data coming from the form</h3>";
            var_dump($_POST);
        ?>

      <?php endif?>

  </body>
</html>
