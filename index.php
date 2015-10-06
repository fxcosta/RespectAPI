<?php
require 'vendor/autoload.php';

use Respect\Rest\Router;
use Respect\Config\Container;
use Respect\Validation\Validator as v;
use Respect\Relational\Mapper;
use Respect\Data\Collections\Collection;

$config = new Container("config.ini");

//$mapper = new Mapper(new PDO('mysql:host=127.0.0.1;port=3306;dbname=restbeer', 'root', 'root'));
$mapper = new Mapper(new PDO($config->dsn, $config->user, $config->pass));
$router = new Router();

$router->any('/testing', function() {
   return 'Respect, bitch!';
});

$router->any('/mapper', function() use ($mapper) {
    $result = $mapper->testing(['id' => 1])->fetchAll();
    return $result[0]->name;
});
