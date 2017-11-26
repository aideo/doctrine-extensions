<?php

namespace Ideo\Doctrine\Extensions;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class HasPermissions
 *
 * @package Ideo\Doctrine\Extensions
 */
trait HasPermissions
{

    /**
     * パーミッションを保持します。
     *
     * @ORM\Column(
     *     name="permissions",
     *     type="simple_array",
     *     nullable=true,
     *     options={"comment":"パーミッション"}
     * )
     * @var array
     */
    protected $permissions = [];

    /**
     * パーミッションを追加します。
     *
     * @param string $value 追加するパーミッション。
     */
    public function addPermission($value)
    {
        if (!in_array($value, $this->permissions, true)) {
            $this->permissions[] = $value;
        }
    }

    /**
     * パーミッションを取得します。
     *
     * @return array パーミッション。
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * パーミッションを設定します。
     *
     * @param array $value 設定するパーミッション。
     */
    public function setPermissions($value)
    {
        $this->permissions = $value;
    }

    /**
     * パーミッションを持っているか確認します。
     *
     * @param string $value 確認するパーミッション。
     *
     * @return bool パーミッションを持っている場合 true, それ以外は false 。
     */
    public function hasPermission($value)
    {
        $permissions = (array)$value;

        if (method_exists($this, 'getMergedPermissions')) {
            $mergedPermissions = $this->getMergedPermissions();
        } else {
            $mergedPermissions = $this->permissions;
        }

        foreach ($permissions as $permission) {
            if (in_array($permission, $mergedPermissions, true)) {
                return true;
            }
        }

        return false;
    }

    /**
     * 指定したパーミッションを削除します。
     *
     * @param string $value 削除するパーミッション。
     *
     * @return bool 削除された場合 true, 対象のパーミッションを持っていない場合 false 。
     */
    public function removePermission($value)
    {
        $index = array_search($value, $this->permissions);

        if ($index !== false) {
            unset($this->permissions[$index]);

            return true;
        } else {
            return false;
        }
    }

}
