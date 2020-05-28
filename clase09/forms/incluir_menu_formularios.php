<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Principal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="frmproducto.php">Productos</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="frmcliente.php">Clientes</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="frmventas.php">Ventas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php 
              $nombre_usuario = Ctrl_Session::get_nombre_usuario(); 
              echo $nombre_usuario;
            ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="frmcerrarsession.php">Cerrar Sesion</a>
            <a class="dropdown-item" href="#">Mi cuenta</a>
          </div>
        </li>
      </ul>
    </div>
</nav>