<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RunningRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RunningRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"user":"exact","type":"exact"})
 */
class Running
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="runnings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=RunningType::class, inversedBy="runnings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\Column(type="float")
     */
    private $distance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="float")
     */
    private $averageSpeed;

    /**
     * @ORM\Column(type="float")
     */
    private $averagePace;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getType(): ?RunningType
    {
        return $this->type;
    }

    public function setType(?RunningType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(float $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAverageSpeed(): ?float
    {
        return $this->averageSpeed;
    }

    public function setAverageSpeed(float $averageSpeed): self
    {
        $this->averageSpeed = round($averageSpeed,2);

        return $this;
    }

    public function getAveragePace(): ?float
    {
        return $this->averagePace;
    }

    public function setAveragePace(float $averagePace): self
    {
        $this->averagePace = round($averagePace,2);

        return $this;
    }
}
