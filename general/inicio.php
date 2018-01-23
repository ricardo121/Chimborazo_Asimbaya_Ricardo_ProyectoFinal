<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body bgcolor="#C6B5B1">


      <?php if (!isset($_POST["Gmail"])) : ?>

        <form method="post" class="form1">
          <fieldset>
            <span>Gmail:</span><input type="text" name="Gmail" required><br>
            <span>password:</span><input type="text" name="password" required><br>
            <p><input type="submit" value="Iniciar Sesion"></p>
            <p><input type="submit" value="Registarte"></p>
        </form>
      <?php else: ?>

        <?php
            echo "<h3>Showing data coming from the form</h3>";
            var_dump($_POST);
        ?>

      <?php endif?>

  </body>
</html>
