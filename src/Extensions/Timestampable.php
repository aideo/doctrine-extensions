<?php

namespace Ideo\Doctrine\Extensions;

use Carbon\Carbon;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait Timestampable
{

    /**
     * 登録日時を保持します。
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @var Carbon
     */
    protected $createdAt;

    /**
     * 更新日時を保持します。
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @var Carbon
     */
    protected $updatedAt;

    /**
     * 登録日時を取得します。
     *
     * @return Carbon 登録日時を表す Carbon オブジェクト。
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * 更新日時を取得します。
     *
     * @return Carbon 登録日時を表す Carbon オブジェクト。
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * 登録日時を設定します。
     *
     * @param DateTime $createdAt 設定する登録日時を表す Carbon オブジェクト。
     */
    public function setCreatedAt(DateTime $createdAt)
    {
        if ($createdAt instanceof Carbon) {
            $this->createdAt = $createdAt;
        } else {
            $this->createdAt = Carbon::instance($createdAt);
        }
    }

    /**
     * 更新日時を設定します。
     *
     * @param DateTime $updatedAt 設定する登録日時を表す Carbon オブジェクト。
     */
    public function setUpdatedAt(DateTime $updatedAt)
    {
        if ($updatedAt instanceof Carbon) {
            $this->updatedAt = $updatedAt;
        } else {
            $this->updatedAt = Carbon::instance($updatedAt);
        }
    }

}
