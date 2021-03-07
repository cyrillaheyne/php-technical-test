<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RunningTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RunningTypeRepository::class)
 */
class RunningType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Running::class, mappedBy="type", orphanRemoval=true)
     */
    private $runnings;

    public function __construct()
    {
        $this->runnings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Running[]
     */
    public function getRunnings(): Collection
    {
        return $this->runnings;
    }

    public function addRunning(Running $running): self
    {
        if (!$this->runnings->contains($running)) {
            $this->runnings[] = $running;
            $running->setType($this);
        }

        return $this;
    }

    public function removeRunning(Running $running): self
    {
        if ($this->runnings->removeElement($running)) {
            // set the owning side to null (unless already changed)
            if ($running->getType() === $this) {
                $running->setType(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
