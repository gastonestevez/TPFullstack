<?php

include 'include/head.php';
include 'include/navegacion.php';
require 'include/validacion.php';

if(isset($_SESSION['usuario']))
  $_SESSION['usuario']=$_POST['usuario'];

$validacion = new Validacion();
$errors=[];
$usuario ='';
$password ='';

if($validacion->esMethodPost()){
   $usuario = $_POST['usuario'];
   $password = $_POST['password'];

  if(!$validacion->esUsuario()){
    $errors['usuario'][]= 'Ingresa su nombre de usuario';
  }else if($validacion->estaVacioUsuario()){
      $errors['usuario'][]= 'El usuario es requerido';
  }

  if(!$validacion->esPassword()){
      $errors['password'][]= 'Ingrese su contraseña';
  }else if(!$validacion->validaAnchoDePassword(5,13)){
    $errors['password'][]= 'La contraseña debe tener entre 6 y 12 caracteres';
  }

  $usuarioEncontrado = $validacion->obtenerUsuarioIngresado();

  if ($usuarioEncontrado!=null && empty($errors)){
    $_SESSION['usuario'] = $usuarioEncontrado;
    header('location:index.php');
  }else if($usuarioEncontrado==null){
    $errors['sin_usuario'] = 'El usuario no se encuentra registrado';
  }
}

?>


<body>
<section class="col-lg-10 col-xl-6 mx-auto Login" id="Seccionlogin">
     <div class="col-lg-12 mx-auto common">
       <ul>
         <li class="cliente"><a href="login.php">¿Ya eres cliente?</a></li>
         <li class="nuevo"><a href="registro.php">¿Nuevo en BIGFASHION?</a></li>
       </ul>
     </div>

      <div class="datos">
        <div class="titulos">
          <h3>Mi cuenta en <strong>BIGFASHION</strong></h3>
          <h4> ¡Qué bueno verte!</h4><br>
        </div>
        <form class="formlogin"  action="login.php" method="post" enctype="multipart/form-data">
          <div class="form-row">

            <p><?= $errors['coincidencia'][0] ?? '' ?></p>
                <div class="form-group col-md-12">
                  <label for="usuario">Usuario</label>
                  <input id="usuario" type="text" value="<?= $usuario?>"  class="form-control" name="usuario" placeholder="Ingresa tu usuario">
                  <p><?= $errors['usuario'][0] ?? '' ?></p>
                </div>

                <div class="form-group col-md-12">
                  <label for="password">Contraseña</label>
                  <input id="password" class="form-control" type="password" name="password"value="<?= $password?>"
                  placeholder="Ingresa tu contraseña">
                  <p><?= $errors['password'][0] ?? '' ?></p>
                </div>

                <div class="form-check col-md-12">
                    <label for="recordame" class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="RECORDAME">
                    Recordame
                  </label>
                </div>
                <p><?= $errors['sin_usuario'] ?? '' ?></p>

                <button class="btn btn-dark d-block mx-auto mt-4" type="submit" name="login">Ingresar</button>

                <section class="cambiar_contrasena mx-auto mt-4">
                  <label for="cambiarPassword"><a href="cambiar_contrasena.php">¿Olvidaste tu contraseña?</a></label>
                </section>

          </div>
        </form>
    </div>
</section>
</body>
