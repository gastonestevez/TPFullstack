<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bigfashion";

try {
    //Creo bdd
    $connection = new PDO("mysql:host=$servername", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE $dbname";
    $connection->exec($sql);
    echo "Database created successfully<br>";
    //Creo tablas
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "CREATE TABLE users (
      id int(11) NOT NULL AUTO_INCREMENT,
      nombre varchar(45) DEFAULT NULL,
      user varchar(45) DEFAULT NULL,
      apellido varchar(45) DEFAULT NULL,
      email varchar(45) DEFAULT NULL,
      nacimiento varchar(45) DEFAULT NULL,
      pass1 varchar(45) DEFAULT NULL,
      provincia varchar(45) DEFAULT NULL,
      avatar varchar(45) DEFAULT NULL,
      PRIMARY KEY (`id`)
    )";
    $connection->exec($sql);
    echo "La tabla fue creada";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$connection = null;
?>
