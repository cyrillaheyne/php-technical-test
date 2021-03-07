<?php


namespace App\Service;


use App\Entity\Running;

class RunningService
{
    /** @var Running */
    protected $running;

    public function calculateAverage(Running $running)
    {
        $this->running = $running;
        $running->setAverageSpeed($this->calculateAverageSpeed());
        $running->setAveragePace($this->calculateAveragePace());
    }

    protected function calculateAverageSpeed()
    {
        return $this->running->getDistance() / ($this->running->getDuration() / 60);
    }

    protected function calculateAveragePace()
    {
        return $this->running->getDistance() / $this->running->getDuration();
    }

}