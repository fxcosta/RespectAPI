<?php

require(__DIR__.'/config/bootstrap.php');
require_once __DIR__ . '/src/routes.php';

//echo $router->run();
echo $router->dispatch();