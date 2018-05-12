
      <?php
      function Menu2() {
        echo "<nav class='navbar navbar-inverse'  role='navigation' >";

        echo "<div class='navbar-header'>
          <a style='color:#9d9d9d; ' class='navbar-brand' href='Usu_Pistas.php'>Pistas</a>
          <a style='color:#9d9d9d; ' class='navbar-brand' href='Usu_Albums.php'>Albums</a>
          <a class='navbar-brand' href='Usu_Listas.php'>Listas</a>

        </div>

        <form action='Cerrar.php' method='post'>
        <ul class='nav navbar-nav navbar-right'>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'>Subir Pista</button></li>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'>Crear Album</button></li>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'>Crear Lista</button></li>
        </ul>
        </form>";

        echo "</nav>";
      }
      ?>
