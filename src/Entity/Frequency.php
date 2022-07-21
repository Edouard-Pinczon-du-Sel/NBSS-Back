<?php

namespace App\Entity;

use App\Repository\FrequencyRepository;
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
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Housekeeping::class, inversedBy="frequency")
     * 
     */
    private $housekeeping;

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

    public function getHousekeeping(): ?Housekeeping
    {
        return $this->housekeeping;
    }

    public function setHousekeeping(?Housekeeping $housekeeping): self
    {
        $this->housekeeping = $housekeeping;

        return $this;
    }
}
