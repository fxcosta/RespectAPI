<?php
require 'vendor/autoload.php';

use Respect\Rest\Router;
use Respect\Config\Container;
use Respect\Validation\Validator as v;
use Respect\Relational\Mapper;
use Respect\Data\Collections\Collection;

$config = new Container("config.ini");
$mapper = new Mapper(new PDO($config->dsn, $config->user, $config->pass));
$router = new Router();

$router->any('/testing', function() {
   return 'Respect, bitch!';
});