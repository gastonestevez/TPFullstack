<?php

include 'include/head.php';
include 'include/navegacion.php';

$errors=[];
$usuario ='';
$password ='';

if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
   $usuario = $_POST['usuario'];
   $password = $_POST['passwod'];

  if(!isset($_POST['usuario'])){
    $errors['usuario'][]= 'Ingresa su nombre de usuario';
  }else{
    if(empty($_POST['usuario'])){
      $errors['usuario'][]= 'El usuario es requerido';
    }
  }
    if(!isset($_POST['password'])){
      $errors['password'][]= 'Ingrese su contraseña';
    }else{
      if(strlen($_POST['password'])<5){
        $errors['password'][]= 'La contraseña debe tener entre 6 y 12 caracteres';

        if (empty ($errors)){
          $data = file_get_contents('usuarios.json');

          $usuarios = json_decode ($data, true);

          foreach ($usuarios as $usuario) {
            if ($usuario['usuario'] === $_POST['usuario'] && $usuario['password'] === $_POST['password']){
                $_SESSION['usuario'] = $usuario['usuario'];
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


<body>
<section class="Login" id="Seccionlogin">
     <div class="common">
       <ul>
         <li class="cliente"><a href="login.php">¿Ya eres cliente?</a></li>
         <li class="nuevo"><a href="registro.php">¿Nuevo en BIGFASHION?</a></li>
       </ul>
     </div>
      <div class="datos">
        <div class="titulos">
          <h3>Mi cuenta en  <strong>BIGFASHION</strong></h3>
          <h4> ¡Qué bueno verte!</h4><br>
        </div>
        <form class="formlogin"  action="login.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
          <p><?= $errors['coincidencia'][0] ?? '' ?></p>
          <div class="form-row">
              <div class="form-group col-md-8">
                <label for="usuario">Usuario</label>
                <input id="usuario" type="text" value="<?= $usuario?>"  class="form-control" name="usuario" placeholder="Ingresa tu usuario">
                <p><?= $errors['usuario'][0] ?? '' ?></p>
              </div>
              <div class="form-group col-md-8">
                <label for="password">Contraseña</label>
                <input id="password" class="form-control" type="password" name="password"value="<?= $password?>"
                placeholder="Ingresa tu contraseña">
                <p><?= $errors['password'][0] ?? '' ?></p>
              </div>
                  <div class="Recordame">
                <input type="checkbox" name="RECORDAME">
                <label for="recordame">recordame</label>
                <p><?= $errors['sin_usuario'] ?? '' ?></p>
              </div>
               <button class="btn btn-dark d-block mx-auto mt-4 " type="submit" name="login">Ingresar</button>
               <section class="cambiar_contrasena">
                 <a href="cambiar_contrasena.php">¿Olvidaste tu contraseña?</a>
               </section>
            </div>
        </form>
    </div>
  </div>
</section>
</body>
