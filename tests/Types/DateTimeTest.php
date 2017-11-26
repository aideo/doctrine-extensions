<?php

class DateTimeTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        \Doctrine\DBAL\Types\Type::overrideType('datetime', \Ideo\Doctrine\Types\DateTime::class);

        $this->em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('datetime', 'datetime');
    }

    public function testSchema()
    {
        $metadata = $this->em->getClassMetadata(DateTimeEntity::class);

        $mapping = $metadata->getFieldMapping("data");

        $this->assertEquals($mapping['type'], 'datetime');
    }

}
