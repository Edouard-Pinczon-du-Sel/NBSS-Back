<?php

namespace App\Entity;

use App\Repository\HousekeepingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HousekeepingRepository::class)
 */
class Housekeeping
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
    private $number_hour;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity=Frequency::class, mappedBy="housekeeping")
     */
    private $frequency;

    public function __construct()
    {
        $this->intervention = new ArrayCollection();
        $this->frequency = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Collection<int, Frequency>
     */
    public function getFrequency(): Collection
    {
        return $this->frequency;
    }

    public function addFrequency(Frequency $frequency): self
    {
        if (!$this->frequency->contains($frequency)) {
            $this->frequency[] = $frequency;
            $frequency->setHousekeeping($this);
        }

        return $this;
    }

    public function removeFrequency(Frequency $frequency): self
    {
        if ($this->frequency->removeElement($frequency)) {
            // set the owning side to null (unless already changed)
            if ($frequency->getHousekeeping() === $this) {
                $frequency->setHousekeeping(null);
            }
        }

        return $this;
    }
}
