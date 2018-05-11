
<?php
function Menu1() {
  echo "<nav class='navbar navbar-inverse' role='navigation' >";

  echo "<div class='collapse navbar-collapse navbar-ex1-collapse'>
    <ul class='nav navbar-nav'>
      <li><a href='Home_Usu.php'><img src='Casa.png' width='20px' /></a></li>


    </ul>
    <form class='navbar-form navbar-left' role='search'>
      <div class='form-group'>
        <input type='text' class='form-control' placeholder='Buscar'>
      </div>
      <button type='submit' class='btn btn-default'>Enviar</button>
    </form>
    <form action='Cerrar.php' method='post'>
    <ul class='nav navbar-nav navbar-right'>
      <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'>Cerrar Sessión</button></li>
      <li><button type='submit' class='btn btn-default navbar-btn' style='margin-right:15px'>Cerrar Sessión</button></li>
    </ul>
    </form>
  </div>";

  echo "</nav>";
}
?>
