
<?php
function Menu1() {
  echo "<nav class='navbar navbar-inverse' role='navigation' style='margin-bottom: 0px' >";

  echo "<div class='collapse navbar-collapse navbar-ex1-collapse'>
    <ul class='nav navbar-nav'>
      <li><a href='Home_Usu.php'><img src='/ricardo/Chimborazo_Asimbaya_Ricardo_ProyectoFinal/general/Iconos/Casa.png' width='20px' /></a></li>


    </ul>
    <form class='navbar-form navbar-left' role='search'>
      <div class='form-group'>
        <input type='text' class='form-control' placeholder='Buscar'>
      </div>
      <button type='submit' class='btn btn-default'>Enviar</button>
    </form>
    <form action='Cerrar.php' method='post'>
    <ul class='nav navbar-nav navbar-right'>
      <li><a style='color:#9d9d9d; ' class='navbar-brand' href='Usu_Pistas.php'></a></li>
      <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'>Cerrar Sessión</button></li>
    </ul>
    </form>
  </div>";

  echo "</nav>";
}
?>
