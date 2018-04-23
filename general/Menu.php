
      <?php
      function Menu() {
        echo "<nav class='navbar navbar-default' role='navigation'>";

        echo "<div class='collapse navbar-collapse navbar-ex1-collapse'>
          <ul class='nav navbar-nav'>
            <li><a href='Admin_Albums.php'>Albums</a></li>
            <li><a href='Admin_Autores.php'>Autores</a></li>
            <li><a href='Admin_Usuarios.php'>Usuarios</a></li>
            <li><a href='Admin_Pistas.php'>Pistas</a></li>
            <li><a href='Admin_Listas.php'>Listas</a></li>

          </ul>

          <ul class='nav navbar-nav navbar-right'>
            <li class='active'><a class='navbar-brand' href='Home_Admin.php'><img src='Casa.png' width='20px' /></a></li>
          </ul>
        </div>";

        echo "</nav>";
      }
      ?>
