<?php

//$router->any('/beers/*', function($name) use($f) {
//    return $f->getOuter($name);
//});

$f = new \Beer\Controllers\BeerController();
$router->any('/beer/*', $f);

$router->get('/users/*', function($screenName) {
    echo "User {$screenName}";
});

$router->any('/testing', function() {
    return 'Respect, bitch!';
});

$router->any('/mapper', function() use ($mapper) {
    $result = $mapper->testing(['id' => 1])->fetchAll();
    return json_encode($result[0]->name);
});

$router->any('/dbal', function() {

    $config = new \Doctrine\DBAL\Configuration();
    $params = [
        'dbname' => 'restbeer',
        'user' => 'root',
        'password' => 'root',
        'host' => 'localhost',
        'port' => 3306,
        'charset' => 'utf8',
        'driver' => 'pdo_mysql',
    ];

    $db = Doctrine\DBAL\DriverManager::getConnection($params, $config);

    $st = $db->query("SELECT id, name FROM testing");
    $cat = $st->fetchAll(PDO::FETCH_KEY_PAIR);
    var_dump($cat);

    $qb = $db->createQueryBuilder();
    $qb->select('*')
        ->from('testing');
    $st2 = $qb->execute()->fetchAll();
    var_dump($st2);

});

$router->errorRoute(function (array $err) {
    return 'Sorry, this errors happened: '.var_dump($err);
});