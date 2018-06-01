

      <?php
      function Menu2() {
        echo "<nav class='navbar navbar-inverse'  role='navigation' >";
        echo "<div class='navbar-header'>
          <a class='navbar-brand' href='Usu_Pistas.php'>Pistas</a>
          <a class='navbar-brand' href='Usu_Albums.php'>Albums</a>
          <a class='navbar-brand' href='Usu_Listas.php'>Listas</a>
        </div>
        <form  method='post'>
        <ul class='nav navbar-nav navbar-right'>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:17px'><a href='Agregar/Agregar_Pista_Usu.php?agregar1=".$_SESSION['idusu'].
          "'>Subir Pista</a></button></li>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:17px'><a href='Agregar/Agregar_Album.php?'>Crear Album</a></button></li>
          <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:17px'><a href='Agregar/Agregar_Lista.php?agregar2=".$_SESSION['idusu'].
          "'>Crear Lista</a></button></li>
        </ul>
        </form>";
        echo "</nav>";
      }
      ?>
