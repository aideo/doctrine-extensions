<?php

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name = "SAMPLE_BOOLEAN")
 */
class BooleanEntity
{

    /**
     *
     * @var int
     * @ORM\Id
     * @ORM\Column
     */
    public $id;

    /**
     *
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    public $data;

}
