<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="aparte.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>
      <div id="hola2" >
        <div class="row" id="hola3">
        <h1 style="color:black">Urban Music</H1>
        </div>
        <div id="hola4" class="row">
          <?php if (!isset($_POST["Gmail"])) : ?>

            <form method="post" >
              <fieldset>
                <span>Gmail:</span><input type="email" name="Email" required><br>
                <span>password:</span><input type="password" name="password" required><br>
                <p><?php
                echo md5($_POST["password"]);

                ?></p>
                <p><input type="submit" value="Iniciar Sesion"></p>
                <p><input type="submit" value="Registarte"></p>
          </form>
        </div>
        <?php else: ?>



        <?php endif?>

      </div>
  </body>
</html>
