<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InterventionRepository::class)
 */
class Intervention
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $moment;

    /**
     * @ORM\ManyToOne(targetEntity=BabysittingService::class, inversedBy="intervention")
     * @ORM\JoinColumn(nullable=false)
     */
    private $babysittingService;

    /**
     * @ORM\ManyToOne(targetEntity=Housekeeping::class, inversedBy="intervention")
     * @ORM\JoinColumn(nullable=false)
     */
    private $housekeeping;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMoment(): ?string
    {
        return $this->moment;
    }

    public function setMoment(string $moment): self
    {
        $this->moment = $moment;

        return $this;
    }

    public function getBabysittingService(): ?BabysittingService
    {
        return $this->babysittingService;
    }

    public function setBabysittingService(?BabysittingService $babysittingService): self
    {
        $this->babysittingService = $babysittingService;

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
