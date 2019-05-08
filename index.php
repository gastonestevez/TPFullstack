<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <!-- Styles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/styles.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>BIG FASHION</title>
  </head>
  <body>
   <header>
    <!-- Nav Nav Nav -->
    <nav class="navbar navbar-template navbar-expand-lg navbar-light bg-light justify-content-center ">
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- Brand -->
      <a class="navbar-brand mx-auto mb-0 h1"  href="#">
        Big Fashion
      </a>
      <div class="d-flex flex-row order-2 order-lg-3">
          <ul class="navbar-nav flex-row">
            <li class="nav-item"><a href="#" class="nav-link px-2 carrito-nav">
              <i class=" fas fa-shopping-cart"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 carrito-nav">
              <i class="fas fa-heart"></i></a></li>
          </ul>
      </div>
      <!-- Navbar links -->
      <div class="collapse navbar-collapse order-3 order-lg-2" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-home carrito-nav"></i>Inicio</a>
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
          <li class="nav-item">
            <a class="nav-link" href="#Seccionlogin"><i class="fas fa-sign-in-alt carrito-nav"></i>Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Seccionregistrarse"><i class="fas fa-user-plus carrito-nav"></i>Registrarse</a>
          </li> 
        </ul>
      </div>
    </nav>
  </header>
  <?php include 'homepage.php';?>
  <?php include 'login.php';?>
  <?php include 'registro.php';?>

</body>
</html>