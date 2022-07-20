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
     * @ORM\ManyToOne(targetEntity=Housekeeping::class, inversedBy="intervention")
     * @ORM\JoinColumn(nullable=false)
     */
   
    private $personalAssistanceService;

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

 

   

    public function getPersonalAssistanceService(): ?PersonalAssistanceService
    {
        return $this->personalAssistanceService;
    }

    public function setPersonalAssistanceService(?PersonalAssistanceService $personalAssistanceService): self
    {
        $this->personalAssistanceService = $personalAssistanceService;

        return $this;
    }
}
