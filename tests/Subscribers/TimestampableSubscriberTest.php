<?php

namespace Ideo\Doctrine\Subscribers;

use Carbon\Carbon;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Tools\ToolsException;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class TimestampableSubscriberTest extends TestCase
{

    /**
     * @var Connection
     */
    protected $conn;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @throws DBALException
     * @throws ORMException
     * @throws ToolsException
     */
    public function setUp()
    {
        $config = Setup::createAnnotationMetadataConfiguration([__DIR__], false, null, new ArrayCache(), false);

        $this->conn = DriverManager::getConnection(['url' => 'sqlite:///:memory:']);
        $this->em = EntityManager::create($this->conn, $config);

        $metadatas = $this->em->getMetadataFactory()->getAllMetadata();

        $tool = new SchemaTool($this->em);
        $tool->createSchema($metadatas);
    }

    /**
     * @throws DBALException
     * @throws ORMException
     */
    public function test()
    {
        $this->em->getEventManager()->addEventSubscriber(new TimestampableSubscriber(new NullLogger()));

        $now = Carbon::create(2000, 1, 1, 0, 0, 0);
        Carbon::setTestNow($now);

        $entity = new TestEntity();
        $entity->id = 1;
        $entity->name = 'SAMPLE';

        $this->em->persist($entity);
        $this->em->flush();

        $this->assertNotNull($entity->getCreatedAt());
        $this->assertEquals($entity->getCreatedAt(), $now);
        $this->assertNotNull($entity->getUpdatedAt());
        $this->assertEquals($entity->getUpdatedAt(), $now);
    }

}
