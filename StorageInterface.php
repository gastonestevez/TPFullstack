<?php

interface StorageInterface
{
 //Devuelve acceso a almacenamiento
  public function getSource();

 //Recibe datos para almacenar
  public function insert(array $data=[]);

 //Devuelve id de elemento guardado
  public function getId();
}





 ?>
