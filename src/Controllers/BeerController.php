<?php
namespace Beer\Controllers;

use PDO;
use Respect\Config\Container;
use Respect\Relational\Mapper;
use Respect\Rest\Routable;

class BeerController implements Routable
{
    /**
     * @var Mapper
     */
    protected $mapper;

    /**
     * TODO usar dependency injection aqui!
     */
    public function __construct()
    {
        $config = new Container("config/config.ini");
        $this->mapper = new Mapper(new PDO($config->dsn, $config->user, $config->pass));
    }

    public function get($id = null)
    {
        if(is_null($id)) {
            return 'sem id definido';
        }

        $res = $this->mapper->testing(['id' => $id])->fetchAll();
        return json_encode($res);
    }

    public function post()
    {
        var_dump($_POST);
    }

    public function delete($beer)
    {
        var_dump($beer);
    }

    public function put($beer)
    {
        var_dump($beer);
    }
}