<header>
  <nav class="navbar navbar-template navbar-expand-lg navbar-light bg-light justify-content-center">
    <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="index.php" class="navbar-brand mx-auto mb-0 h1">
      <span class="brand">Big Fashion</span>
    </a>
    <div class="d-flex flex-row order-2 order-lg-3">
          <ul class="navbar-nav flex-row">
            <li class="nav-item"><a href="#" class="nav-link px-2 carrito-nav">
              <i class=" fas fa-shopping-cart"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 carrito-nav">
              <i class="fas fa-heart"></i></a></li>
          </ul>
      </div>
      <div class="collapse navbar-collapse order-3 order-lg-2" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="fas fa-home carrito-nav"></i>Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-tshirt carrito-nav"></i>Indumentaria</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Camperas</a>
              <a class="dropdown-item" href="#">Remeras manga larga</a>
              <a class="dropdown-item" href="#">Chalecos</a>
              <a class="dropdown-item" href="#">Chombas</a>
              <a class="dropdown-item" href="#">Bermudas</a>
              <a class="dropdown-item" href="#">Musculosas</a>
              <a class="dropdown-item" href="#">Camisas</a>
              <a class="dropdown-item" href="#">Cinturones</a>
            </div>
            </li>
              <?php
                if(!empty($_SESSION) && !empty($_SESSION['usuario'])){
                  echo '<li class="nav-item1"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li><span class="navbar-text"><b> - Bienvenido</b> ' . $_SESSION['usuario']['usuario'].'</span>';
                }else{
                  echo '<li class="nav-item1"><a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt carrito-nav"></i>Login/Registro</a></li>';
                }
              ?>
        </ul>
      </div>
  </nav>
</header>