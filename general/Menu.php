
      <?php
      function Menu() {
        echo "<nav class='navbar navbar-inverse' role='navigation' >";

        echo "<div class='collapse navbar-collapse navbar-ex1-collapse'>
          <ul class='nav navbar-nav'>
            <li><a href='Admin_Albums.php'>Albums</a></li>
            <li><a href='Admin_Autores.php'>Autores</a></li>
            <li><a href='Admin_Usuarios.php'>Usuarios</a></li>
            <li><a href='Admin_Pistas.php'>Pistas</a></li>
            <li><a href='Admin_Listas.php'>Listas</a></li>

          </ul>

          <ul class='nav navbar-nav navbar-right' style=>
            <li><button href='Cerrar.php' type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'><a href='Cerrar.php'>Cerrar Sessión</a></button></li>
          </ul>
        </div>";

        echo "</nav>";
      }
      ?>
