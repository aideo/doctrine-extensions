<?php

class BooleanTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        \Doctrine\DBAL\Types\Type::overrideType('boolean', \Ideo\Doctrine\Types\Boolean::class);

        $this->em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('boolean', 'boolean');
    }

    public function testSchema()
    {
        $metadata = $this->em->getClassMetadata(BooleanEntity::class);

        $mapping = $metadata->getFieldMapping("data");

        $this->assertEquals($mapping['type'], 'boolean');
    }

}
