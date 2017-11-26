<?php

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name = "SAMPLE_JSON")
 */
class JsonEntity
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
     * @var array
     * @ORM\Column(type="json")
     */
    public $data;

}
