<?php

namespace Ideo\Doctrine\Subscribers;

use Carbon\Carbon;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Ideo\Doctrine\Timestampable;
use Psr\Log\LoggerInterface;

class TimestampableSubscriber implements EventSubscriber
{

    /**
     * LoggerInterface オブジェクトを保持します。
     *
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preUpdate
        ];
    }

    /**
     * エンティティの保存時に呼び出されます。
     *
     * @param LifecycleEventArgs $args イベントパラメーター。
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Timestampable) {
            $entity->setCreatedAt(Carbon::now());
            $entity->setUpdatedAt(Carbon::now());
        }
    }

    /**
     * エンティティの更新時に呼び出されます。
     *
     * @param LifecycleEventArgs $args イベントパラメーター。
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Timestampable) {
            $entity->setUpdatedAt(Carbon::now());
        }
    }

}
