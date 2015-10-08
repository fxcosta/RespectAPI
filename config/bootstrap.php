<?php
require __DIR__.'/../vendor/autoload.php';

use Respect\Config\Container;
use Respect\Relational\Mapper;
use Respect\Rest\Router;

$config = new Container("config/config.ini");
$mapper = new Mapper(new PDO($config->dsn, $config->user, $config->pass));
$router = new Router();