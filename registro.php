<?php
$errors = [];
$nombre = '';
$user = '';
$apellido = '';
$email = '';
$nacimiento = '';
$pass1 = '';
$pass2 = '';


if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $user = $_POST['usuario'];
  $email = $_POST['email'];
  $nacimiento = $_POST['fechanacimiento'];
  $provincia = $_POST['provincia'];
  $pass1 = $_POST['pass'];
  $pass2 = $_POST['passconf'];

      if(!isset($_POST['email'])){
        $errors['email'][]= 'Falta el campo email';
      }else{
        if(empty($_POST['email'])){
          $errors['email'][]= 'El email es requerido';
        }
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
          $errors['email'][]= 'El email no es valido';
          }
      }

      if(!isset($_POST['nombre'])){
        $errors['nombre'][]= 'Falta el campo nombre';
      }else if(empty($_POST['nombre'])){
          $errors['nombre'][]= 'El nombre es requerido';
      }

      if(!isset($_POST['apellido'])){
        $errors['apellido'][]= 'Falta el campo apellido';
      }else if(empty($_POST['apellido'])){
          $errors['apellido'][]= 'El apellido es requerido';
      }

      if(!isset($_POST['usuario'])){
        $errors['usuario'][]= 'Falta el campo nombre';
      }else if(empty($_POST['usuario'])){
          $errors['usuario'][]= 'El usuario es requerido';
      }else if(strlen($_POST['usuario'])<5 || $_POST['usuario']>12){
          $errors['usuario'][]= 'El usuario debe tener entre 6 y 12 caracteres';
        }

      if(!isset($_POST['fechanacimiento'])){
          $errors['fechanacimiento'][]= 'Falta el campo fecha';
        }else if(empty($_POST['fechanacimiento'])){
            $errors['fechanacimiento'][]= 'Ingrese una fecha';
      }

      if(!isset($_POST['pass']) || !isset($_POST['passconf'])){
        $errors['password'][]= 'Falta el campo password';
      }else if($_POST['pass'] != $_POST['passconf']){
          $errors['password'][]= 'Las contraseñas no coinciden';
      }else if(strlen($_POST['pass'])<5){
          $errors['password'][]= 'El password debe tener entre 6 y 12 caracteres';
      }

      if(isset($_POST['provincia'])){
        if ($_POST['provincia'] == 'seleccion'){
          $errors['provincia'][]= 'Debes seleccionar una opcion';
      }
        }

      if(!isset($_FILES['avatar'])){
        $errors['avatar'][]= 'Debe cargar un avatar';
      }else if(empty($_FILES['avatar'])){
          $errors['avatar'][]= 'El avatar es requerido';
      }
      if(!isset($_POST['terminos'])){
        $errors['terminos'][]='Debe aceptar los terminos y condiciones para pode continuar';
      }
    if(empty($errors)){
      $archivo = $_FILES['avatar']['tmp_name'];
      $nombreArchivo = $_FILES['avatar']['name'];
      $extension = pathinfo($nombreArchivo,PATHINFO_EXTENSION);
      $miArchivo = 'media/';
      $miArchivo = $miArchivo . md5($nombreArchivo) . '.' . $extension;
      move_uploaded_file($archivo,$miArchivo);
      $usuario = [
        'nombre' => $_POST['nombre'],
        'nombre' => $_POST['apellido'],
          'email' => $_POST['email'],
          'nacimiento' => $_POST['fechanacimiento'],
          'password' => password_hash($_POST['pass'],PASSWORD_DEFAULT),
          'provincia' => $_POST['provincia'],
          'avatar' => $miArchivo,
        ];

        $archivo = 'prueba.json';

        $usuarios = file_get_contents($archivo);
        $usuariosDecoded = json_decode($usuarios,true);
        $usuariosDecoded[] = $usuario;
        $jsonFinal = json_encode($usuariosDecoded, JSON_PRETTY_PRINT);
        file_put_contents($archivo,$jsonFinal);
    }
}
?>

<?php include 'include/head.php'?>
<body>
<?php include 'include/navegacion.php'?>

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
                <input id="nombre" type="text" value="<?= $nombre?>" class="form-control" name="nombre" placeholder="Ingresa tu nombre">
                <p><?= $errors['nombre'][0] ?? '' ?></p>
              </div>
              <div class="form-group col-md-6">
                <label for="inputApellido">Apellido</label>
                <input id="apellido" type="text" value="<?= $apellido?>" class="form-control" name="apellido" placeholder="Ingresa tu Apellido">
                <p><?= $errors['apellido'][0] ?? '' ?></p>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail">E-mail</label>
                <input id="mail" type="text" value="<?= $email?>" name="email" class="form-control" placeholder="Ingresa tu e-mail">
                <p><?= $errors['email'][0] ?? '' ?></p>
              </div>
              <div class="form-group col-md-6">
                <label for="inputUsuario">Usuario</label>
                <input id="nombre" type="text" value="<?= $user?>" class="form-control" name="usuario" placeholder="Ingresa tu usuario">
                <p><?= $errors['usuario'][0] ?? '' ?></p>
              </div>
          </div>
              <div class="form-group">
                <label for="inputCumple">Fecha de nacimiento</label>
                <input id="fechanacimiento" value="<?= $nacimiento?>" type="date" name="fechanacimiento" class="form-control" >
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
              <p><?= $errors['provincia'][0]?? '' ?> </p>
              <label for="avatarImagen">Carga tu avatar</label>

              <div class="custom-file">
                <input class="custom-file-input" type="file" name="avatar" id="customFile">
                <label class="custom-file-label" for="customFile"></label>
              </div>
              <p><?= $errors['avatar'][0] ?? '' ?></p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPassword">Contraseña</label>
                  <input id="pass" class="form-control" type="password" name="pass" value>
                  <p><?= $errors['password'][0] ?? '' ?></p>
                </div>
                <div class="form-group col-md-6">
                  <label>Reingresa tu contraseña</label>
                  <input id="passconf" class="form-control" type="password" name="passconf" value>
                </div>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="terminos">
                <label for="novedades" class="form-check-label">Aceptas términos y condicoines de <strong>BIG FASHION</strong>? </label>
                <p><?= $errors['terminos'][0] ?? ''?></p>
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
