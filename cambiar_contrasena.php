<?php

include 'include/head.php';
include 'include/navegacion.php';

$errors=[];

if(!isset($_POST['password']) || !isset($_POST['passconf'])){
  $errors['password'][]= 'Por favor ingrese su contraseña';
}else if($_POST['password'] != $_POST['passconf']){
    $errors['password'][]= 'Las contraseñas no coinciden';
}else if(strlen($_POST['password'])<5){
    $errors['password'][]= 'La contraseña debe tener entre 6 y 12 caracteres';
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>cambiar_contrasena</title>
  </head>
  <body>
    <form class="formcambiar_contrasena"  action="cambiar_contrasena.php" method="post" enctype="multipart/form-data">>
  <div class="column">
    <div class= "col-10 col-md-10 col-lg-10">
    <label for="ingrese_contrasena">Ingrese su contraseña</label>
    <input type="password" class="form-control" name="password">
      <p><?= $errors['password'][0] ?? '' ?></p>
  </div>
  <div class= "col-10 col-md-10 col-lg-10">
    <label for="reingrese_contrasena">Reingrese su contraseña</label>
    <input type="password" class="form-control" name="passconf" >
      <p><?= $errors['passwordconf'][0] ?? '' ?></p>
  </div>
  <div class= "col-10 col-md-10 col-lg-12">
  <button class="btn btn-dark d-block mx-auto mt-8" type="submit" name="resgistro">Ingresar</button>
</div>
</div>
</form>
  </body>
</html>
