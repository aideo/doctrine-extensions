<?php

namespace Ideo\Doctrine\Types\DateTime;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name = "SAMPLE_DATETIME")
 */
class DateTimeEntity
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
     * @var \Carbon\Carbon
     * @ORM\Column(type="datetime")
     */
    public $data;

}
