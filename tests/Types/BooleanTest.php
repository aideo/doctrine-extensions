<?php

namespace Ideo\Doctrine\Types;

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\MappingException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Tools\ToolsException;
use Ideo\Doctrine\TestCase;

class BooleanTest extends TestCase
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
        Type::overrideType('boolean', '\Ideo\Doctrine\Types\Boolean');

        $config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/Boolean'], false, null, new ArrayCache(), false);

        $this->conn = DriverManager::getConnection(['url' => 'sqlite:///:memory:']);
        $this->em = EntityManager::create($this->conn, $config);
        $this->em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('boolean', 'boolean');

        $metadatas = $this->em->getMetadataFactory()->getAllMetadata();

        $tool = new SchemaTool($this->em);
        $tool->createSchema($metadatas);
    }

    /**
     * @throws MappingException
     */
    public function testSchema()
    {
        $metadata = $this->em->getClassMetadata('Ideo\Doctrine\Types\Boolean\BooleanEntity');

        $mapping = $metadata->getFieldMapping("data");

        $this->assertEquals($mapping['type'], 'boolean');
    }

}
