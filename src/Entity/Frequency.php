<?php

namespace App\Entity;

use App\Repository\FrequencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FrequencyRepository::class)
 */
class Frequency
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
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity=Housekeeping::class, mappedBy="frequency")
     */
    private $housekeepings;

    public function __construct()
    {
        $this->housekeepings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Housekeeping>
     */
    public function getHousekeepings(): Collection
    {
        return $this->housekeepings;
    }

    public function addHousekeeping(Housekeeping $housekeeping): self
    {
        if (!$this->housekeepings->contains($housekeeping)) {
            $this->housekeepings[] = $housekeeping;
            $housekeeping->addFrequency($this);
        }

        return $this;
    }

    public function removeHousekeeping(Housekeeping $housekeeping): self
    {
        if ($this->housekeepings->removeElement($housekeeping)) {
            $housekeeping->removeFrequency($this);
        }

        return $this;
    }
}
