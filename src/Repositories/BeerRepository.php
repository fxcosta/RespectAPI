<?php
namespace Beer\Repositories;

use Beer\DoctrineConnection;

class BeerRepository implements AbstractRepositoryInterface
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    public $mapper;

    /**
     * @var \Doctrine\DBAL\Query\QueryBuilder
     */
    public $qb;

    public function __construct()
    {
        $conn = new DoctrineConnection();
        $this->mapper = $conn->getConnection();
        $this->qb = $this->mapper->createQueryBuilder();
    }

    public function fetch($id)
    {
        $res = $this->qb->select('*')
            ->from('testing')
            ->where('id = :id');
        $res->setParameter(':id', $id);

        return json_encode($res->execute()->fetch());
    }

    public function fetchAll()
    {
        $res = $this->qb->select('*')
            ->from('testing');

        return json_encode($res->execute()->fetchAll());
    }

    public function insert($data)
    {
        $res = $this->qb->insert('testing')
            ->values(['name' => $data[0]]);

        return 'ok';
    }
}