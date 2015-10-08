<?php

$router->any('/testing', function() {
    return 'Respect, bitch!';
});

$router->any('/mapper', function() use ($mapper) {
    $result = $mapper->testing(['id' => 1])->fetchAll();
    return $result[0]->name;
});