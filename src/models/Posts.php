<?php
namespace src\models;
use \core\Database;

class Posts {
  public static function get() {
    return Database::public('posts');
  }
}