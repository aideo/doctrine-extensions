<?php

namespace Ideo\Doctrine\Extensions;

use Doctrine\ORM\Mapping as ORM;

/**
 * エンティティバージョンを管理する機能を提供します。
 *
 * @package Ideo\Doctrine\Extensions
 */
trait Versioning
{

    /**
     * エンティティバージョンを保持します。
     *
     * @var int
     * @ORM\Column(name="version", type="bigint", nullable=false, options={"comment":"エンティティバージョン"})
     * @ORM\Version
     */
    protected $version = 1;

    /**
     * エンティティバージョンを取得します。
     *
     * @return int エンティティバージョンの値。
     */
    public function getVersion()
    {
        return $this->version;
    }

}
