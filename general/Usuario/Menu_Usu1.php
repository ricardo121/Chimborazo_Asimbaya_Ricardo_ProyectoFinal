
<?php
function Menu1() {
  echo "<nav class='navbar navbar-inverse'  role='navigation' style='margin-bottom: 0px ;width=100%' >";

  echo "<div class='navbar-header' >
  <ul class='nav navbar-nav'  >
    <li><a href='Home_Usu.php'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Casa.png' width='20px' /></a></li>
  </ul>
  <ul class='nav navbar-nav'   >
    <li><a style='color:white;' class='navbar-brand' href='Tendencias_Pistas.php'>Tendencias</a></li>
  </ul>

  </div>
  <form class='navbar-form navbar-right' action='Cerrar.php' method='post'  >
    <button type='submit' class='btn btn-default' style='margin-right:15px'>Cerrar Sessión</button>
  </form>";

  echo "</nav>";
}
?>
