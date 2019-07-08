<?php
include 'include/head.php';
include 'include/navegacion.php';
require 'include/ValidacionUsuario.php';
require 'include/Usuario.php';
$newUser = new Usuario;
$valUsuario = new ValidacionUsuario;
if( $_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
  $newUser->setUsuario($_POST['usuario'])
          ->setPassword($_POST['password']);
  $valUsuario->setUsuario($newUser);
  $valUsuario->validarUsuario();
}
        
//$validacion = new Validacion($_POST);
//$validacion->procesarLogin();


?>
<body class="backLogin">
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
          
            <p><?= $valUsuario->getErrors()['coincidencia'][0] ?? '' ?></p>
                <div class="form-group col-md-12">
                  <label for="usuario">Usuario</label>
                  <input id="usuario" type="text" value="<?= $_POST['usuario'] ?? ''?>"  class="form-control" name="usuario" placeholder="Ingresa tu usuario">
                  <p><?= $valUsuario->getErrors()['usuario'][0] ?? '' ?></p>
                </div>

                <div class="form-group col-md-12">
                  <label for="password">Contraseña</label>
                  <input id="password" class="form-control" type="password" name="password" placeholder="Ingresa tu contraseña">
                  <p><?= $valUsuario->getErrors()['password'][0] ?? '' ?></p>
                </div>

                <div class="form-check col-md-12">
                    <label for="recordame" class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="RECORDAME">
                    Recordame
                  </label>
                </div>
                <p><?= $valUsuario->getErrors()['sin_usuario'][0] ?? '' ?></p>

                <button class="btn btn-dark d-block mx-auto mt-4" type="submit" name="login">Ingresar</button>
               
                  <label for="cambiarPassword" class="text-center d-block cambiar_contrasena mt-4">
                    <a href="cambiar_contrasena.php">¿Olvidaste tu contraseña?</a></label>
                
        </form>
    </div>
</section>
</body>