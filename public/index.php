<?php
//requires
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/routes.php';

//headers()
$Origin = (ISSET($_SERVER['HTTP_ORIGIN'])) ? $_SERVER['HTTP_ORIGIN'] : $_SERVER['HTTP_HOST'];
header("Access-Control-Allow-Origin: ".$Origin."");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");

//Environment Variables
$root = dirname(__dir__);
$dotenv = Dotenv\Dotenv::createImmutable($root);
$dotenv->safeLoad();

//Authentication 
use \core\Auth;
if(Auth::checkout()) $router->run( $router->routes );


