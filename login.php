<?php include 'include/head.php'?>
<body>
<?php include 'include/navegacion.php'?>

<?php
session_start();
 $errors=[];

if(!empty ($_POST)){

  if(!isset($_POST['email'])){
    $errors['email'][]= 'Falta el campo email';
  } else{

    if(empty($_POST['email'])){
      $errors['email'][]= 'El email es requerido';
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errors['email'][]= 'El email no es valido';
      }
    }

    if(!isset($_POST['password'])){
      $errors['password'][]= 'Falta el campo password';
    } else{

      if(strlen($_POST['password'])<5){
        $errors['email'][]= 'El password debe tener entre 6 y 12 caracteres';
        if (empty ($errors)){

          $data = file_get_contents('data.json');

          $usuarios = json_decode ($data, true);

          foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $_POST['email'] && $usuario['password'] === $_POST['password']){
                $_SESSION['email'] = $usuario['email'];
                header('location:index.php');
                break;
            }
          }
          $errors['sin_usuario'] = 'El usuario no se encuentra registrado';
        }
        }

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
              <label for="text">Usuario:</label>
              <input type="text" name="usuario" value="" placeholder="Ingresa tu ususario"><br><br>
              <p><?= $errors['email'][0] ?? '' ?></p>
              <label for="contrasena">Contraseña:</label>
              <input type="password" name="password" value="" placeholder="Ingresa tu contraseña"><br><br>
              <p><?= $errors['password'][0] ?? '' ?></p>
              <p><?= $errors['sin_usuario'] ?? '' ?></p>
            <section class="recordame">
              <input type="checkbox" name="recordame" value="">
              <label for="recordame">recordame</label>
            </section>
              <button class="btn btn-dark d-block mx-auto" type="submit" name="enviar">ingresar</button>
            </form>
      </div>
</section>
</body>
