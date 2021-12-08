<?php
namespace core;

class Header {
  public static function get($headerKey) {
    $http_header = apache_request_headers();
    return (isset($http_header[$headerKey])) ? $http_header[$headerKey] : false;
  }
}