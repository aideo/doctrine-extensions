<?php

namespace Ideo\Doctrine\Extensions;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Arr;

/**
 * メタデータを管理する機能を提供します。
 *
 * @package Ideo\Doctrine\Extensions
 */
trait Metadatable
{

    /**
     * メタデータの値を保持します。
     *
     * @var array
     * @ORM\Column(name="metadata", type="json_array", nullable=true, options={"comment":"メタデータ"})
     */
    protected $metadata = [];

    /**
     * メタデータを設定します。
     *
     * @param string $name メタデータの項目名。
     * @param mixed $value メタデータの値。
     */
    public function addMetadata($name, $value)
    {
        if ($this->metadata === null) {
            $this->metadata = [];
        }

        $this->metadata[$name] = $value;
    }

    /**
     * メタデータを取得します。
     *
     * @param string $name メタデータの項目名。省略した場合はすべてのメタデータ。
     *
     * @return array メタデータ。
     */
    public function getMetadata($name = null)
    {
        if ($name !== null) {
            return Arr::get($this->metadata, $name);
        } else {
            return $this->metadata;
        }
    }

    /**
     * メタデータに値を設定します。
     *
     * @param string|array $name 設定するメタデータ項目のパス。配列の場合はすべてを置き換える連想配列。
     * @param mixed|null $value 設定値。
     */
    public function setMetadata($name, $value = null)
    {
        if (Arr::accessible($name)) {
            $this->metadata = $name;
        } else {
            Arr::set($this->metadata, $name, $value);
        }
    }

    /**
     * メタデータを保持しているかどうかを取得します。
     *
     * @param string $name メタデータの項目名。
     *
     * @return bool 指定した項目のメタデータを保持している場合 true, それ以外は false 。
     */
    public function hasMetadata($name)
    {
        return isset($this->metadata[$name]);
    }

}
