<?php
namespace core;
use Kreait\Firebase\Factory;
use \src\Config;

class Database {
  private static function connection(){
    $factory = (new Factory())
    ->withDatabaseUri($_ENV['DATABASE_URL']);
    return $factory->createDatabase();
  }

  public static function public($tableName = ''){

    $database = self::connection();
    $reference = $database->getReference('public/'.$tableName);
    return $reference->getValue();

  }
  public static function private($tableName = false){
    $database = self::connection();
    $reference = $database->getReference('private/'.$tableName);
    return $reference->getValue();
  }
}
