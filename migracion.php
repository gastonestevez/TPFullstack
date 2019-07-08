<?php
require 'src/config.php';


  $data = file_get_contents('usuarios.json');

  $usuarios = json_decode ($data, true);

  $pdo = DB::getInstance();
  
  echo '<h2>Se van migrando</h2> <br>';
  foreach ($usuarios as $usuario) {

    $sql = 'INSERT INTO users (nombre, user, apellido, email, nacimiento,provincia, pass1, avatar)
                      VALUES (:nombre, :user, :apellido, :email, :nacimiento,:provincia, :pass1, :avatar)';




    $stmt = $pdo->prepare($sql);

    $stmt->bindValue('nombre',$usuario['usuario']['nombre']);
    $stmt->bindValue('user',$usuario['usuario']['usuario']);
    $stmt->bindValue('apellido',$usuario['usuario']['apellido']);
    $stmt->bindValue('email',$usuario['usuario']['email']);
    $stmt->bindValue('nacimiento',$usuario['usuario']['nacimiento']);
    $stmt->bindValue('provincia',$usuario['usuario']['provincia']);
    $stmt->bindValue('pass1',$usuario['usuario']['password']);
    $stmt->bindValue('avatar',$usuario['usuario']['avatar']);
    //$stmt->bindValue('created_at',$user->getRegistrationDate()->format('Y-m-d H:i:s'));
    echo ''. $usuario['usuario']['nombre'] . '<br>';

    $result = $stmt->execute();



}
