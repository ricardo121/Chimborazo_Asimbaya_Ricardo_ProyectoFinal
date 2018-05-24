
      <?php
      function Menu() {
        echo "<nav class='navbar navbar-inverse' role='navigation' >";

        echo "<div class='navbar-header'>
            <a class='navbar-brand' href='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Albums.php'>Albums</a>
            <a class='navbar-brand' href='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Autores.php'>Autores</a>
            <a class='navbar-brand' href='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Usuarios.php'>Usuarios</a>
            <a class='navbar-brand' href='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Pistas.php'>Pistas</a>
            <a class='navbar-brand' href='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Administrador/Admin_Listas.php'>Listas</a>
            </div>
            <form class='navbar-form navbar-right' action='Cerrar.php' method='post'  >
              <button type='submit' class='btn btn-default' style='margin-right:15px'>Cerrar Sessión</button>
            </form>";

        echo "</nav>";
      }
      ?>
