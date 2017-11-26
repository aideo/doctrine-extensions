<?php

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{

    /**
     * @var Connection
     */
    protected $conn;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function setUp()
    {
        parent::setUp();

        $config = Setup::createAnnotationMetadataConfiguration([__DIR__], false, null, new ArrayCache(), false);

        $this->conn = DriverManager::getConnection(['url' => 'sqlite:///:memory:']);
        $this->em = \Doctrine\ORM\EntityManager::create($this->conn, $config);
    }

}
