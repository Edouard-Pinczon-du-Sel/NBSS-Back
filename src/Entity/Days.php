<?php

namespace App\Entity;

use App\Repository\DaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DaysRepository::class)
 */
class Days
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=BabysittingService::class, mappedBy="days")
     */
    private $babysittingServices;

    public function __construct()
    {
        $this->babysittingServices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, BabysittingService>
     */
    public function getBabysittingServices(): Collection
    {
        return $this->babysittingServices;
    }

    public function addBabysittingService(BabysittingService $babysittingService): self
    {
        if (!$this->babysittingServices->contains($babysittingService)) {
            $this->babysittingServices[] = $babysittingService;
            $babysittingService->addDay($this);
        }

        return $this;
    }

    public function removeBabysittingService(BabysittingService $babysittingService): self
    {
        if ($this->babysittingServices->removeElement($babysittingService)) {
            $babysittingService->removeDay($this);
        }

        return $this;
    }
}
