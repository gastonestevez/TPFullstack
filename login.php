<?php include 'include/head.php'?>
<body>
<?php include 'include/navegacion.php'?>

<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST) ){
  $email = "p@g.com";
  $pwd = "p";
  $errors = [];

  $emailIngresado = $_POST['email'];
  $pwdIngresada = $_POST['pwd'];

  if(empty($_POST['email'])){
    $errors['email'][] = "el mail esta vacio.";
  }
  if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    $errors['email'][] = "email invalido!";
  }
  if(empty($_POST['pwd'])){
    $errors['pwd'][] = "completa el password";
  }


  if($email == $emailIngresado && $pwd == $pwdIngresada){
    session_start();
    $_SESSION['email'] = $emailIngresado;
    header('location: index.php');
  }else{
    $errors['coincidencia'][] = 'Tu mail o contraseña no son validos.';
  }

}

?>

<section class="sectorLogin" id="Seccionlogin">
     <div class="login">
       <img src="img/img_2929.jpg" alt="logo">
        <h2>Mi cuenta en <strong>BIGFASHION</strong></h2>
        <h3> ¿Ya eres cliente?</h3>
        <h4> ¡Qué bueno verte!</h4><br>
          <div class="datos">
            <form class="login" action="login.php" method="post">
            <p><?= $errors['coincidencia'][0] ?? '' ?></p>
              <label for="email">Email:</label>
              <input type="text" name="email" value="" placeholder="Ingresa tu correo electrónico"><br><br>
              <p><?= $errors['email'][0] ?? '' ?></p>
              <label for="contrasena">Contraseña:</label>
              <input type="password" name="pwd" value="" placeholder="Ingresa tu contraseña"><br><br>
              <p><?= $errors['pwd'][0] ?? '' ?></p>
            <section class="recordame">
              <input type="checkbox" name="recordame" value="">
              <label for="recordame">recordame</label>
            </section>
              <button class="btn btn-dark d-block mx-auto" type="submit" name="enviar">ingresar</button>
            </form>
      </div>
</section>
</body>
