<?php
namespace src\models;
use \core\Database;

class Users {
  public static function get() {
    return Database::private('users');
  }
}