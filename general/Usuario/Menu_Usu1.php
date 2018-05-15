
<?php
function Menu1() {
  echo "<nav class='navbar navbar-inverse' role='navigation' style='margin-bottom: 0px' >";

  echo "<div class='navbar-header'>
    <ul class='nav navbar-nav'>
      <li><a href='Home_Usu.php'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Casa.png' width='20px' /></a></li>
    </ul>
    <form class='navbar-form navbar-left' role='search'>
      <div class='form-group'>
        <input type='text' class='form-control' placeholder='Buscar'>
      </div>
      <button type='submit' class='btn btn-default'>Enviar</button>
    </form>
    <ul class='nav navbar-nav'>
      <li><a style='color:#9d9d9d; ' class='navbar-brand' href='Usu_Pistas.php'>Tendencias</a></li>
    </ul>

  </div>
  <form class='navbar-form navbar-right' action='Cerrar.php' method='post'>
    <button type='submit' class='btn btn-default' style='margin-right:15px'>Cerrar Sessión</button>
  </form>";

  echo "</nav>";
}
?>
