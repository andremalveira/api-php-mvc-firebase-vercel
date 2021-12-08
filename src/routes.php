<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

//ROUTERS FOR GENSHINIMPACT API/
$api_Name = 'genshinimpact';
$router->get('/'.$api_Name, 'GenshinController@index');
$router->get('/'.$api_Name.'/characters', 'GenshinController@characters');
$router->get('/'.$api_Name.'/characters/{id}', 'GenshinController@characterId');