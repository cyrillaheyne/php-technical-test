<?php

namespace App\EventListener;

use App\Entity\Running;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class RunningSubscriber implements EventSubscriber
{
    // this method can only return the event names; you cannot define a
    // custom method name to execute when each event triggers
    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
            Events::preUpdate,
        ];
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $this->calculateAverage($args);
    }

    public function preUpdate(LifecycleEventArgs $args): void
    {
        $this->calculateAverage($args);
    }

    protected function calculateAverage(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Running) {
            $entity->setAveragePace(0);
            $entity->setAverageSpeed(0);
        }

    }

}