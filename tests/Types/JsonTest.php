<?php

class JsonTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        \Doctrine\DBAL\Types\Type::addType('json', \Ideo\Doctrine\Types\Json::class);

        $this->em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('json', 'json');
    }

    public function testSchema()
    {
        $metadata = $this->em->getClassMetadata(JsonEntity::class);

        $mapping = $metadata->getFieldMapping("data");

        $this->assertEquals($mapping['type'], 'json');
    }

}
