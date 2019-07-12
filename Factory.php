<?php
require 'StorageInterface.php';
require 'DatabasesStorage.php';
require 'JSONStorage.php';

class Factory
{
  private static $objects = [
    'storages' => [
      'json' => JSONStorage::class,
      'db' => DatabasesStorage::class,
    ]
  ];
  private function __construct() {}

  public static function get($key, $subkey)
  {
  return new self::$objects[$key][$subkey];
  }
}

 ?>
