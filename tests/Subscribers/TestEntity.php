<?php

namespace Ideo\Doctrine\Subscribers;

use Doctrine\ORM\Mapping AS ORM;
use Ideo\Doctrine\Timestampable;
use Ideo\Doctrine\Extensions\Timestampable as TimestampableExtension;

/**
 * @ORM\Entity
 * @ORM\Table(name = "TEST_ENTITIES")
 */
class TestEntity implements Timestampable
{

    use TimestampableExtension;

    /**
     *
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id")
     */
    public $id;

    /**
     *
     * @var string
     * @ORM\Column(name="name")
     */
    public $name;

}
