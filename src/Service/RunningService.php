<?php


namespace App\Service;


use App\Entity\Running;
use App\Repository\RunningRepository;

class RunningService
{
    /** @var Running */
    protected $running;

    protected $runningRepository;

    public function __construct(RunningRepository $runningRepository)
    {
        $this->runningRepository = $runningRepository;
    }

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
        return $this->running->getDuration() / $this->running->getDistance();
    }

    public function getTotalDistance()
    {
        $list = $this->runningRepository->findAll();
        $distance = 0;

        foreach ($list as $running) {
            $distance += $running->getDistance();
        }

        return $distance;
    }

    public function getTotalDuration()
    {
        $list = $this->runningRepository->findAll();
        $duration = 0;

        foreach ($list as $running) {
            $duration += $running->getDuration();
        }

        return $duration;
    }

}