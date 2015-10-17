<?php
namespace Beer;

use Respect\Config\Container;

class DoctrineConnection
{
    public $db;

    public function __construct()
    {
        $config = new Container("config/config.ini");

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

        $this->db = \Doctrine\DBAL\DriverManager::getConnection($params, $config);
    }

    public function getConnection()
    {
        return $this->db;
    }
}