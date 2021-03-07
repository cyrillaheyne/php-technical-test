<?php

namespace App\EventListener;

use App\Entity\Running;
use App\Service\RunningService;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class RunningSubscriber implements EventSubscriber
{
    protected $runningService;

    public function __construct(RunningService $runningService)
    {
        $this->runningService = $runningService;
    }

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
            $this->runningService->calculateAverage($entity);
        }

    }

}