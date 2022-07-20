<?php

namespace App\Entity;

use App\Repository\BabysittingServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BabysittingServiceRepository::class)
 */
class BabysittingService
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_child;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_hour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity=Days::class, mappedBy="babysittingService")
     */
    private $days;

    /**
     * @ORM\OneToMany(targetEntity=Intervention::class, mappedBy="babysittingService")
     */
    private $intervention;

    public function __construct()
    {
        $this->days = new ArrayCollection();
        $this->intervention = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberChild(): ?int
    {
        return $this->number_child;
    }

    public function setNumberChild(int $number_child): self
    {
        $this->number_child = $number_child;

        return $this;
    }

    public function getNumberHour(): ?int
    {
        return $this->number_hour;
    }

    public function setNumberHour(int $number_hour): self
    {
        $this->number_hour = $number_hour;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Collection<int, Days>
     */
    public function getDays(): Collection
    {
        return $this->days;
    }

    public function addDay(Days $day): self
    {
        if (!$this->days->contains($day)) {
            $this->days[] = $day;
            $day->setBabysittingService($this);
        }

        return $this;
    }

    public function removeDay(Days $day): self
    {
        if ($this->days->removeElement($day)) {
            // set the owning side to null (unless already changed)
            if ($day->getBabysittingService() === $this) {
                $day->setBabysittingService(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Intervention>
     */
    public function getIntervention(): Collection
    {
        return $this->intervention;
    }

    public function addIntervention(Intervention $intervention): self
    {
        if (!$this->intervention->contains($intervention)) {
            $this->intervention[] = $intervention;
            $intervention->setBabysittingService($this);
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention): self
    {
        if ($this->intervention->removeElement($intervention)) {
            // set the owning side to null (unless already changed)
            if ($intervention->getBabysittingService() === $this) {
                $intervention->setBabysittingService(null);
            }
        }

        return $this;
    }
}