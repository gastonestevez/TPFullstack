<?php
include 'include/head.php';
include 'include/navegacion.php';
require 'include/Usuario.php';
require 'src/config.php';
require 'Factory.php';
require 'include/ValidacionRegistro.php';

$valRegistro = new ValidacionRegistro;

if( $_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
  $user = new Usuario;
  $user->setNombre($_POST['nombre'])
      ->setApellido($_POST['apellido'])
      ->setUsuario($_POST['usuario'])
      ->setEmail($_POST['email'])
      ->setNacimiento($_POST['nacimiento'])
      ->setPassword($_POST['pass'])
      ->setProvincia($_POST['provincia'])
      ->setAvatar($_FILES['avatar']);

      $valRegistro->setUsuario($user)
                  ->setPass2($_POST['passconf'])
                  ->setAceptaTerminos(isset($_POST['terminos']));

      if($valRegistro->validarRegistro()){
        try {
          $storage = Factory::get('storages', 'db');
          $user->save($storage);
          header('location:index.php');
          } catch (Exception $e) {
            echo $e->getMessage();
          }
      }


}

?>
<body>
 <section class="general" id="Seccionregistrarse">
   <div class="commonr">
     <ul>
       <li class="cliente"><a href="login.php">¿Ya eres cliente?</a></li>
       <li class="nuevo"><a href="registro.php">¿Nuevo en BIGFASHION?</a></li>
     </ul>
   </div>
  <div class="registro">
      <div class="titulos">
        <h2>Mi cuenta en <strong>BIGFASHION</strong></h2>
        <h3>Registrate y enterate de nuestras novedades y Ofertas!</h3><br>
      </div>
        <form class="formRegistro"  action="registro.php" method="post" enctype="multipart/form-data">
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputNombre">Nombre</label>
                <input id="nombre" type="text" value="<?= $_POST['nombre'] ?? '' ?>" class="form-control" name="nombre" placeholder="Ingresa tu nombre">
                <p><?= $valRegistro->getErrors()['nombre'][0] ?? '' ?></p>
              </div>
              
              <div class="form-group col-md-6">
                <label for="inputApellido">Apellido</label>
                <input id="apellido" type="text" value="<?= $_POST['apellido'] ?? '' ?>" class="form-control" name="apellido" placeholder="Ingresa tu Apellido">
                <p><?= $valRegistro->getErrors()['apellido'][0] ?? '' ?></p>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail">E-mail</label>
                <input id="mail" type="text" value="<?= $_POST['email'] ?? '' ?>" name="email" class="form-control" placeholder="Ingresa tu e-mail">
                <p><?= $valRegistro->getErrors()['email'][0] ?? '' ?></p>
              </div>
              <div class="form-group col-md-6">
                <label for="inputUsuario">Usuario</label>
                <input id="nombre" type="text" value="<?= $_POST['usuario'] ?? ''?>" class="form-control" name="usuario" placeholder="Ingresa tu usuario" title="Debe ser mayor a 6 letras :)">
                <p><?= $valRegistro->getErrors()['usuario'][0] ?? '' ?></p>
              </div>
          </div>
              <div class="form-group">
                <label for="inputCumple">Fecha de nacimiento</label>
                <input id="fechanacimiento" value="<?= $_POST['nacimiento'] ?? '' ?>" type="date" name="nacimiento" class="form-control" >
                <p><?= $valRegistro->getErrors()['fechanacimiento'][0] ?? '' ?></p>
              </div>
              <div class="form-group">
              <label for="inputProvincia">Provincia</label>
                <select class="form-control" name="provincia" id="provincia">
                  <option value="seleccion">Seleccione una opcion</option>
                  <option value="Buenos Aires">Bs. As.</option>
                  <option value="Catamarca">Catamarca</option>
                  <option value="Chaco">Chaco</option>
                  <option value="Chubut">Chubut</option>
                  <option value="Cordoba">Cordoba</option>
                  <option value="Corrientes">Corrientes</option>
                  <option value="Entre Rios">Entre Rios</option>
                  <option value="Formosa">Formosa</option>
                  <option value="Jujuy">Jujuy</option>
                  <option value="La Pampa">La Pampa</option>
                  <option value="La Rioja">La Rioja</option>
                  <option value="Mendoza">Mendoza</option>
                  <option value="Misiones">Misiones</option>
                  <option value="Neuquen">Neuquen</option>
                  <option value="Rio Negro">Rio Negro</option>
                  <option value="Salta">Salta</option>
                  <option value="San Juan">San Juan</option>
                  <option value="San Luis">San Luis</option>
                  <option value="Santa Cruz">Santa Cruz</option>
                  <option value="Santa Fe">Santa Fe</option>
                  <option value="Sgo. del Estero">Sgo. del Estero</option>
                  <option value="Tierra del Fuego">Tierra del Fuego</option>
                  <option value="Tucuman">Tucuman</option>
               </select>
              </div>
              <p><?= $valRegistro->getErrors()['provincia'][0] ?? '' ?></p>
              <label for="avatarImagen">Carga tu avatar</label>

              <div class="custom-file">
                <input class="custom-file-input" type="file" name="avatar" id="customFile">
                <label class="custom-file-label" for="customFile"></label>
              </div>
              <p><?= $valRegistro->getErrors()['avatar'][0] ?? '' ?></p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPassword">Contraseña</label>
                  <input id="pass" class="form-control" type="password" name="pass" title="Debe ser entre 6 y 12 letras" value>
                  <p><?= $valRegistro->getErrors()['password'][0] ?? '' ?></p>
                </div>
                <div class="form-group col-md-6">
                  <label>Reingresa tu contraseña</label>
                  <input id="passconf" class="form-control" type="password" name="passconf" value>
                </div>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="terminos">
                <label for="novedades" class="form-check-label">Aceptas términos y condiciones de <strong>BIG FASHION</strong>? </label>
              <p><?= $valRegistro->getErrors()['terminos'][0] ?? '' ?></p>
              </div>
                <button class="btn btn-dark d-block mx-auto mt-4 " type="submit" name="resgistro">Registrarme</button>
        </form>
    </div>
  </div>
</section>
</body>

<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
