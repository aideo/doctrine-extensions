<?php

namespace Ideo\Doctrine;

use Carbon\Carbon;
use DateTime;

interface Timestampable
{

    /**
     * 登録日時を取得します。
     *
     * @return Carbon 登録日時を表す Carbon オブジェクト。
     */
    public function getCreatedAt();

    /**
     * 更新日時を取得します。
     *
     * @return Carbon 登録日時を表す Carbon オブジェクト。
     */
    public function getUpdatedAt();

    /**
     * 登録日時を設定します。
     *
     * @param DateTime $createdAt 設定する登録日時を表す Carbon オブジェクト。
     */
    public function setCreatedAt(DateTime $createdAt);

    /**
     * 更新日時を設定します。
     *
     * @param DateTime $updatedAt 設定する登録日時を表す Carbon オブジェクト。
     */
    public function setUpdatedAt(DateTime $updatedAt);

}
