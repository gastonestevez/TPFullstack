<?php
class DatabasesStorage implements StorageInterface
  {
  private $source;
  private $sql;

   public function setQuery($sql){
     $this->sql = $sql;
   }

   public function getSource()
   {
     $this->source = DB::getInstance();
   }

   public function insert(array $data=[])
   {
     $stmt = $this->source->prepare($this->sql);
  
    foreach ($data as $key => $value) { 
     $stmt->bindValue($key, $value);
   }
    $stmt->execute();
  }

  public function select($user){
    $stmt = $this->source->prepare($this->sql);
    $stmt->bindValue(":usuario",$user);
    $stmt->execute();
    return $stmt->fetch();
  }

   public function getId()
   {
      return $this->source->lasInsertId();
   }

 }



 ?>
