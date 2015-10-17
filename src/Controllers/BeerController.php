<?php
namespace Beer\Controllers;

use Beer\Repositories\BeerRepository;
use Respect\Rest\Routable;

class BeerController implements Routable
{
    /**
     * @var BeerRepository
     */
    public $repository;

    /**
     * TODO usar dependency injection aqui!
     */
    public function __construct()
    {
        $this->repository = new BeerRepository();
    }

    public function get($id = null)
    {
        if(is_null($id)) {
            return $this->repository->fetchAll();
        }

        return $this->repository->fetch($id);
    }

    public function post()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
            isset($_POST['name']) ? $name = $_POST['name'] : $name = '';
            return $this->repository->insert([$name]);
        }

        throw new \Exception('Houve algo errado com a requisição');
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